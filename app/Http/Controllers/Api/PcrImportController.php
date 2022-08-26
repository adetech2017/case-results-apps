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
use App\Models\AntigenTestResult;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Mail\AntigenImmediateMail;
use App\Mail\HepBTest as MailHepBTest;
use App\Models\Bitrix;
use App\Models\HepBTest;

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

    /**
     * endpoint for antigen test results
     */
    public function new_atigen(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_name' => 'required|string',
            'patient_email' => 'required|string|email|max:100',
            'patient_phone' => 'required|string',
            'patient_sex' => 'required|string',
            'patient_nationality' => 'required|string',
            'lab_code' => 'required|string',
            'result_date' => 'required|string',
            'final_result' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $antigen = new AntigenTestResult();

        $antigen->patient_name = $request->input('patient_name');
        $antigen->case_uid = Str::uuid()->toString();
        $antigen->patient_sex = Crypt::encryptString($request->input('patient_sex'));
        $antigen->patient_dob = Crypt::encryptString($request->input('patient_dob'));
        $antigen->patient_phone = Crypt::encryptString($request->input('patient_phone'));
        $antigen->patient_email = Crypt::encryptString($request->input('patient_email'));
        $antigen->patient_nationality = Crypt::encryptString($request->input('patient_nationality'));
        $antigen->passport_number = Crypt::encryptString($request->input('passport_number'));
        $antigen->lab_code = Crypt::encryptString($request->input('lab_code'));
        $antigen->collection_date = Crypt::encryptString($request->input('collection_date'));
        $antigen->collection_time = Crypt::encryptString($request->input('collection_time'));
        $antigen->result_date = Crypt::encryptString($request->input('result_date'));
        $antigen->final_result = Crypt::encryptString($request->input('final_result'));
        $antigen->sample_type = Crypt::encryptString($request->input('sample_type'));
        $antigen->patient_location = $request->input('patient_location');
        $antigen->document_number = TestHelper::IDGenerator(new AntigenTestResult(), 'document_number', 6);


        if ($antigen->save())
        {
            Mail::to(Crypt::decryptString($antigen->patient_email))->send(new AntigenImmediateMail($antigen));

            return response()->json([
                'message' => 'Antgen Result successfully sent and mail delivered.'
            ], Response::HTTP_OK);
        }
    }

    /**
     * Hep-B api endpoints
     */
    public function new_hpyer_b_test(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_name' => 'required|string',
            'patient_email' => 'required|string|email|max:100',
            'patient_age' => 'required|string',
            'patient_sex' => 'required|string',
            'result' => 'required|string',
            'reference' => 'required|string',
            'date_reported' => 'required|string'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $hep = new HepBTest;

        $hep->patient_name = $request->input('patient_name');
        $hep->patient_sex = Crypt::encryptString($request->input('patient_sex'));
        $hep->patient_dob = Crypt::encryptString($request->input('patient_dob'));
        $hep->patient_age = Crypt::encryptString($request->input('patient_age'));
        $hep->patient_email = Crypt::encryptString($request->input('patient_email'));
        $hep->sample_collection_date = Crypt::encryptString($request->input('sample_collection_date'));
        $hep->date_received = Crypt::encryptString($request->input('date_received'));
        $hep->sample_collection_time = Crypt::encryptString($request->input('sample_collection_time'));
        $hep->date_reported = Crypt::encryptString($request->input('date_reported'));
        $hep->ordering = Crypt::encryptString($request->input('ordering'));
        $hep->referring = Crypt::encryptString($request->input('referring'));
        $hep->patient_id = Crypt::encryptString($request->input('patient_id'));
        $hep->result = Crypt::encryptString($request->input('result'));
        $hep->reference = Crypt::encryptString($request->input('reference'));
        $hep->interpretation = Crypt::encryptString($request->input('interpretation'));
        $hep->patient_location = $request->input('patient_location');
        $hep->document_number = TestHelper::IDGenerator(new HepBTest(), 'document_number', 6);

        if ($hep->save())
        {
            Mail::to(Crypt::decryptString($hep->patient_email))->send(new MailHepBTest($hep));

            return response()->json([
                'message' => 'HepBTest Result successfully sent and mail delivered.'
            ], Response::HTTP_OK);
        }
    }

    /**
     * test for bitrix
     */
    public function addBitrix(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'surname' => 'required|string',
            'email' => 'required|string|email|max:100',
            'othername' => 'required|string',
            'firstname' => 'required|string',
            'title' => 'required|string',
            'mobilePhone' => 'required|string',
            'residence' => 'required|string'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $bitrix = new Bitrix();

        $bitrix->surname = $request->input('surname');
        $bitrix->othername = $request->input('othername');
        $bitrix->firstname = $request->input('firstname');
        $bitrix->title = $request->input('title');
        $bitrix->CMStatus = $request->input('CMStatus');
        $bitrix->dateofBirth = $request->input('dateofBirth');
        $bitrix->gender = $request->input('gender');
        $bitrix->mobilePhone = $request->input('mobilePhone');
        $bitrix->email = $request->input('email');
        $bitrix->residence = $request->input('residence');
        $bitrix->country = $request->input('country');
        $bitrix->state = $request->input('state');
        $bitrix->motherName = $request->input('motherName');
        $bitrix->nok = $request->input('nok');
        $bitrix->nokPhone = $request->input('nokPhone');
        $bitrix->nin = $request->input('nin');
        $bitrix->chn = $request->input('chn');
        $bitrix->lga = $request->input('lga');
        $bitrix->bankName = $request->input('bankName');
        $bitrix->bankAccount = $request->input('bankAccount');
        $bitrix->BVN = $request->input('BVN');
        $bitrix->Product = $request->input('Product');

        if ($bitrix->save())
        {
            return response()->json([
                'message' => 'BITRIX24 data added successfuly!'
            ], Response::HTTP_OK);
        }
    }
}
