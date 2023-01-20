<?php

namespace App\Http\Controllers;

use App\Imports\HCVImport;
use App\Mail\HCVMail;
use App\Models\HCV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\MailLog;

class HCVController extends Controller
{
    /**
     * post hepB test results
     */
    public function index()
    {
        return view('back-end.blood-group-upload');
    }

    /**
     * upload the hep-b-test
     */
    public function store(Request $request)
    {
        Excel::import(new HCVImport, $request->file('file')->store('temp'));

        return back()->with('status', 'File upload successfully!');
    }

    /**
     * list all hep-b test
     */
    public function blood_group_reults()
    {
        $data = HCV::orderBy('id', 'desc')->get();

        return view('back-end.blood-group-results', ["data"=>$data]);
    }

    /**
     * demo file download
     */
    public function blood_group_sample()
    {
        $file_path = public_path('sample/blood_group_demo.csv');
        return response()->download($file_path);
    }

    /**
     * Send result to mail
     */
    public function sendBloodGroupMail(Request $request)
    {
        $patient_id = $request->id;
        $mailData = HCV::where('id', $patient_id)->firstOrFail();

        $findEmail = $mailData["patient_email"];

        $email = (Crypt::decryptString($findEmail));

        Mail::to($email)->send(new HCVMail($mailData));

        if(Mail::failures())
        {
            //dd('Mail failed');
            $checker = new MailLog();
            $checker->patient_id = $patient_id;
            $checker->email = $email;
            $checker->delivery_status = "Failed";
            $checker->save();

            return response()->json([
                "datas" => $mailData,
                "message" => "Mail not send:".$email,
                "status" => 500
            ]);
        }

        //print_r('success');
        $checker = new MailLog();
        $checker->patient_id = $patient_id;
        $checker->email = $email;
        $checker->delivery_status = "Success";
        $checker->save();

        return response()->json([
            "datas" => $mailData,
            "message" => "Mail send to:".$email,
            "status" => 200
        ]);

    }

    /**
     * Print hep-b record
     */
    public function printBloodGroupResult($id)
    {
        $result = HCV::where('id', $id)->first();

        $pdf = PDF::loadView('psa-urea-resultsheet', ["result"=> $result]);

        return $pdf->download($result->patient_name.'.pdf');
    }

    /**
     * send mail to multiple hep-b result to users
     */
    public function send_multi_blood_group_mail_result(Request $request)
    {
        $patients = HCV::whereIn('id', $request->ids)->get();

        if($patients->count() > 0)
        {

            foreach($patients as $key => $mailData)
            {
                Mail::to(Crypt::decryptString($mailData->patient_email))->send(new HCVMail($mailData));
            }
        }

        return response()->json(['done']);
    }
}
