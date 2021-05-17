<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\User;
use App\Offer;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;
use Hash;
use Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['resetPassword']]);
    }

    public function index(Request $request)
    {
        if (auth()->user()->hasRole('admin')) {
            $userCount = User::all()->count();
            $weeklyUsers = User::where('created_at', '>', Carbon::now()->startOfWeek())->where('created_at', '<', Carbon::now()->endOfWeek())->get()->count();
            $monthlyUsers = User::whereMonth('created_at', Carbon::now()->month)->get()->count();
            $yearlyUsers = User::whereYear('created_at', Carbon::now()->year)->get()->count();
            $deletedUsers =  User::whereYear('created_at', Carbon::now()->year)->where('is_deleted', 1)->get()->count();

            $offerCount = Offer::all()->count();
            $weeklyOffers = Offer::where('created_at', '>', Carbon::now()->startOfWeek())->where('created_at', '<', Carbon::now()->endOfWeek())->get()->count();
            $monthlyOffers = Offer::whereMonth('created_at', Carbon::now()->month)->get()->count();
            $yearlyOffers = Offer::whereYear('created_at', Carbon::now()->year)->get()->count();
            $offerAcceptedCount = Offer::whereYear('created_at', Carbon::now()->year)->where('is_accepted',1)->get()->count();
            
            //dd($userCount,$weeklyUsers,$monthlyUsers,$yearlyUsers,$offerCount,$weeklyOffers,$monthlyOffers,$yearlyOffers);

            return view('dashboard.admin',compact('userCount','offerCount','weeklyUsers','monthlyUsers','yearlyUsers','weeklyOffers','monthlyOffers','yearlyOffers','deletedUsers','offerAcceptedCount'));
        } else {
            $this->performLogout($request);

            return redirect()->route('login');
        }
    }

    public function usersData(Request $request)
    {
        $userCount = User::all()->count();

        return view('dashboard.admin',compact('userCount','offerCount'));
    }




    public function makeAdmin(Request $request)
    {
        $user = User::find(base64_decode($request->id));
        $user->assignRole('admin');

        return redirect()->back()->with([
            'message-type' => 'success',
            'message' => 'Role Updated Successfully.'
        ]);
    }



    public function users(Request $request)

    {

        if ($request->ajax()) {

            $data = User::where('id', '!=', auth()->id())->get()->map(function ($item) {

                return [

                    "id" => $item->id,

                    "username" => $item->name,

                    "email" => $item->email,

                    "role" => $item->roles->pluck('name')

                ];

            });

            return Datatables::of($data)

                ->addColumn('action', function ($data) {

                    return view('tds.user-action', compact('data'))->render();

                })

                ->rawColumns(['action'])

                ->make(true);

        } else {

            return view('users');

        }



    }



    public function profile(Request $request)

    {

        $user = User::findOrFail(auth()->user()->id);

        if ($user) {



            return view('users._includes._profile', compact('user'));

        }



        return view('users._includes._profile');

    }



    public function updateProfile(Request $request)

    {

        $data = $request->all();



        $user = User::where('id', auth()->user()->id)->first();

        if ($user) {



            // $email = Str::random(8);

            // $user->update([

            //     'email' => $email,

            // ]);



            $user->update([

                'name' => $request->get('name'),

                // 'email' => $request->get('email'),

                'phone' => $request->get('phone'),

                'country_code' => $request->get('dial_code'),

                'iso2' => $request->get('iso2'),

            ]);



            if ($request->get('dob') != null) {



                $dob = new \DateTime(date("Y-m-d", strtotime($request->get('dob'))));



                if ($user->profile) {

                    $user->profile->update([

                        'dob' => $dob,

                    ]);

                } else {

                    UserProfile::create([

                        "dob" => $dob,

                        "user_id" => $user->id,

                    ]);

                }

            }



            if ($request->get('new_password') != null) {

                if (!Hash::check($request->get('old_password'), $user->password)) {



                    $arr = array('message' => 'Old password does not match', 'status' => 401);

                }

                if ($request->get('old_password') == $request->get('new_password')) {



                    $arr = array('message' => 'Old password and new password can not be same', 'status' => 401);

                }

                $password = $request->get('new_password');

                $user->update([

                    'password' => Hash::make($request->get('new_password'))

                ]);



                $arr = array('message' => 'Profile updated successfully', 'status' => 200);

            } else {

                $arr = array('message' => 'Profile updated successfully', 'status' => 200);

            }

        } else {



            $arr = array('message' => 'Data not found', 'status' => 401);

        }



        return response()->json($arr);

    }



    public function updatePassword(Request $request)

    {



        $user = User::findOrFail(auth()->user()->id);

        if ($user) {



            $this->validate($request, [

                'old_password' => 'required',

                'new_password' => 'required|min:6|max:25',

                'confirm_password' => 'required|same:new_password',



            ],

                [

                    'confirm_password.same' => 'The confirm password and new password must be same',

                ]);

            if (!Hash::check($request->get('old_password'), $user->password)) {



                return redirect()->to('/profile')->with(['message' => "Old password does not match", 'type' => "error"]);



            }

            if ($request->get('old_password') == $request->get('new_password')) {



                return redirect()->to('/profile')->with(['message' => "Old password and new password can not be same", 'type' => "error"]);



            }

            $password = $request->get('new_password');

            $user->update([

                'password' => Hash::make($request->get('new_password'))

            ]);



            return redirect()->to('/profile')->with(['message' => "Password changed successfully", 'type' => "success"]);



        }



        return view('profile');

    }



    public function resetPassword(Request $request)

    {



        $user = User::where("email", $request->get('email_old'))->first();

        if ($user) {



            $this->validate($request, [

                'password' => 'required|min:6|max:25',

                'password_confirmation' => 'required|same:password',

            ]);



            $password = $request->get('password');

            $user->update([

                'password' => Hash::make($request->get('password'))

            ]);

            if ($user->hasRole('admin')) {

                $assignedRole = "admin";

            } else {

                $assignedRole = "user";

            }



            $user->assignRole($assignedRole);



            Auth::logout();





            return view('auth.passwords.updated', compact('assignedRole'));



            //return redirect()->to('/password/updated')->with(['role' => $assignedRole]);  

        }

        return redirect()->to('/')->with(['message' => "User not valid"]);

    }



    public function changeNotificationStatus($id)

    {



        $notification = AdminNotification::where('id', $id)->first();

        if ($notification) {

            $notification->update([

                'is_read' => 1,

            ]);



            $arr = ['status' => 200, 'message' => "Status updated successfully"];

        } else {

            $arr = ['status' => 401, 'message' => "Notification not found"];

        }



        return response()->json($arr);

    }



}

