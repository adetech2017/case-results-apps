<?php

namespace App\Http\Controllers;

use App\Imports\CreatinineImport;
use App\Mail\CreatinineMail;
use App\Models\Creatinine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\MailLog;

class CreatinineController extends Controller
{
    /**
     * post hepB test results
     */
    public function index()
    {
        return view('back-end.creatine-upload');
    }

    /**
     * upload the hep-b-test
     */
    public function store(Request $request)
    {
        Excel::import(new CreatinineImport, $request->file('file')->store('temp'));

        return back()->with('status', 'File upload successfully!');
    }

    /**
     * list all hep-b test
     */
    public function creatinine_reults()
    {
        $data = Creatinine::orderBy('id', 'desc')->get();

        return view('back-end.creatine-results', ["data"=>$data]);
    }

    /**
     * demo file download
     */
    public function creatinine_sample()
    {
        $file_path = public_path('sample/psa_urea_demo.csv');
        return response()->download($file_path);
    }

    /**
     * Send result to mail
     */
    public function sendCreatinineMail(Request $request)
    {
        $patient_id = $request->id;
        $mailData = Creatinine::where('id', $patient_id)->firstOrFail();

        $findEmail = $mailData["patient_email"];

        $email = (Crypt::decryptString($findEmail));

        Mail::to($email)->send(new CreatinineMail($mailData));

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
    public function printCreatinineResult($id)
    {
        $result = Creatinine::where('id', $id)->first();

        $pdf = PDF::loadView('psa-urea-resultsheet', ["result"=> $result]);

        return $pdf->download($result->patient_name.'.pdf');
    }

    /**
     * send mail to multiple hep-b result to users
     */
    public function send_multi_creatinine_mail_result(Request $request)
    {
        $patients = Creatinine::whereIn('id', $request->ids)->get();

        if($patients->count() > 0)
        {

            foreach($patients as $key => $mailData)
            {
                Mail::to(Crypt::decryptString($mailData->patient_email))->send(new CreatinineMail($mailData));
            }
        }

        return response()->json(['done']);
    }
}
