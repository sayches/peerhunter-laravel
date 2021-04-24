<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
// use App\Setting;
use Setting;

class SettingsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request)
    {

		$allData = Setting::all(); 

        return view('settings.index',compact('allData'));
    }

    public function updateSettings(Request $request)
    {

        
        foreach ($request->except('_token') as $key => $value) {
            if ($value != null) {
                $setting = setting([$key => $value]);
            }
        }

        if (isset($setting)) {
        	$arr = array('message' => "Settings updated successfully", 'status' => 200);
        }
        else {
        	$arr = array('message' => "Something went wrong. Please try after sometime", 'status' => 401);	
        }

        return response()->json($arr);
    }
}


