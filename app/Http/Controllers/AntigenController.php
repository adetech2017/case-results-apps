<?php

namespace App\Http\Controllers;

use App\Mail\AntigenTestMail;
use App\Models\AntigenTestResult;
use App\Models\MailLog;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;


class AntigenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AntigenTestResult::orderBy('id', 'desc')->get();

        return view('back-end.antigen-results', ["data" => $data]);
    }

    /**
     * Print antigen patience record
     */
    public function printAntigen($id)
    {
        $result = AntigenTestResult::where('id', $id)->first();

        $pdf = PDF::loadView('antigen-test-result', ["result" => $result]);

        return $pdf->download($result->patient_name . '.pdf');
    }

    /**
     * Send result to mail single patient
     * antigen test
     */
    public function sendPatientMailAntigen(Request $request)
    {
        $patient_id = $request->id;
        $mailData = AntigenTestResult::where('id', $patient_id)->firstOrFail();

        $findEmail = $mailData["patient_email"];

        $email = (Crypt::decryptString($findEmail));

        Mail::to($email)->send(new AntigenTestMail($mailData));

        if (Mail::failures()) {
            //dd('Mail failed');
            $checker = new MailLog();
            $checker->patient_id = $patient_id;
            $checker->email = $email;
            $checker->delivery_status = "Failed";
            $checker->save();

            return response()->json([
                "datas" => $mailData,
                "message" => "Mail not send:" . $email,
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
            "message" => "Mail send to:" . $email,
            "status" => 200
        ]);
    }

    /**
     * Send multiple email to antigen patients
     */
    public function send_multi_mail_antigen(Request $request)
    {
        $patients = AntigenTestResult::whereIn('id', $request->ids)->get();

        if ($patients->count() > 0)
        {
            foreach ($patients as $key => $mailData)
            {
                Mail::to(Crypt::decryptString($mailData->patient_email))->send(new AntigenTestMail($mailData));
            }
        }

        return response()->json(['done']);
    }

    /**
     * QRCode verification
     */
    public function antigen_qrcode($document_number)
    {
        return view('antigen-verify')
        ->with('test_result', AntigenTestResult::where('document_number', $document_number)->first());
    }



}
