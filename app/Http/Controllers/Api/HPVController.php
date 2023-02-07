<?php

namespace App\Http\Controllers\Api;

use App\Helpers\TestHelper;
use App\Http\Controllers\Controller;
use App\Mail\HPVMail;
use App\Models\HPV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class HPVController extends Controller
{
    /**
     * @param Request $request
     * Widal test request
     */
    public function import_hpv(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_name' =>'required|string',
            'patient_gender' =>'required|string',
            'patient_dob' =>'required|string',
            'patient_phone' =>'required|string',
            'patient_email' =>'required|string',
            'lab_code' =>'required|string',
            'collection_date' =>'required|string',
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }

        $hpv_test = new HPV();
        $testType = 'HPV-DNA';

        $hpv_test->patient_name = Crypt::encryptString($request->input('patient_name'));
        $hpv_test->patient_dob = Crypt::encryptString($request->input('patient_dob'));
        $hpv_test->patient_gender = Crypt::encryptString($request->input('patient_gender'));
        $hpv_test->patient_phone = Crypt::encryptString($request->input('patient_phone'));
        $hpv_test->patient_email = Crypt::encryptString($request->input('patient_email'));
        $hpv_test->nationality = Crypt::encryptString($request->input('nationality'));
        $hpv_test->lab_code = Crypt::encryptString($request->input('lab_code'));
        $hpv_test->collection_date = Crypt::encryptString($request->input('collection_date'));
        $hpv_test->result_date = Crypt::encryptString($request->input('result_date'));
        $hpv_test->patient_location = Crypt::encryptString($request->input('patient_location'));
        $hpv_test->test_type = $testType;
        $hpv_test->sample_source = $request->sample_source;
        $hpv_test->cervix = $request->cervix;
        $hpv_test->general_comment = Crypt::encryptString($request->input('general_comment'));
        $hpv_test->document_number = TestHelper::IDGenerator(new HPV(), 'document_number', 6);


        if($hpv_test->save())
        {
            Mail::to(Crypt::decryptString($hpv_test->patient_email))->send(new HPVMail($hpv_test));

            return response()->json([
                'message' => 'HPV DNA test successfully sent and mail delivered.'
                ], Response::HTTP_OK);
        }
    }
}
