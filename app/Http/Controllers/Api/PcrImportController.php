<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TestResultImport;
use App\Models\TestResult;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Crypt;
use App\Helpers\TestHelper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\PcrImmeditate;
use Illuminate\Support\Facades\Validator;

class PcrImportController extends Controller
{
    /**
     * prc file import
     */
    public function prc_import(Request $request)
    {
        Excel::import(new TestResultImport, $request->file('file')->store('temp'));
        return response()->json([
            'message' => 'File import successfully.'
        ], Response::HTTP_OK);
    }


    /**
     * add record to database and forward
     * result to patients
     */
    public function new_results(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_name' => 'required|string',
            'patient_email' => 'required|string|email|max:100',
            'patient_phone' => 'required|string',
            'patient_sex' => 'required|string',
            'patient_nationality' => 'required|string',
            'nasopharyngeal' => 'required|string',
            'oropharyngeal' => 'required|string',
            'sputum' => 'required|string',
            'blood' => 'required|string',
            'lab_code' => 'required|string',
            'result' => 'required|string',
            'passport_number' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $result = new TestResult();
        $result->patient_name = $request->input('patient_name');
        $result->patient_sex     = Crypt::encryptString($request->input('patient_sex'));
        $result->patient_dob    = Crypt::encryptString($request->input('patient_dob'));
        $result->patient_phone = Crypt::encryptString($request->input('patient_phone'));
        $result->patient_email = Crypt::encryptString($request->input('patient_email'));
        $result->patient_nationality = Crypt::encryptString($request->input('patient_nationality'));
        $result->patient_address = Crypt::encryptString($request->input('patient_address'));
        $result->nasopharyngeal = Crypt::encryptString($request->input('nasopharyngeal'));
        $result->oropharyngeal = Crypt::encryptString($request->input('oropharyngeal'));
        $result->sputum = Crypt::encryptString($request->input('sputum'));
        $result->blood = Crypt::encryptString($request->input('blood'));
        $result->other_samples = Crypt::encryptString($request->input('other_samples'));
        $result->lab_code = Crypt::encryptString($request->input('lab_code'));
        $result->result = Crypt::encryptString($request->input('result'));
        $result->result_date = Crypt::encryptString($request->input('result_date'));
        $result->sample_collection_date = Crypt::encryptString($request->input('sample_collection_date'));
        $result->sample_collection_time = Crypt::encryptString($request->input('sample_collection_time'));
        $result->passport_number = Crypt::encryptString($request->input('passport_number'));
        $result->patient_location = $request->input('patient_location');
        $result->document_number = TestHelper::IDGenerator(new TestResult(), 'document_number', 6);
        $result->patient_type = $request->input('patient_type');
        $result->result_timer = $request->input('sample_collection_date') ." ". $request->input('sample_collection_time');
        //$result->result_timer = Carbon::createFromFormat('m/d/Y H:i', $request->input('sample_collection_date').$request->input('sample_collection_time'))->format('Y-m-d H:i: a');


        //dd($result);

        if ($result->save())
        {
            Mail::to(Crypt::decryptString($result->patient_email))->send(new PcrImmeditate($result));

            return response()->json([
                'message' => 'Result successfully sent and mail delivered.'
            ], Response::HTTP_OK);
        }
    }
}
