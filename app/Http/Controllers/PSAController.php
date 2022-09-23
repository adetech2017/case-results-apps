<?php

namespace App\Http\Controllers;

use App\Imports\PSAImport;
use App\Imports\PTImport;
use App\Mail\PSAMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\MailLog;
use App\Models\PSA;

class PSAController extends Controller
{
    /**
     * post hepB test results
     */
    public function index()
    {
        return view('back-end.psa-test-upload');
    }

    /**
     * upload the hep-b-test
     */
    public function store(Request $request)
    {
        Excel::import(new PSAImport, $request->file('file')->store('temp'));

        return back()->with('status', 'File upload successfully!');
    }

    /**
     * list all hep-b test
     */
    public function psa_reults()
    {
        $data = PSA::orderBy('id', 'desc')->get();

        return view('back-end.psa-test-results', ["data"=>$data]);
    }

    /**
     * demo file download
     */
    public function psa_sample()
    {
        $file_path = public_path('sample/psa_urea_demo.csv');
        return response()->download($file_path);
    }

    /**
     * Send result to mail
     */
    public function sendPsaMail(Request $request)
    {
        $patient_id = $request->id;
        $mailData = PSA::where('id', $patient_id)->firstOrFail();

        $findEmail = $mailData["patient_email"];

        $email = (Crypt::decryptString($findEmail));

        Mail::to($email)->send(new PSAMail($mailData));

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
    public function printUreaResult($id)
    {
        $result = PSA::where('id', $id)->first();

        $pdf = PDF::loadView('psa-urea-resultsheet', ["result"=> $result]);

        return $pdf->download($result->patient_name.'.pdf');
    }

    /**
     * send mail to multiple hep-b result to users
     */
    public function send_multi_psa_mail_result(Request $request)
    {
        $patients = PSA::whereIn('id', $request->ids)->get();

        if($patients->count() > 0)
        {

            foreach($patients as $key => $mailData)
            {
                Mail::to(Crypt::decryptString($mailData->patient_email))->send(new PSAMail($mailData));
            }
        }

        return response()->json(['done']);
    }
}
