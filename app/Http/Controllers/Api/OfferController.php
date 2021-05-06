<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\User;
use App\Offer;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\UserRating;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use DB;
use Helper1;
use Illuminate\Support\Facades\Mail;

class OfferController extends Controller
{
    public function createOffer(Request $request)  
    {
        $this->validate($request, [
            'currency' => 'required',
            'min_value' => 'required',
            'max_value' => 'required',
            'payment_method' => 'required',
            'description' => 'required'
        ]);
        
        $id = $request->user('api')->id;
        if (User::where('id', $id)->exists()) {
            $offer = Offer::create(array_merge($request->all(),[
            	'user_id' => $id,
                'offer_no' => rand(10,100).'PH'.$id
            ]));

            if ($offer) {
                $user = User::where('id', $request->get('send_to'))->first();
                if ($user && $user->device_type != null && $user->u_id != null) {
                    if ($user->device_type == "android") {
                        $data = [
                            "reg_token" => $user->u_id,
                            "title" => "PeerHunter",
                            "message" => "A new offer added in your profile",
                            "is_notification" => false,
                        ];
                        $foo = new Helper1();
                        
                        $sendNotification = $foo->sendAndroid($data);
                    } else {

                        $data = [
                            "reg_token" => $user->u_id,
                            "title" => "PeerHunter",
                            "message" => "A new offer added in your profile",
                            "is_notification" => false,
                        ];

                        $foo = new Helper1();
                        $sendNotification = $foo->sendAndroid($data);
                    }
                }
            	$arr = ['message' => 'Added successfully', 'status' => 200];


                Mail::send('emails.offer-created', ['user' => $user], function ($m) use ($user) {
                    $m->from('info@sayches.com', 'PeerHunter');
        
                    $m->to($user->email)->subject('Offer Rejected!');
                });
            }
            else {
            	$arr = ['success' => 'Error', 'status' => 401];
            }
            
        } else {
            $arr = ['success' => 'Unauthorised', 'status' => 401];
        }

        return response()->json($arr);
    }

    public function offers(Request $request)  
    {
        $id = $request->user('api')->id;
        if (User::where('id', $id)->exists()) {
            $offers = Offer::where('user_id', $id)->orWhere('send_to', $id)->with('sendTo','sendBy')->orderBy('id', 'DESC')->get();
            if ($offers) {
                $offerData = [];
                foreach ($offers as $offer) {
                    $isRated = UserRating::where('sent_id', $id)->where('offer_id', $offer->id)->first();
                    if ($isRated) {
                        $offer->ratingGiven = true;
                        $offer->ratings = (int)$isRated->rating;
                    }
                    else {
                        $offer->ratingGiven = false;
                        $offer->ratings = 0;
                    }
                    if ($offer->sendTo) {
                        $ratings = UserRating::where('user_id', $offer->sendTo->id)->pluck('rating');
                        $ratingsArr = [];
                        foreach ($ratings as $value) {
                            $ratingsArr[] = $value;
                        }
                        $ratingCount = $ratings->count();
                        if ($ratingCount > 0) {
                            $avg = array_sum($ratingsArr)/$ratingCount;
                        }
                        else {
                            $avg = 0;
                        }
                        
                        $offer->sendTo->ratings = round($avg);
                    }
                    
                    $ratingsArr1 = [];
                    if ($offer->sendBy) {
                        $ratings1 = UserRating::where('user_id', $offer->sendBy->id)->pluck('rating');
                    
                        foreach ($ratings1 as $val) {
                            $ratingsArr1[] = $val;
                        }
                        $ratingCount1 = $ratings1->count();
                        if ($ratingCount1 > 0) {
                            $avg1 = array_sum($ratingsArr1)/$ratingCount1;
                        }
                        else {
                            $avg1 = 0;
                        }
                        
                        $offer->sendBy->ratings = round($avg1);
                    }
                    
                    $offerData[] = $offer;
                }
                $arr = ['message' => 'found successfully', 'data' =>$offers,  'status' => 200];
            }
            else {
                $arr = ['success' => 'Error', 'status' => 401];
            }
            
        } else {
            $arr = ['success' => 'Unauthorised', 'status' => 401];
        }

        return response()->json($arr);
    }

    public function receivedOffers(Request $request)  
    {
        $id = $request->user('api')->id;
        if (User::where('id', $id)->exists()) {
            $offers = Offer::where('send_to', $id)->get();
            if ($offers) {
                $arr = ['message' => 'found successfully', 'data' =>$offers,  'status' => 200];
            }
            else {
                $arr = ['success' => 'Error', 'status' => 401];
            }
            
        } else {
            $arr = ['success' => 'Unauthorised', 'status' => 401];
        }

        return response()->json($arr);
    }

    public function acceptOffer(Request $request)  
    {
        $id = $request->user('api')->id;
        if (User::where('id', $id)->exists()) {
            $offer = Offer::where('id', $request->offer_id)->first();
            if ($offer) {
            	$offer->update([
            		'is_accepted' => 1,
            		'is_rejected' => 0,
            	]);
            	$user = User::where('id', $offer->user_id)->first();
            	$receivedPerson = User::where('id', $offer->send_to)->first();
            	$receivedName = $receivedPerson ? $receivedPerson->name : 'N/A';
                if ($user && $user->device_type != null && $user->u_id != null) {
                    $data = [
                        "reg_token" => $user->u_id,
                        "title" => "PeerHunter",
                        "message" => ucfirst($receivedName)." accept your offer",
                        "is_notification" => false,
                    ];
                    $foo = new Helper1();
                    $sendNotification = $foo->sendAndroid($data); 
                }
                $arr = ['message' => 'Offer has been accepted',  'status' => 200];

                Mail::send('emails.offer-accepted', ['user' => $user], function ($m) use ($user) {
                    $m->from('info@sayches.com', 'PeerHunter');
        
                    $m->to($user->email)->subject('Offer Accepted!');
                });
            }
            else {
                $arr = ['success' => 'Error', 'status' => 401];
            }
            
        } else {
            $arr = ['success' => 'Unauthorised', 'status' => 401];
        }

        return response()->json($arr);
    }

    public function rejectOffer(Request $request)  
    {
        $id = $request->user('api')->id;
        if (User::where('id', $id)->exists()) {
            $offer = Offer::where('id', $request->offer_id)->first();
            if ($offer) {
            	$offer->update([
            		'is_accepted' => 0,
            		'is_rejected' => 1,
            	]);
            	$user = User::where('id', $offer->user_id)->first();
            	$receivedPerson = User::where('id', $offer->send_to)->first();
            	$receivedName = $receivedPerson ? $receivedPerson->name : 'N/A';
                if ($user && $user->device_type != null && $user->u_id != null) {
                    $data = [
                        "reg_token" => $user->u_id,
                        "title" => "PeerHunter",
                        "message" => ucfirst($receivedName)." reject your offer",
                        "is_notification" => false,
                    ];
                    $foo = new Helper1();
                    $sendNotification = $foo->sendAndroid($data); 
                }
                $arr = ['message' => 'Offer has been rejected',  'status' => 200];

                Mail::send('emails.offer-rejetecd', ['user' => $user], function ($m) use ($user) {
                    $m->from('info@sayches.com', 'PeerHunter');
        
                    $m->to($user->email)->subject('Offer Rejected!');
                });
            }
            else {
                $arr = ['success' => 'Error', 'status' => 401];
            }
            
        } else {
            $arr = ['success' => 'Unauthorised', 'status' => 401];
        }

        return response()->json($arr);
    }

    public function withdrawOffer(Request $request)  
    {
        $id = $request->user('api')->id;
        if (User::where('id', $id)->exists()) {
            $offer = Offer::where('id', $request->offer_id)->first();
            if ($offer) {
                $offer->update([
                    'is_accepted' => 0,
                    'is_rejected' => 0,
                    'is_cancelled' => 1,

                ]);
                $user = User::where('id', $offer->user_id)->first();
            	$receivedPerson = User::where('id', $offer->send_to)->first();
            	$receivedName = $user ? $user->name : 'N/A';
                if ($receivedPerson && $receivedPerson->device_type != null && $receivedPerson->u_id != null) {
                    $data = [
                        "reg_token" => $receivedPerson->u_id,
                        "title" => "PeerHunter",
                        "message" => ucfirst($receivedName)." withdraw the offer",
                        "is_notification" => false,
                    ];
                    $foo = new Helper1();
                    $sendNotification = $foo->sendAndroid($data); 
                }
                $arr = ['message' => 'Offer has been withdraw',  'status' => 200];

                Mail::send('mails.offer-withdrawn', ['user' => $user], function ($m) use ($user) {
                    $m->from('info@sayches.com', 'PeerHunter');
        
                    $m->to($user->email)->subject('Offer Rejected!');
                });
            }
            else {
                $arr = ['success' => 'Error', 'status' => 401];
            }
            
        } else {
            $arr = ['success' => 'Unauthorised', 'status' => 401];
        }

        return response()->json($arr);
    }

}