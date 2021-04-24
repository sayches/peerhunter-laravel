<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('user');
    }

//    public function create() {
//        
//    }

    public function create() {
        return view('users.create');
    }

    public function store(Request $request) {

//        $request->validate([
//            'name' => 'required',
//            'email' => 'required',
//            'password' => 'required',
//            'address' => 'required',
//            'city' => 'required',
//            'zip_code' => 'required',
//            'state' => 'required',
//            'country' => 'required'
//        ]);

        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->role = 2;
        $user->phone_number = request('phone_number');
        $user->address = request('address');
        $user->city = request('city');
        $user->state = request('state');
        $user->zip_code = request('zip_code');
        $user->country = request('country');
        $user->description = request('description');
        if ($request->hasFile('profile_image')) {
            $user->profile_image_url = request()->file('profile_image')->store('public/images');
        }

        $user->visibility_type = request('visibility_type');
        $user->password = request('password');
        $user->save();
        if ($user->id) {
            return view('users.create')->withSuccess('Success message');
        } else {
            return view('users.create')->withFail('Error message');
        }
    }

}
