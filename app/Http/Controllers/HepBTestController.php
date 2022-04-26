<?php

namespace App\Http\Controllers;

use App\Imports\HepBTestImport;
use App\Mail\HepBTest as MailHepBTest;
use App\Models\HepBTest;
use App\Models\MailLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;





class HepBTestController extends Controller
{
    /**
     * post hepB test results
     */
    public function index()
    {
        return view('back-end.new-hepb-test');
    }

    /**
     * upload the hep-b-test
     */
    public function store(Request $request)
    {
        Excel::import(new HepBTestImport, $request->file('file')->store('temp'));

        return back()->with('status', 'File upload successfully!');
    }

    /**
     * list all hep-b test
     */
    public function all_hep_reults()
    {
        $data = HepBTest::orderBy('id', 'desc')->get();

        return view('back-end.hep_results', ["data"=>$data]);
    }

    /**
     * demo file download
     */
    public function hep_sample()
    {
        $filePath = public_path("sample/hep-b-test-demo.csv");

        $headers = ['Content-Type: application/csv'];

        $fileName = 'hep_test_result_sample_data.csv';


        return response()->download($filePath, $fileName, $headers);
    }

    /**
     * Send result to mail
     */
    public function sendHepBMail(Request $request)
    {
        $patient_id = $request->id;
        $mailData = HepBTest::where('id', $patient_id)->firstOrFail();

        $findEmail = $mailData["patient_email"];

        $email = (Crypt::decryptString($findEmail));

        Mail::to($email)->send(new MailHepBTest($mailData));

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
    public function printHepResult($id)
    {
        $result = HepBTest::where('id', $id)->first();

        $pdf = PDF::loadView('hep-b-print-result', ["result"=> $result]);

        return $pdf->download($result->patient_name.'.pdf');
    }

    /**
     * send mail to multiple hep-b result to users
     */
    public function send_multi_hep_mail_result(Request $request)
    {
        $patients = HepBTest::whereIn('id', $request->ids)->get();

        if($patients->count() > 0)
        {

            foreach($patients as $key => $mailData)
            {
                Mail::to(Crypt::decryptString($mailData->patient_email))->send(new MailHepBTest($mailData));
            }
        }

        return response()->json(['done']);
    }
}
