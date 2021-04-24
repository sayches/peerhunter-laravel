<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\User;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use DB;

class OrderController extends BaseController
{
    public function createOrder(Request $request)  
    {
        $id = $request->user('api')->id;
        if (User::where('id', $id)->exists()) {
            $validator = Validator::make($request->all(), [
	            'mode' => 'required',
	            'currency' => 'required',
	            'min_value' => 'required',
	            'max_value' => 'required',
	            'payment_method' => 'required',
	            'description' => 'required'
	        ]);

	        if ($validator->fails()) {

	            return response()->json(['message' => $validator->errors(), 'success' => $status], 422);
	        }

            $order = Order::create(array_merge($request->all(),[
            	'user_id' => $id,
            ]));
            if ($order) {
            	$arr = ['message' => 'Added successfully', 'status' => 200];
            }
            else {
            	$arr = ['success' => 'Error', 'status' => 401];
            }
            
        } else {
            $arr = ['success' => 'Unauthorised', 'status' => 401];
        }

        return response()->json($arr);
    }

    public function orders(Request $request)  
    {
        $id = $request->user('api')->id;
        if (User::where('id', $id)->exists()) {
            $orders = Order::where('user_id', $id)->get();
            if ($orders) {
                $arr = ['message' => 'found successfully', 'data' =>$orders,  'status' => 200];
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
