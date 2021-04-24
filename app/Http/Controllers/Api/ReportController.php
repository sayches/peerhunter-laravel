<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\User;
use App\Report;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\UserRating;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use DB;
use Helper1;

class ReportController extends Controller
{
    public function report(Request $request)  
    {
        $id = $request->user('api')->id;
        if (User::where('id', $id)->exists()) {
            $validator = Validator::make($request->all(), [
	            'report_to' => 'required',
	            'option' => 'required',
	            'comment' => 'required',
	            
	        ]);

	        if ($validator->fails()) {

	            return response()->json(['message' => $validator->errors(), 'success' => $status], 422);
	        }

            $report = Report::create(array_merge($request->all(),[
            	'report_by' => $id
            ]));
            if ($report) {
                $user = User::where('id', $id)->first();
                if ($user && $user->device_type != null && $user->u_id != null) {
                    $data = [
                        "reg_token" => $user->u_id,
                        "title" => "PeerHunter",
                        "message" => "Your report has been submitted successfully",
                        "is_notification" => false,
                    ];
                    $foo = new Helper1();
                    $sendNotification = $foo->sendAndroid($data); 
                }
            	$arr = ['message' => 'Thanks for letting us know', 'status' => 200];
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
