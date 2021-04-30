<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\User;
use App\UserRating;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use DB;
use App\Setting;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Storage;

class UserController extends BaseController
{
    public function verifyNumber(Request $request)
    {
        $status = false;
        $input = $request->all();
        $validator = Validator::make($input, [
            'phone' => 'required',
            'country_code' => 'required',
        ]);
        if ($validator->fails()) {

            return response()->json(['message' => $validator->errors(), 'success' => $status], 422);
        }

        //$setting_data = Setting::all();
        $twilio_api_key = "2I4YOaAndxX876p0Qrx3YyGnVEaoLUpC";
        $url = 'https://api.authy.com/protected/json/phones/verification/start?api_key=' . $twilio_api_key;
        $phone = $input['phone'];
        $country_code = $input['country_code'];
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "via=sms&code_length=6&locale=en&phone_number=" . $phone . "&country_code=" . trim($country_code));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($ch), true);
        curl_close($ch);
        //$result['success'] = 1;
        if ($result['success'] == 1) {
            $arr = ['message' => 'An activation code has been sent your registered number', 'status' => 200];
        } else {
            $arr = ['message' => $result['message'], 'status' => 401];
        }

        return response()->json($arr);
    }
    
    

    public function verifyOtp(Request $request)
    {
        $status = false;
        $data = [];
        //$setting_data = Setting::all();
        $twilio_api_key = "2I4YOaAndxX876p0Qrx3YyGnVEaoLUpC";
        $input = $request->all();
        $validator = Validator::make($input, [
            'phone' => 'required',
            'country_code' => 'required',
            'verification_code' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json(['message' => $validator->errors(), 'success' => $status], 422);
        }
        $country_code = $input['country_code'];
        $phone = $input['phone'];
        $url = "https://api.authy.com/protected/json/phones/verification/check?api_key=" . $twilio_api_key . "&phone_number=" . $phone . "&country_code=" . trim($country_code) . "&verification_code=" . $input['verification_code'];
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $check = json_decode(curl_exec($ch), true);
        curl_close($ch);
        //$check['success'] = 1;
        if ($check['success'] == 1) {
            $user = User::where('phone', $phone)->first();
            if(!$user){
                $user = User::create([
                    //'name'  => Str::random(5),
                    'country_code' => $country_code,
                    'phone' => $phone,
                    //'email' => "dummy_".rand(10,100),
                    'longitude' => $input['longitude'],
                    'latitude' => $input['latitude'],
                    'online'   => date('Y-m-d h:i:s'),
                    'u_id'  => isset($input['u_id']) && is_numeric($input['u_id']) ?  $input['u_id'] : 0,
                    'device_type'  =>$input['device_type'],
                ]); 
                $user->assignRole('user');
                $data['already_exists'] = 0;
            }
            else {
                if ($user->is_deleted == 1) {
                    $arr = ['success' => true, 'message' => 'Your account has been deleted', 'status' => 200];
                    $status_code = 200;

                    return response()->json($arr,$status_code);
                }
                else {
                    $user->update([
                        'country_code' => $country_code,
                        'phone' => $phone,
                        //'email' => rand(10,100),
                        'longitude' => $input['longitude'],
                        'latitude' => $input['latitude'],
                        'online'   => date('Y-m-d h:i:s'),
                        'u_id'  => isset($input['u_id']) && is_numeric($input['u_id']) ?  $input['u_id'] : 0,
                        'device_type'  =>$input['device_type'],
                    ]);
                    $data['already_exists'] = 1;
                }
                
            }
            $settings = Setting::all();
            $token = $user->createToken('BodyFirst')->accessToken;
            $token_update = $user->update([
                'api_token' => $token,
            ]);
            $data['api_token'] = $token;
            $data['id'] = $user->id;
            $data['name'] = $user->name;
            $data['email'] = $user->email;
            $data['phone'] = $user->phone;
            $data['country_code'] = $user->country_code;
            $data['image'] = $user->image;
            $data['description'] = null;
            $data['is_verified'] = $user->is_verified;
            $arr = ['success' => true, 'message' => 'Your activation code has been verified succesfully', 'data' => $data, 'status' => 200];
            $status_code = 200;
        } else {
            $arr = ['message' => $check['message'], 'status' => 400];
            $status_code = 400;
        }        

        return response()->json($arr,$status_code);
    }


    public function updateProfile(Request $request)
    {
        $id = $request->user('api')->id;
        if (User::where('id', $id)->exists()) {
            $User = User::find($id);
         //    if ($request->file('image')) {
	        //     $front = $request->file('image');
	        //     $ext = pathinfo($front->getClientOriginalName(), PATHINFO_EXTENSION);
	        //     $frontImageName = uniqid().'.'.$ext;
	        //     $destinationPath = public_path('/uploads');
	        //     $front->move($destinationPath, $frontImageName);
	        //     $siteURL = \Config::get('app.url');
	        //     $imageUrl = $siteURL.'/public/uploads/' .$frontImageName;
	        // }
	        // else {
	        // 	$imageUrl = null;	
	        // }

            $userEmail = $User->email;
            $User->update([
                'email' => $userEmail.'_'.date('Y/m/d h:i:s')
            ]);

            $validator = Validator::make($request->all(), [
                'email' => 'required|unique:users'
            ]);
            if ($validator->fails()) {

                return response()->json(['message' => $validator->errors(), 'success' => 200], 422);
            }
            $User->update([
                'email' => $request->get('email'),
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'is_verified' => 1,
            ]);
            $arr = ['message' => 'Updated successfully', 'status' => 200];
        } else {
            $arr = ['success' => 'Unauthorised', 'status' => 401];
        }

        return response()->json($arr);
    }

    public function uploadImage(Request $request)  
    {
        $status = 200;
        // $this->validate($request, [
        //     'image' => 'required|mimes:jpg,jpeg,png',
        // ]);
        // if ($request->file('image')) {
        //     $front = $request->file('image');
        //     $ext = pathinfo($front->getClientOriginalName(), PATHINFO_EXTENSION);
        //     $frontImageName = uniqid().'.'.$ext;
        //     $destinationPath = public_path('/uploads');
        //     //$destinationPath = env('APP_URL').'/assets/uploads';
        //     $front->move($destinationPath, $frontImageName);
        //     $siteURL = \Config::get('app.url');
        //     $imageUrl = $siteURL.'/public/uploads/' .$frontImageName;
        //     $id = $request->user('api')->id;
        //     $User = User::find($id);
        //     if ($User) {
        //         $User->update([
        //             'image' => $imageUrl,
        //         ]);
        //     }
            
        //     //$imageUrl = asset('/uploads/' .$frontImageName);
        //     $resArr =  ['message' => 'Image uploaded successfully', 'url' => $imageUrl, 'status' => 200];
        // }
        if ($request->get('image')) {
            $image = $request->image;  // your base64 encoded
            $image = str_replace('data:image/jpeg;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(12).'.'.'jpeg';
            $siteURL = \Config::get('app.url');
            //\File::put($siteURL. '/public/uploads/' . $imageName, base64_decode($image));
            // \File::put(public_path('/uploads'). '/' . $imageName, base64_decode($image));
            // $imageUrl = $siteURL.'/public/uploads/' .$imageName;
            $base64Image = base64_decode($image);
            $imageUrl = Storage::disk('s3')->put('' . $imageName, $base64Image, 'public');
            $id = $request->user('api')->id;
            $User = User::find($id);
            if ($User) {
                $User->update([
                    // 'image' => $imageUrl,
                    'image' = Storage::disk('s3')->url($imageName)
                ]);
            }
            
            
            $resArr =  ['message' => 'Image uploaded successfully', 'url' => $imageUrl, 'status' => 200];
        }
        else {
            $resArr =  ['message' => 'Please upload a valid image', 'status' => 400];   
        }

        return response()->json($resArr, $status);
    }

    public function nearByUsers(Request $request)
    {
        $id = $request->user('api')->id;
        $user = User::where('id', $id)->first();
        //dd($user);
        //if ($user && $user->country_code) {
        if ($user && $user->latitude && $user->longitude) {
             $nearByUsers= DB::table("users")
              ->select("users.id", \DB::raw("6371 * acos(cos(radians(" . $user->latitude . "))
              * cos(radians(users.latitude)) 
              * cos(radians(users.longitude) - radians(" . $user->longitude . ")) 
              + sin(radians(" .$user->latitude. ")) 
              * sin(radians(users.latitude))) AS distance"))
              ->where('id', '!=', $id)
              ->where('country_code', '=', $user->country_code)
              ->having('distance', '>', 0)
              ->get();
            //$nearByUsers= User::where('country_code', $user->country_code)->where('id', '!=', $id)->get();
        }
        else {
            $nearByUsers = [];
        }
        
         $nearByUsersData = [];
         if (sizeof($nearByUsers) > 0) {
         	foreach ($nearByUsers as $value) {
	         	$userData = User::where('id', $value->id)->first();
	         	
	         	if ($userData) {
                    $milesVal = $value->distance/1.6093;
	         		$userData->distance = round($milesVal);
	         		array_push($nearByUsersData, $userData);	
	         	}
	         	
	         }
        }
            
        $arr = ['data' => $nearByUsersData, 'status' => 200];
        
        return response()->json($arr);
    }

    public function updateVisibilityStatus(Request $request)
    {
        $id = $request->user('api')->id;
        if (User::where('id', $id)->exists()) {
            $User = User::find($id);
            $User->update([
                'is_visible' => $request->get('is_visible'),
            ]);
            $arr = ['message' => 'Updated successfully', 'status' => 200];
        } else {
            $arr = ['success' => 'Unauthorised', 'status' => 401];
        }

        return response()->json($arr);
    }

    public function userData(Request $request)
    {
        $id = $request->user('api')->id;
        if (User::where('id', $id)->exists()) {
            $User = User::find($id);
            
            $arr = ['message' => 'Data found', 'data' => $User, 'status' => 200];
        } else {
            $arr = ['success' => 'Unauthorised', 'status' => 401];
        }

        return response()->json($arr);
    }

    public function userDetail($userId,Request $request)
    {
        $id = $request->user('api')->id;
        if (User::where('id', $id)->exists()) {
            $User = User::find($userId);
            $ratings = UserRating::where('user_id', $userId)->pluck('rating');
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
            
            $User->ratings = round($avg);
            
            $arr = ['message' => 'Data found', 'data' => $User, 'status' => 200];
        } else {
            $arr = ['success' => 'Unauthorised', 'status' => 401];
        }

        return response()->json($arr);
    }

    public function rateUser(Request $request)
    {
        $id = $request->user('api')->id;
        if (User::where('id', $id)->exists()) {
            $User = UserRating::create([
                'user_id'   => $request->get('user_id'),
                'sent_id'   => $id,
                'rating'   => $request->get('ratings'),
                'offer_id'   => $request->get('offer_id'),
            ]);
            
            $arr = ['message' => 'Successfull',  'status' => 200];
        } else {
            $arr = ['success' => 'Unauthorised', 'status' => 401];
        }

        return response()->json($arr);
    }

    public function markOnline(Request $request)
    {
        $id = $request->user('api')->id;
        $user = User::where('id', $id)->first();
        if ($user) {
            $user->update([
                'online' => gmdate("Y-m-d H:i:s")        ]);
            
            $arr = ['message' => 'Successfull',  'status' => 200];
        } else {
            $arr = ['success' => 'Unauthorised', 'status' => 401];
        }

        return response()->json($arr);
    }

    public function markOffline(Request $request)
    {
        $id = $request->user('api')->id;
        $user = User::where('id', $id)->first();
        if ($user) {
            $user->update([
                //'offline' => date('Y-m-d h:i:s')
                'offline' => gmdate("Y-m-d H:i:s")
            ]);
            
            $arr = ['message' => 'Successfull',  'status' => 200];
        } else {
            $arr = ['success' => 'Unauthorised', 'status' => 401];
        }

        return response()->json($arr);
    }

    public function logout(Request $request)
    {
        $id = $request->user('api')->id;  
        $user = User::where('id', $id)->first();
        if ($user) {
            $user->update([
                'offline' => gmdate("Y-m-d H:i:s")
            ]);
            $user = auth()->user()->token()->revoke();

            return response()->json(['message' => "Logout successfully", "success" => true, 'status' => 200]);

        } else {

            return response()->json(["message" => "User not found", "success" => false, "status" => 200]);
        }
    }


    public function deleteUser(Request $request)
    {
        $id = $request->user('api')->id;  
        $user = User::where('id', $id)->first();
        if ($user) {
            $user->update([
                'is_deleted' => 1
            ]);

            $to_email = $user->email;
            if ($to_email) {
                Mail::send('mails.delete-user', function ($message) use ($to_email) {
                    $message->from('support@peerhunter.com', 'PeerHunter');
                    $message->to($to_email)->subject('Account deleted');
                });
            }

            // $account_sid = "ACc6564e2c5b04b0c9d95b0fe40b2f77ca";
            // $auth_token = "b9f51b2c618a0b59f79dada314ecbc48";
            // $twilio_number = "+15076973018";
            // $client = new Client($account_sid, $auth_token);
            // $client->messages->create("+918295651808", ['from' => $twilio_number, 'body' => "Your PeerHunter account has been deleted"]);

            return response()->json(['message' => "Deleted successfully", "success" => true, 'status' => 200]);

        } else {

            return response()->json(["message" => "User not found", "success" => false, "status" => 200]);
        }
    }




}





