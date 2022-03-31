<?php

namespace App\Http\Controllers;

use App\Imports\AntigenTestResultImport;
use App\Imports\TestResultImport;
use App\Mail\PatientTestResult;
use App\Models\AntigenTestResult;
use App\Models\FileUploadLog;
use App\Models\MailLog;
use App\Models\TestResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
//use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
//use PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use ZipArchive;
//use File;
use Illuminate\Support\Facades\File;




class TestResultController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->PrcTest = new TestResult;

        $this->title = 'PRCTest';
        $this->path = 'test-results';
    }

    public function new_case()
    {
        $data = DB::table('test_categories')->get();
        return view('back-end.upload-case', ["data" => $data]);
    }

    public function prc_sample()
    {
        $filePath = public_path("sample/covid19_pcr_test_result_data_sample.csv");

        $headers = ['Content-Type: application/csv'];

        $fileName = 'covid19_pcr_test_result_data_sample.csv';


        return response()->download($filePath, $fileName, $headers);
    }

    public function antigen_sample()
    {
        $filePath = public_path("sample/covid19_antigen_test_result_data_sample.csv");

        $headers = ['Content-Type: application/csv'];

        $fileName = time() . '.csv';


        return response()->download($filePath, $fileName, $headers);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TestResult::orderBy('id', 'desc')->get();

        return view('back-end.test-case-results', ["data"=>$data]);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileImportExport()
    {
        $data = DB::table('test_categories')->get();

        return view('file-import', ["data"=>$data]);
    }

    /**
     * @return \Illuminate\Support\Collection
     * file import
     */
    public function fileImport(Request $request)
    {
        $user = Auth::user();

        if($request->test_result_id === '2')
        {
            Excel::import(new TestResultImport, $request->file('file')->store('temp'));

            return back()->with('status', 'File upload successfully!');
        }
        elseif($request->test_result_id === '1')
        {
            Excel::import(new AntigenTestResultImport, $request->file('file')->store('temp'));
            return back()->with('status', 'File upload successfully!, mail sent.');
        }
        else
        {
            return back()->with('error', 'No upload category selected');
        }
        return redirect()->back()->with('error', 'File not upload successfully!');
    }

    /**
     * Send result to mail
     */
    public function sendPatientMailPrc(Request $request)
    {
        $patient_id = $request->id;
        $mailData = TestResult::where('id', $patient_id)->firstOrFail();

        $findEmail = $mailData["patient_email"];

        $email = (Crypt::decryptString($findEmail));

        Mail::to($email)->send(new PatientTestResult($mailData));

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

    public function pdfResult(Request $request)
    {
        $patient_id = $request->id;
        $result = TestResult::where('id', $patient_id)->firstOrFail();

        $findEmail = $result["patient_email"];

        $email = (Crypt::decryptString($findEmail));

        $pdf = PDF::loadView('print-result', ["result" => $result]);

        return $pdf->download('patientTestResult.pdf');
    }

    /**
     * Print patience record
     */
    public function printPrc($id)
    {
        $result = TestResult::where('id', $id)->first();

        $pdf = PDF::loadView('print-result', ["result"=> $result]);

        return $pdf->download($result->patient_name.'.pdf');
    }

    public function downloadPcr()
    {
        $file_path = public_path('sample/covid19_pcr_test_result_data_sample.csv');
        return response()->download($file_path);
    }

    public function mailResult(Request $request)
    {
        $id = $request->input('id');
        $mailData = TestResult::where('id', $id)->firstOrFail();

        dd($mailData);

        $findEmail = $mailData["patient_email"];

        $e_mail = (Crypt::decryptString($findEmail));

        $email = $e_mail;

        // $mailData = [
        //     'title' => 'Demo Email',
        //     'url' => 'https://www.positronx.io'
        // ];


        Mail::to($email)->send(new PatientTestResult($mailData));

        // return response()->json([
        //     'message' => 'Email has been sent.'
        // ], Response::HTTP_OK);
    }


    public function sendmail(Request $request)
    {
        $patient_id = $request->id;
        $result = TestResult::where('id', $patient_id)->firstOrFail();

        //dd($result);

        $findEmail = $result["patient_email"];
        $request->email = (Crypt::decryptString($findEmail));
        $request->patient_name = $result["patient_name"];

        //$data["email"] = "test@aol.com";
        //$data["client_name"] = "Test Client";
        $request->subject = "Covid-19 PRC Test Result";

        $pdf = PDF::loadView('print-result', ["result" => $result]);

        $request->companyEmail = 'no-reply@biologix.ng.com';
        $request->companyName = 'BIOLOGIX';
        $request->companyMessage = 'Covid-19 PRC Lab Result';

        try {
            //Users notification mail
            Mail::send('email.mail', array(
                'company_name' => $request->name,
                'email' => $request->email,
                'patient_name' => $request->patient_name,
                'companyName' => $request->companyName,
                'companySubject' => $request->subject,
                'companyMessage' => $request->companyMessage,
            ), function ($message) use ($request, $pdf) {
                $message->from($request->companyEmail);
                $message->to($request->email, 'Covid-19 PRC')
                ->subject($request->subject)
                ->attachData($pdf->output(), "prc-result.pdf");
            });

            // Mail::send('email.mail', $result, function ($message) use ($result, $pdf) {
            //     $message->to($result["email"], $result["client_name"])
            //     ->subject($result["subject"])
            //     ->attachData($pdf->output(), "prc-result.pdf");
            // });
        } catch (Exception $exception) {
            $this->serverstatuscode = "0";
            $this->serverstatusdes = $exception->getMessage();
        }
        if (Mail::failures()) {
            $this->statusdesc  =   "Error sending mail";
            $this->statuscode  =   "0";
        } else {

            $this->statusdesc  =   "Message sent Succesfully";
            $this->statuscode  =   "1";
        }
        //return response()->json(compact('this'));
        //  Return response
        return response()->json([
            'status' => $this->statuscode,
            'message' => $this->statusdesc,
        ]);
    }


    public function multi_mail(Request $request)
    {
        $checked_array = $request->id;

        $results = TestResult::whereIn('id', $checked_array)->get();

        if($results->count() > 0)
        {
            //dd($results->patient_name);
            foreach ($results as $key => $mailData)
            {
                dd($key);
                $name = $mailData->patient_name[$key];

                dd($name);

                // if (in_array($request->id[$key], $checked_array))
                // {
                //     $patient_id = $request->id[$key];
                //     dd($checked_array);
                // }

                dd($mailData);
                if(!empty($mailData->patient_email))
                {
                    dd($mailData->patient_email);
                }
                $findEmail = $mailData["id"];

                dd($findEmail);

                $email = (Crypt::decryptString($findEmail));

                Mail::to($email)->send(new PatientTestResult($mailData));

                return response()->json([
                    "datas" => $mailData,
                    "message" => "Mail send to:" . $email,
                    "status" => 200
                ]);



                // if (in_array($request->id[$key], $checked_array)) {
                //     $patient_id = $request->id[$key];
                //     dd($checked_array);
                // }
            }
        }


    }


    /**
     * send mail to multiple users
     */
    public function send_multi_mail(Request $request)
    {
        $patients = TestResult::whereIn('id', $request->ids)->get();

        if($patients->count() > 0)
        {

            foreach($patients as $key => $mailData)
            {
                Mail::to(Crypt::decryptString($mailData->patient_email))->send(new PatientTestResult($mailData));
            }
        }

        return response()->json(['done']);
    }


    public function zipper_job(Request $request)
    {
        $zip = new ZipArchive;
        $public_dir = public_path();
        $filename = "patientsData.zip";

        File::makeDirectory(public_path('bulk_results'), 0775, true);

        $results = TestResult::whereIn('id', $request->ids)->get();

        foreach($results as $key => $result)
        {
            $html = '';
            $view = view('print-result')->with(compact('result'));
            $html .= $view->render();
            PDF::loadHTML($html)->save(public_path().'/bulk_results/'.$result->patient_name.'.pdf');
        }

        if($zip->open(public_path($filename), ZipArchive::CREATE | ZipArchive::OVERWRITE)=== TRUE)
        {
            $files = File::files(public_path('bulk_results'));
            //dd(count($files));
            foreach($files as $key => $value)
            {
                $nameofFile = basename($value);
                $zip->addFile($value, $nameofFile);
            }
            $zip->close();
        }
        // Set Header
        $headers = array(
            'Content-Type' => 'application/octet-stream',
        );
        File::deleteDirectory(public_path('bulk_results'));
        return response()->json($filename);
    }


    public function build_zip(Request $request)
    {
        $zip = new ZipArchive();
        $zip_file = 'patients.zip';

        $results = TestResult::whereIn('id', $request->ids)->get();

        foreach($results as $key => $result)
        {
            $html = '';
            $view = view('print-result')->with(compact('result'));
            $html .= $view->render();
            PDF::loadHTML($html)->save(public_path().'/bulk_invoices/'.$result->patient_name.'.pdf');

        }

        if($zip->open($zip_file,  ZipArchive::OVERWRITE | ZipArchive::CREATE )=== TRUE)
        {
            $files = File::files(public_path('bulk_invoices'));

            foreach ($files as $key => $value)
            {
                $nameofFile = basename($value);
                $zip->addFile($value, $nameofFile);
            }
            $zip->close();
        }
        $headers = header('Content-type: application/zip');

        //return response()->download(public_path($zip_file, $headers))->deleteFileAfterSend(true);
        return response()->json($zip_file);
    }


    public function zipper_job_to(Request $request)
    {
        // Define Dir Folder
        $public_dir = public_path();
        // Zip File Name
        $zipFileName = 'patientsData.zip';
        // Create ZipArchive Obj
        $zip = new ZipArchive;
        if ($zip->open($public_dir . '/' . $zipFileName, ZipArchive::CREATE) === TRUE)
        {
            $files = File::files(public_path('bulk_invoices'));
            // Add File in ZipArchive
            foreach($files as $file)
            {
                $nameofFile = basename($file);
                $zip->addFile($file, $nameofFile);
            }
            // Close ZipArchive
            $zip->close();
        }

        // Set Header
        $headers = array(
            'Content-Type' => 'application/octet-stream',
        );

        $filetopath = $public_dir.'/'.$zipFileName;
        // Create Download Response
        if(file_exists($filetopath))
        {
            return response()->download($filetopath,$zipFileName,$headers);
        }

        return view('createZip');
    }

    /**
     * view for multiple zip
     */
    public function multiple_zip_dir()
    {
        $data = DB::table('test_categories')->get();

        return view('back-end.archive', ["data"=>$data]);
    }

    /**
     * method for download
     */
    public function submit_multi_zip(Request $request)
    {
        $zip = new ZipArchive();
        //$zip_file = time().'patients.zip';
        $zip_file = time()."patientsData.zip";
        $filename = "patientsData.zip";

        if($request->test_result_id === '2')
        {
            File::makeDirectory(public_path('bulk_results'), 0775, true);

            $from = $request->from_date;
            $to = $request->to_date;
            $title = "Result From: ".$from." To: ".$to;

            $results = TestResult::whereBetween('created_at', [$from.' 00:00:00',$to.' 23:59:59'])->get();

            foreach($results as $key => $result)
            {
                $html = '';
                $view = view('print-result')->with(compact('result'));
                $html .= $view->render();
                PDF::loadHTML($html)->save(public_path().'/bulk_results/'.$result->patient_name.'.pdf');

            }

            if($zip->open($zip_file,  ZipArchive::CREATE | ZipArchive::OVERWRITE )=== TRUE)
            {
                $files = File::files(public_path('bulk_results'));

                foreach ($files as $key => $value)
                {
                    $nameofFile = basename($value);
                    $zip->addFile($value, $nameofFile);
                }

                $zip->close();
            }

            if(file_exists($zip_file))
            {
                // push to download the zip
                header('Content-type: application/zip');
                header('Content-Disposition: attachment; filename="'.$zip_file.'"');
                readfile($zip_file);
                // remove zip file is exists in temp path
                File::deleteDirectory(public_path('bulk_results'));
                unlink($zip_file);
            }
            //$headers = header('Content-type: application/zip');
            //return response()->download($zip_file, $headers);
        }
        elseif($request->test_result_id === '1')
        {
            File::makeDirectory(public_path('bulk_results'), 0775, true);

            $from = $request->from_date;
            $to = $request->to_date;
            $title = "Result From: ".$from." To: ".$to;

            $results = AntigenTestResult::whereBetween('created_at', [$from.' 00:00:00',$to.' 23:59:59'])->get();

            foreach($results as $key => $result)
            {
                $html = '';
                $view = view('antigen-test-result')->with(compact('result'));
                $html .= $view->render();
                PDF::loadHTML($html)->save(public_path().'/bulk_results/'.$result->patient_name.'.pdf');

            }

            if($zip->open($zip_file,  ZipArchive::CREATE | ZipArchive::OVERWRITE )=== TRUE)
            {
                $files = File::files(public_path('bulk_results'));

                foreach ($files as $key => $value)
                {
                    $nameofFile = basename($value);
                    $zip->addFile($value, $nameofFile);
                }

                $zip->close();
            }

            if(file_exists($zip_file))
            {
                // push to download the zip
                header('Content-type: application/zip');
                header('Content-Disposition: attachment; filename="'.$zip_file.'"');
                readfile($zip_file);
                // remove zip file is exists in temp path
                File::deleteDirectory(public_path('bulk_results'));
                unlink($zip_file);
            }
        }
        else
        {
            return back()->with('error', 'No upload category selected');
        }
        return redirect()->back()->with('error', 'File zipped successfully!');
    }




    /**
     * Edit single officer record in database
     *
     */
    public function single_test_result($document_number)
    {

        return view('verification')
            ->with('test_result', TestResult::where('document_number', $document_number)->first());
    }
}
