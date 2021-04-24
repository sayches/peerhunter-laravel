<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\User;
use App\Offer;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use DB;

class OfferController extends Controller
{
    public function index(Request $request)

    {
        if ($request->ajax()) {
            try {
                $offers = Offer::all()->map(function ($item) {
                    return [
                        "id" => $item->id,
                        "sent_by" => $item->sendBy && $item->sendBy->name ? $item->sendBy->name : 'N/A',
                        "sent_to" => $item->sendTo && $item->sendTo->name ? $item->sendTo->name : 'N/A',
                        "range" => $item->currency.''.$item->min_value.'-'.$item->currency.''.$item->max_value,
                    ];
                });  
            } catch (\Exception $e) {
                $offers = [];
            }

            return DataTables::of($offers)
            ->addColumn('action', function ($offer) {
                return view('offers.actions', compact('offer'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('offers.index');
    }

    public function view($id)
    {
        $id = base64_decode($id);
        $offer = Offer::where('id', $id)->firstOrFail();
       
        return view("offers.view", compact('offer'));
    }

    public function delete($id)
    {
        $id = base64_decode($id);
        $offer = Offer::where('id', $id)->first();
        if ($offer) {
            $offer->delete();
            $arr = array('message' => 'Offer deleted successfully', 'status' => 200);
        } else {
            $arr = array('message' => 'Offer not found', 'status' => 401);
        }

        return response()->json($arr);
    }
}
