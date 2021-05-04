<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\User;
use App\Report;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use DB;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            try {
                $reports = Report::all()->map(function ($item) {
                    return [
                        "id" => $item->id,
                        "report_by" => $item->reportBy && $item->reportBy->name ? ucfirst($item->reportBy->name) : 'N/A',
                        "report_to" => $item->reportTo && $item->reportTo->name ? ucfirst($item->reportTo->name) : 'N/A',
                        "option" => ucfirst($item->option),
                        'is_blocked'    => $item->reportTo ? $item->reportTo->is_blocked : 0
                    ];
                });  
            } catch (\Exception $e) {
                $reports = [];
            }

            return DataTables::of($reports)
            ->addColumn('action', function ($report) {
                return view('reports.actions', compact('report'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('reports.index');
    }

    public function sendWarning(Request $request) {
    	//dd($request->all());
    	$report = Report::where('id', $request->get('id'))->first();

    	if ($report) {
    		$to_email = $item->reportBy && $item->reportBy->email ? $item->reportBy->email : null;
    		//$to_email = "nancy@yopmail.com";
    		if ($to_email) {
    			Mail::send('mails.warning',[] ,function ($message) use ($to_email) {
	                $message->from('support@sayches.com', 'PeerHunter');
	                $message->to($to_email)->subject('Warning Mail');
	            });
    		}
    		else {
    			// $account_sid = "ACc6564e2c5b04b0c9d95b0fe40b2f77ca";
	      //       $auth_token = "b9f51b2c618a0b59f79dada314ecbc48";
	      //       $twilio_number = "+15076973018";
	      //       $client = new Client($account_sid, $auth_token);
	      //       $client->messages->create("+918295651808", ['from' => $twilio_number, 'body' => "Your PeerHunter account has been deleted"]);
    		}
    		$arr = array('message' => 'Warning sent successfully', 'status' => 200);

    		return response()->json($arr);
    	}
    }

    public function viewReport($id) {
        
        $report = Report::where('id', $id)->first();
        
        if ($report) {
            
            $data = [];
            $data["report_by"] = $report->reportBy && $report->reportBy->name ? ucfirst($report->reportBy->name) : 'N/A';
            $data["report_to"] = $report->reportTo && $report->reportTo->name ? ucfirst($report->reportTo->name) : 'N/A';
            $data["option"] = ucfirst($report->option);
            $data["comment"] = ucfirst($report->comment);
            //dd($data);
            $arr = array('data' => $data, 'status' => 200);
        }
        else {
            $arr = array('message' => "Data not found", 'status' => 200);
        }

        return response()->json($arr);
    }

    public function blockUser($id) {
        

        $report = Report::where('id', $id)->first();
        
        if ($report && $report->reportTo) {

            $user = User::where('id', $report->reportTo->id)->first();
            if ($user) {
                $user->update([
                    'is_blocked' => $user->is_blocked == 0 ? 1 : 0
                ]);

                $arr = array('message' => "Status updated successfully", 'status' => 200);
            }
            else {
                $arr = array('message' => "Data not found", 'status' => 200);
            }
        }
        else {
            $arr = array('message' => "Data not found", 'status' => 200);
        }

        return response()->json($arr);
    }


}
