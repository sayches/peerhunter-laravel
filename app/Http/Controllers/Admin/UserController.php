<?php
namespace App\Http\Controllers\Admin;

use App\Corporation;
use App\ExerciseCompletion;
use App\User;
use App\UserInvitation;
use App\UserProfile;
use App\NotificationType;
use App\UserSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Setting;
use \PDF;

class UserController extends Controller
{
    public function index(Request $request)

    {
        if ($request->ajax()) {
            try {
                $users = User::role('user')->get()->map(function ($item) {

                    return [
                        "id" => $item->id,
                        "name" => $item->name ? ucfirst($item->name) : "Not Available",
                        "email" => $item->email ? $item->email : "Not Available",
                        "phone" => $item->country_code.'-'.$item->phone,
                    ];
                });  
            } catch (\Exception $e) {
                $users = [];
            }

            return DataTables::of($users)
            ->addColumn('action', function ($user) {
                return view('users.actions', compact('user'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('users.index');
    }


    /**

     * Store a newly created resource in storage.

     *

     * @param \Illuminate\Http\Request $request

     * @return \Illuminate\Http\Response

     */

    public function add(Request $request)
    {

        if ($request->post()) {
            $this->validate($request, [
                'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|min:3|max:35',
                'email' => 'required|email|unique:users,email',
                'country_code' => 'required',
                'phone' => 'required',
            ]);

            try {

                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'country_code' => '+'.$request->country_code,
                    'phone' => $request->phone,
                ]);

                if ($user) {
                    $user->assignRole('user');
                    $arr = array('message' => 'User created successfully', 'status' => 200);
                } else {
                    $arr = array('message' => 'Error while creating user. Please try after some time', 'status' => 401);
                }
            } catch (\Swift_TransportException $ex) {
                $arr = array('message' => $ex->getMessage(), 'status' => 401);
            }

            return response()->json($arr);
        }

        return view('users.add');
    }



    /**

     * @param Request $request

     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View

     * @throws \Illuminate\Validation\ValidationException

     */

    public function edit($id)

    {

        $id = base64_decode($id);

        $user = User::where('id', $id)->firstOrFail();

        if ($user) {



            return view("users.edit", compact('user'));

        }



    }



    /**

     * @param Request $request

     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View

     * @throws \Illuminate\Validation\ValidationException

     */

    public function update(Request $request)
    {
        $user = User::where('id', $request->id)->firstOrFail();

        if ($request->post()) {
            $email = Str::random(8);
            $user->update([
                'email' => $email,
            ]);

            $this->validate($request, [
                'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|min:3|max:35',
                'email' => 'required|email|unique:users,email',
                'country_code' => 'required',
                'phone' => 'required',
            ]);

            try {
                $userUpdate = $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'country_code' => '+'.$request->country_code,
                    'phone' => $request->phone,
                ]);

                if ($userUpdate) {
                    $arr = array('message' => 'User updated successfully', 'status' => 200);
                } else {
                    $arr = array('message' => 'Error while updating user. Please try after some time', 'status' => 401);
                }
            } catch (\Exception $e) {
                $arr = array('message' => 'Failed to update User.', 'status' => 401);
            }

            return response()->json($arr);
        }

        return view("users.edit", compact('user'));
    }



    /**

     * @param Request $request

     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View

     * @throws \Illuminate\Validation\ValidationException

     */

    public function view($id)

    {

        $id = base64_decode($id);

        $user = User::where('id', $id)->firstOrFail();

        return view("users.view", compact('user'));

    }



    /**

     * @param Request $request

     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View

     * @throws \Illuminate\Validation\ValidationException

     */

    public function delete($id)

    {

        $id = base64_decode($id);

        $user = User::where('id', $id)->first();

        if ($user) {



            $email = Str::random(8);

            $user->update([

                'email' => $email,

            ]);

            $user->delete();



            $arr = array('message' => 'User deleted successfully', 'status' => 200);

        } else {

            $arr = array('message' => 'User not found', 'status' => 401);

        }



        return response()->json($arr);

    }



    /**

     * Update Status

     *

     * @param Request $request

     * @return Json

     * @throws \Illuminate\Validation\ValidationException

     */

    public function updateStatus(Request $request)

    {

        $ID = $request->input('id');

        $Status = $request->input('status');

        if ($Status == 1) {

            $Status = false;

        } else {

            $Status = true;

        }

        $response = User::where('id', $ID)->update(['is_blocked' => $Status]);



        if ($response == 1) {

            return response()->json([

                'success' => 'true',

                'id' => $ID,

                'status' => $Status,

            ]);

        } else {

            return response()->json([

                'success' => 'false',

            ]);

        }

    }


    /**

     * @param Request $request

     * @return mixed

     */

    public function updateImage(Request $request)

    {



        $image = $request->file('image');

        if ($image) {



            $input['imagename'] = 'profile_image_' . time() . '.' . $image->extension();

            $destinationPath = public_path('/uploads');

            $image->move($destinationPath, $input['imagename']);

            auth()->user()->update([

                'image' => $input['imagename']

            ]);

            $response['success'] = "200";

        }

        return response()->json($response);

    }




}

