<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PSA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Crypt;
use App\Helpers\TestHelper;
use App\Mail\BloodGroupMail;
use App\Mail\BloodSugarMail;
use App\Mail\CreatinineMail;
use App\Mail\ElectrolyteMail;
use App\Mail\GenotypeMail;
use App\Mail\HCVMail;
use App\Mail\HivTest;
use App\Mail\MalariaMail;
use App\Mail\PSAMail;
use App\Mail\PTMail;
use App\Mail\UreaMail;
use App\Models\BloodGroup;
use App\Models\BloodSugar;
use App\Models\Creatinine;
use App\Models\Electrolyte;
use App\Models\Genotype;
use App\Models\HCV;
use App\Models\HivScreening;
use App\Models\LipidProfile;
use App\Models\LiverFunction;
use App\Models\Malaria;
use App\Models\PregenacyTest;
use App\Models\Urea;
use App\Models\Widal;
use Illuminate\Support\Facades\Mail;



class PathologyController extends Controller
{
    /**
     * Pathology PSA endpoint.
     *
     * @return Response
     */
    public function import_psa(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_name' => 'required|string',
            'patient_email' => 'required|string|email|max:100',
            'patient_age' => 'required|string',
            'patient_gender' => 'required|string',
            'final_result' => 'required|string'
        ]);


        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }

        $psa = new PSA();

        $testType = 'PSA';

        $psa->patient_name = $request->input('patient_name');
        $psa->patient_gender = Crypt::encryptString($request->input('patient_gender'));
        $psa->patient_age = Crypt::encryptString($request->input('patient_age'));
        $psa->patient_phone = Crypt::encryptString($request->input('patient_phone'));
        $psa->patient_email = Crypt::encryptString($request->input('patient_email'));
        $psa->lab_code = Crypt::encryptString($request->input('lab_code'));
        $psa->collection_date = Crypt::encryptString($request->input('collection_date'));
        $psa->collection_time = Crypt::encryptString($request->input('collection_time'));
        $psa->result_date = Crypt::encryptString($request->input('result_date'));
        $psa->final_result = Crypt::encryptString($request->input('result'));
        $psa->patient_location = $request->input('patient_location');
        $psa->test_type = $testType;
        $psa->test_comments = Crypt::encryptString($request->input('test_comments'));
        $psa->document_number = TestHelper::IDGenerator(new PSA(), 'document_number', 6);


        if($psa->save())
        {
            Mail::to(Crypt::decryptString($psa->patient_email))->send(new PSAMail($psa));

            return response()->json([
                'message' => 'PSA Result successfully sent and mail delivered.'
            ], Response::HTTP_OK);
        }
    }


    /**
     * Pathology Blood sugar endpoint.
     *
     * @return Response
     *
     * */
    public function import_blood_sugar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_name' =>'required|string',
            'patient_gender' =>'required|string',
            'patient_age' =>'required|string',
            'patient_email' =>'required|string',
            'collection_date' =>'required|string',
            'collection_time' =>'required|string',
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }

        $blood_sugar = new BloodSugar();
        $testType = 'BloodSugar';

        $blood_sugar->patient_name = $request->input('patient_name');
        $blood_sugar->patient_gender = Crypt::encryptString($request->input('patient_gender'));
        $blood_sugar->patient_age = Crypt::encryptString($request->input('patient_age'));
        $blood_sugar->patient_phone = Crypt::encryptString($request->input('patient_phone'));
        $blood_sugar->patient_email = Crypt::encryptString($request->input('patient_email'));
        $blood_sugar->lab_code = Crypt::encryptString($request->input('lab_code'));
        $blood_sugar->collection_date = Crypt::encryptString($request->input('collection_date'));
        $blood_sugar->collection_time = Crypt::encryptString($request->input('collection_time'));
        $blood_sugar->result_date = Crypt::encryptString($request->input('result_date'));
        $blood_sugar->final_result = Crypt::encryptString($request->input('result'));
        $blood_sugar->patient_location = $request->input('patient_location');
        $blood_sugar->test_type = $testType;
        $blood_sugar->test_comments = Crypt::encryptString($request->input('test_comments'));
        $blood_sugar->document_number = TestHelper::IDGenerator(new BloodSugar(), 'document_number', 6);


        if($blood_sugar->save())
        {
            Mail::to(Crypt::decryptString($blood_sugar->patient_email))->send(new BloodSugarMail($blood_sugar));

            return response()->json([
                'message' => 'Blood Sugar successfully sent and mail delivered.'
                ], Response::HTTP_OK);
        }
    }


    /**
     * Pathology Blood Group Endpoint
     * @param Request $request
     *
     */
    public function import_blood_group(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_name' =>'required|string',
            'patient_gender' =>'required|string',
            'patient_age' =>'required|string',
            'patient_email' =>'required|string',
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }

        $blood_group = new BloodGroup();
        $testType = 'BloodGroup';

        $blood_group->patient_name = $request->input('patient_name');
        $blood_group->patient_gender = Crypt::encryptString($request->input('patient_gender'));
        $blood_group->patient_age = Crypt::encryptString($request->input('patient_age'));
        $blood_group->patient_phone = Crypt::encryptString($request->input('patient_phone'));
        $blood_group->patient_email = Crypt::encryptString($request->input('patient_email'));
        $blood_group->lab_code = Crypt::encryptString($request->input('lab_code'));
        $blood_group->collection_date = Crypt::encryptString($request->input('collection_date'));
        $blood_group->collection_time = Crypt::encryptString($request->input('collection_time'));
        $blood_group->result_date = Crypt::encryptString($request->input('result_date'));
        $blood_group->final_result = Crypt::encryptString($request->input('result'));
        $blood_group->patient_location = $request->input('patient_location');
        $blood_group->test_type = $testType;
        $blood_group->test_comments = Crypt::encryptString($request->input('test_comments'));
        $blood_group->document_number = TestHelper::IDGenerator(new BloodGroup(), 'document_number', 6);

        if($blood_group->save())
        {
            Mail::to(Crypt::decryptString($blood_group->patient_email))->send(new BloodGroupMail($blood_group));

            return response()->json([
                'message' => 'Blood Group successfully sent and mail delivered.'
                ], Response::HTTP_OK);
        }

    }


    /**
     * Pathology Creatinine Endpoint
     *
     *  @param Request $request
     * */
    public function import_creatinine(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_name' =>'required|string',
            'patient_gender' =>'required|string',
            'patient_age' =>'required|string',
            'patient_phone' =>'required|string',
            'patient_email' =>'required|string',
            'lab_code' =>'required|string',
            'collection_date' =>'required|string',
            'collection_time' =>'required|string',
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }

        $creatinine = new Creatinine();
        $testType = 'Creatinine';

        $creatinine->patient_name = $request->input('patient_name');
        $creatinine->patient_gender = Crypt::encryptString($request->input('patient_gender'));
        $creatinine->patient_age = Crypt::encryptString($request->input('patient_age'));
        $creatinine->patient_phone = Crypt::encryptString($request->input('patient_phone'));
        $creatinine->patient_email = Crypt::encryptString($request->input('patient_email'));
        $creatinine->lab_code = Crypt::encryptString($request->input('lab_code'));
        $creatinine->collection_date = Crypt::encryptString($request->input('collection_date'));
        $creatinine->collection_time = Crypt::encryptString($request->input('collection_time'));
        $creatinine->result_date = Crypt::encryptString($request->input('result_date'));
        $creatinine->final_result = Crypt::encryptString($request->input('result'));
        $creatinine->patient_location = $request->input('patient_location');
        $creatinine->test_type = $testType;
        $creatinine->test_comments = Crypt::encryptString($request->input('test_comments'));
        $creatinine->document_number = TestHelper::IDGenerator(new Creatinine(), 'document_number', 6);


        if($creatinine->save())
        {
            Mail::to(Crypt::decryptString($creatinine->patient_email))->send(new CreatinineMail($creatinine));

            return response()->json([
                'message' => 'Creatinine successfully sent and mail delivered.'
                ], Response::HTTP_OK);
        }

    }


    /**
     * Pathology Urea Endpoint
     *
     *  @param Request $request
     * */
    public function import_uran(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_name' =>'required|string',
            'patient_gender' =>'required|string',
            'patient_age' =>'required|string',
            'patient_phone' =>'required|string',
            'patient_email' =>'required|string',
            'lab_code' =>'required|string',
            'collection_date' =>'required|string',
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }

        $urea = new Urea();
        $testType = 'Urea';

        $urea->patient_name = $request->input('patient_name');
        $urea->patient_gender = Crypt::encryptString($request->input('patient_gender'));
        $urea->patient_age = Crypt::encryptString($request->input('patient_age'));
        $urea->patient_phone = Crypt::encryptString($request->input('patient_phone'));
        $urea->patient_email = Crypt::encryptString($request->input('patient_email'));
        $urea->lab_code = Crypt::encryptString($request->input('lab_code'));
        $urea->collection_date = Crypt::encryptString($request->input('collection_date'));
        $urea->collection_time = Crypt::encryptString($request->input('collection_time'));
        $urea->result_date = Crypt::encryptString($request->input('result_date'));
        $urea->final_result = Crypt::encryptString($request->input('result'));
        $urea->patient_location = $request->input('patient_location');
        $urea->test_type = $testType;
        $urea->test_comments = Crypt::encryptString($request->input('test_comments'));
        $urea->document_number = TestHelper::IDGenerator(new Urea(), 'document', 6);


        if($urea->save())
        {
            Mail::to(Crypt::decryptString($urea->patient_email))->send(new UreaMail($urea));

            return response()->json([
                'message' => 'Urea successfully sent and mail delivered.'
                ], Response::HTTP_OK);
        }
    }


    /**
     * Pathology PT test Endpoint
     * @param Request $request
     *
     * */
    public function import_pt(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_name' =>'required|string',
            'patient_gender' =>'required|string',
            'patient_age' =>'required|string',
            'patient_phone' =>'required|string',
            'patient_email' =>'required|string',
            'lab_code' =>'required|string',
            'collection_date' =>'required|string',
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }

        $pt = new PregenacyTest();
        $testType = 'PT';


        $pt->patient_name = $request->input('patient_name');
        $pt->patient_gender = Crypt::encryptString($request->input('patient_gender'));
        $pt->patient_age = Crypt::encryptString($request->input('patient_age'));
        $pt->patient_phone = Crypt::encryptString($request->input('patient_phone'));
        $pt->patient_email = Crypt::encryptString($request->input('patient_email'));
        $pt->lab_code = Crypt::encryptString($request->input('lab_code'));
        $pt->collection_date = Crypt::encryptString($request->input('collection_date'));
        $pt->collection_time = Crypt::encryptString($request->input('collection_time'));
        $pt->result_date = Crypt::encryptString($request->input('result_date'));
        $pt->final_result = Crypt::encryptString($request->input('result'));
        $pt->patient_location = $request->input('patient_location');
        $pt->test_type = $testType;
        $pt->test_comments = Crypt::encryptString($request->input('test_comments'));
        $pt->document_number = TestHelper::IDGenerator(new PregenacyTest(), 'document_number', 6);


        if($pt->save())
        {
            Mail::to(Crypt::decryptString($pt->patient_email))->send(new PTMail($pt));

            return response()->json([
                'message' => 'Pregenacy test successfully sent and mail delivered.'
                ], Response::HTTP_OK);
        }
    }


    /**
     * Pathology HIV Endpoint
     * @param Request $request
     *
     * */
    public function import_hiv(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_name' =>'required|string',
            'patient_gender' =>'required|string',
            'patient_age' =>'required|string',
            'patient_phone' =>'required|string',
            'patient_email' =>'required|string',
            'lab_code' =>'required|string',
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }

        $hiv = new HivScreening();
        $testType = 'HIV';

        $hiv->patient_name = $request->input('patient_name');
        $hiv->patient_gender = Crypt::encryptString($request->input('patient_gender'));
        $hiv->patient_age = Crypt::encryptString($request->input('patient_age'));
        $hiv->patient_phone = Crypt::encryptString($request->input('patient_phone'));
        $hiv->patient_email = Crypt::encryptString($request->input('patient_email'));
        $hiv->lab_code = Crypt::encryptString($request->input('lab_code'));
        $hiv->collection_date = Crypt::encryptString($request->input('collection_date'));
        $hiv->collection_time = Crypt::encryptString($request->input('collection_time'));
        $hiv->result_date = Crypt::encryptString($request->input('result_date'));
        $hiv->final_result = Crypt::encryptString($request->input('result'));
        $hiv->patient_location = $request->input('patient_location');
        $hiv->test_type = $testType;
        $hiv->test_comments = Crypt::encryptString($request->input('test_comments'));
        $hiv->document_number = TestHelper::IDGenerator(new HivScreening(), 'document_number', 6);


        if($hiv->save())
        {
            Mail::to(Crypt::decryptString($hiv->patient_email))->send(new HivTest($hiv));

            return response()->json([
                'message' => 'HIV test successfully sent and mail delivered.'
                ], Response::HTTP_OK);
        }

    }


    /**
     * Pathology HCV Endpoint
     * @param Request $request
     *
     * */
    public function import_hcv(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_name' =>'required|string',
            'patient_gender' =>'required|string',
            'patient_age' =>'required|string',
            'patient_phone' =>'required|string',
            'patient_email' =>'required|string',
            'lab_code' =>'required|string',
            'collection_date' =>'required|string',
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }

        $hcv = new HCV();
        $testType = 'HCV';

        $hcv->patient_name = $request->input('patient_name');
        $hcv->patient_gender = Crypt::encryptString($request->input('patient_gender'));
        $hcv->patient_age = Crypt::encryptString($request->input('patient_age'));
        $hcv->patient_phone = Crypt::encryptString($request->input('patient_phone'));
        $hcv->patient_email = Crypt::encryptString($request->input('patient_email'));
        $hcv->lab_code = Crypt::encryptString($request->input('lab_code'));
        $hcv->collection_date = Crypt::encryptString($request->input('collection_date'));
        $hcv->collection_time = Crypt::encryptString($request->input('collection_time'));
        $hcv->result_date = Crypt::encryptString($request->input('result_date'));
        $hcv->final_result = Crypt::encryptString($request->input('result'));
        $hcv->patient_location = $request->input('patient_location');
        $hcv->test_type = $testType;
        $hcv->test_comments = Crypt::encryptString($request->input('test_comments'));
        $hcv->document_number = TestHelper::IDGenerator(new HCV(), 'document', 6);


        if($hcv->save())
        {
            Mail::to(Crypt::decryptString($hcv->patient_email))->send(new HCVMail($hcv));

            return response()->json([
                'message' => 'HCV test successfully sent and mail delivered.'
                ], Response::HTTP_OK);
        }

    }


    /**
     * Pathology Electrolyte Endpoint
     * @param Request $request
     *
     * */
    public function import_electrolyte(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_name' =>'required|string',
            'patient_gender' =>'required|string',
            'patient_age' =>'required|string',
            'patient_phone' =>'required|string',
            'patient_email' =>'required|string',
            'lab_code' =>'required|string',
            'collection_date' =>'required|string',
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }

        $electrolyte = new Electrolyte();
        $testType = 'Electrolyte';

        $electrolyte->patient_name = $request->input('patient_name');
        $electrolyte->patient_gender = Crypt::encryptString($request->input('patient_gender'));
        $electrolyte->patient_age = Crypt::encryptString($request->input('patient_age'));
        $electrolyte->patient_phone = Crypt::encryptString($request->input('patient_phone'));
        $electrolyte->patient_email = Crypt::encryptString($request->input('patient_email'));
        $electrolyte->lab_code = Crypt::encryptString($request->input('lab_code'));
        $electrolyte->collection_date = Crypt::encryptString($request->input('collection_date'));
        $electrolyte->collection_time = Crypt::encryptString($request->input('collection_time'));
        $electrolyte->result_date = Crypt::encryptString($request->input('result_date'));
        $electrolyte->chlorides_result = Crypt::encryptString($request->input('chlorides_result'));
        $electrolyte->sodium_result = Crypt::encryptString($request->input('sodium_result'));
        $electrolyte->potassium_result = Crypt::encryptString($request->input('potassium_result'));
        $electrolyte->bicarbonate_result = Crypt::encryptString($request->input('bicarbonate_result'));
        $electrolyte->patient_location = Crypt::encryptString($request->input('patient_location'));
        $electrolyte->test_type = $testType;
        $electrolyte->test_comments = Crypt::encryptString($request->input('test_comments'));
        $electrolyte->document_number = TestHelper::IDGenerator(new Electrolyte(), 'document', 6);


        if($electrolyte->save())
        {
            Mail::to(Crypt::decryptString($electrolyte->patient_email))->send(new ElectrolyteMail($electrolyte));

            return response()->json([
                'message' => 'Electrolyte test successfully sent and mail delivered.'
                ], Response::HTTP_OK);
        }

    }


    /**
     * @param Request $request
     * Pathology lipid profile request
     *
     * */
    public function import_lipid_profile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_name' =>'required|string',
            'patient_gender' =>'required|string',
            'patient_age' =>'required|string',
            'patient_phone' =>'required|string',
            'patient_email' =>'required|string',
            'lab_code' =>'required|string',
            'collection_date' =>'required|string',
            'total_cholesterol' => 'required|string',
            'hdl_cholesterol' => 'required|string',
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }

        $lipid_profile = new LipidProfile();
        $testType = 'LipidProfile';

        $lipid_profile->patient_name = $request->input('patient_name');
        $lipid_profile->patient_gender = Crypt::encryptString($request->input('patient_gender'));
        $lipid_profile->patient_age = Crypt::encryptString($request->input('patient_age'));
        $lipid_profile->patient_phone = Crypt::encryptString($request->input('patient_phone'));
        $lipid_profile->patient_email = Crypt::encryptString($request->input('patient_email'));
        $lipid_profile->lab_code = Crypt::encryptString($request->input('lab_code'));
        $lipid_profile->collection_date = Crypt::encryptString($request->input('collection_date'));
        $lipid_profile->collection_time = Crypt::encryptString($request->input('collection_time'));
        $lipid_profile->result_date = Crypt::encryptString($request->input('result_date'));
        $lipid_profile->total_cholesterol = Crypt::encryptString($request->input('total_cholesterol'));
        $lipid_profile->hdl_cholesterol = Crypt::encryptString($request->input('hdl_cholesterol'));
        $lipid_profile->ldl_cholesterol = Crypt::encryptString($request->input('ldl_cholesterol'));
        $lipid_profile->triglycerides = Crypt::encryptString($request->input('triglycerides'));
        $lipid_profile->triggers = Crypt::encryptString($request->input('vldl_result'));
        $lipid_profile->patient_location = Crypt::encryptString($request->input('patient_location'));
        $lipid_profile->test_type = $testType;
        $lipid_profile->test_comments = Crypt::encryptString($request->input('test_comments'));
        $lipid_profile->document_number = TestHelper::IDGenerator(new Electrolyte(), 'document', 6);


        if($lipid_profile->save())
        {
            Mail::to(Crypt::decryptString($lipid_profile->patient_email))->send(new ElectrolyteMail($lipid_profile));

            return response()->json([
                'message' => 'Lipid Profile test successfully sent and mail delivered.'
                ], Response::HTTP_OK);
        }
    }


    /**
     * Pathology liver function
     *
     */
    public function import_liver_functions(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_name' =>'required|string',
            'patient_gender' =>'required|string',
            'patient_age' =>'required|string',
            'patient_phone' =>'required|string',
            'patient_email' =>'required|string',
            'lab_code' =>'required|string',
            'collection_date' =>'required|string',
            'bilirubin_total' => 'required|string',
            'bilirubin_direct' => 'required|string',
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }

        $liver_fun = new LiverFunction();
        $testType = 'LiverFunction';

        $liver_fun->patient_name = $request->input('patient_name');
        $liver_fun->patient_gender = Crypt::encryptString($request->input('patient_gender'));
        $liver_fun->patient_age = Crypt::encryptString($request->input('patient_age'));
        $liver_fun->patient_phone = Crypt::encryptString($request->input('patient_phone'));
        $liver_fun->patient_email = Crypt::encryptString($request->input('patient_email'));
        $liver_fun->lab_code = Crypt::encryptString($request->input('lab_code'));
        $liver_fun->collection_date = Crypt::encryptString($request->input('collection_date'));
        $liver_fun->collection_time = Crypt::encryptString($request->input('collection_time'));
        $liver_fun->result_date = Crypt::encryptString($request->input('result_date'));
        $liver_fun->bilirubin_total = Crypt::encryptString($request->input('bilirubin_total'));
        $liver_fun->bilirubin_direct = Crypt::encryptString($request->input('bilirubin_direct'));
        $liver_fun->bilirubin_indirect = Crypt::encryptString($request->input('bilirubin_indirect'));
        $liver_fun->sgot_ast = Crypt::encryptString($request->input('sgot_ast'));
        $liver_fun->sgpt_alt = Crypt::encryptString($request->input('sgpt_alt'));
        $liver_fun->alkaline_phosphatase = Crypt::encryptString($request->input('alkaline_phosphatase'));
        $liver_fun->ggt_result = Crypt::encryptString($request->input('ggt_result'));
        $liver_fun->total_proteins = Crypt::encryptString($request->input('total_proteins'));
        $liver_fun->albumin = Crypt::encryptString($request->input('albumin'));
        $liver_fun->globulin = Crypt::encryptString($request->input('globulin'));
        $liver_fun->ag_ratio = Crypt::encryptString($request->input('ag_ratio'));
        $liver_fun->patient_location = Crypt::encryptString($request->input('patient_location'));
        $liver_fun->test_type = $testType;
        $liver_fun->test_comments = Crypt::encryptString($request->input('test_comments'));
        $liver_fun->document_number = TestHelper::IDGenerator(new Electrolyte(), 'document', 6);


        if($liver_fun->save())
        {
            Mail::to(Crypt::decryptString($liver_fun->patient_email))->send(new ElectrolyteMail($liver_fun));

            return response()->json([
                'message' => 'Liver Function test successfully sent and mail delivered.'
                ], Response::HTTP_OK);
        }
    }


    /**
     * @param Request $request
     * Pathology Genotype Test Endpoint
     */
    public function import_genotype(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_name' =>'required|string',
            'patient_gender' =>'required|string',
            'patient_age' =>'required|string',
            'patient_phone' =>'required|string',
            'patient_email' =>'required|string',
            'lab_code' =>'required|string',
            'collection_date' =>'required|string',
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }

        $genotype = new Genotype();
        $testType = 'Genotype';

        $genotype->patient_name = $request->input('patient_name');
        $genotype->patient_gender = Crypt::encryptString($request->input('patient_gender'));
        $genotype->patient_age = Crypt::encryptString($request->input('patient_age'));
        $genotype->patient_phone = Crypt::encryptString($request->input('patient_phone'));
        $genotype->patient_email = Crypt::encryptString($request->input('patient_email'));
        $genotype->lab_code = Crypt::encryptString($request->input('lab_code'));
        $genotype->collection_date = Crypt::encryptString($request->input('collection_date'));
        $genotype->collection_time = Crypt::encryptString($request->input('collection_time'));
        $genotype->result_date = Crypt::encryptString($request->input('result_date'));
        $genotype->final_result = Crypt::encryptString($request->input('result'));
        $genotype->patient_location = $request->input('patient_location');
        $genotype->test_type = $testType;
        $genotype->test_comments = Crypt::encryptString($request->input('test_comments'));
        $genotype->document_number = TestHelper::IDGenerator(new BloodGroup(), 'document_number', 6);

        if($genotype->save())
        {
            Mail::to(Crypt::decryptString($genotype->patient_email))->send(new GenotypeMail($genotype));

            return response()->json([
                'message' => 'Genotype successfully sent and mail delivered.'
                ], Response::HTTP_OK);
        }
    }


    /**
     * @param Request $request
     * Pathology malaria Endpoint
     */
    public function import_malaria(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_name' =>'required|string',
            'patient_gender' =>'required|string',
            'patient_age' =>'required|string',
            'patient_phone' =>'required|string',
            'patient_email' =>'required|string',
            'lab_code' =>'required|string',
            'collection_date' =>'required|string',
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }

        $malaria = new Malaria();
        $testType = 'Malaria';

        $malaria->patient_name = $request->input('patient_name');
        $malaria->patient_gender = Crypt::encryptString($request->input('patient_gender'));
        $malaria->patient_age = Crypt::encryptString($request->input('patient_age'));
        $malaria->patient_phone = Crypt::encryptString($request->input('patient_phone'));
        $malaria->patient_email = Crypt::encryptString($request->input('patient_email'));
        $malaria->lab_code = Crypt::encryptString($request->input('lab_code'));
        $malaria->collection_date = Crypt::encryptString($request->input('collection_date'));
        $malaria->collection_time = Crypt::encryptString($request->input('collection_time'));
        $malaria->result_date = Crypt::encryptString($request->input('result_date'));
        $malaria->malarial_parasit = Crypt::encryptString($request->input('malarial_parasit'));
        $malaria->malarial_antigen = Crypt::encryptString($request->input('malarial_antigen'));
        $malaria->patient_location = $request->input('patient_location');
        $malaria->test_type = $testType;
        $malaria->test_comments = Crypt::encryptString($request->input('test_comments'));
        $malaria->document_number = TestHelper::IDGenerator(new BloodGroup(), 'document_number', 6);

        if($malaria->save())
        {
            Mail::to(Crypt::decryptString($malaria->patient_email))->send(new MalariaMail($malaria));

            return response()->json([
                'message' => 'Malaria test successfully sent and mail delivered.'
                ], Response::HTTP_OK);
        }
    }


    /**
     * @param Request $request
     * Widal test request
     */
    public function import_widal(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_name' =>'required|string',
            'patient_gender' =>'required|string',
            'patient_age' =>'required|string',
            'patient_phone' =>'required|string',
            'patient_email' =>'required|string',
            'lab_code' =>'required|string',
            'collection_date' =>'required|string',
            'salmonella_paratyphi_a_o' => 'required|string',
            'salmonella_paratyphi_b_o' => 'required|string',
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }

        $widal = new Widal();
        $testType = 'Widal';

        $widal->patient_name = $request->input('patient_name');
        $widal->patient_gender = Crypt::encryptString($request->input('patient_gender'));
        $widal->patient_age = Crypt::encryptString($request->input('patient_age'));
        $widal->patient_phone = Crypt::encryptString($request->input('patient_phone'));
        $widal->patient_email = Crypt::encryptString($request->input('patient_email'));
        $widal->lab_code = Crypt::encryptString($request->input('lab_code'));
        $widal->collection_date = Crypt::encryptString($request->input('collection_date'));
        $widal->collection_time = Crypt::encryptString($request->input('collection_time'));
        $widal->result_date = Crypt::encryptString($request->input('result_date'));
        $widal->salmonella_paratyphi_a_o = Crypt::encryptString($request->input('salmonella_paratyphi_a_o'));
        $widal->salmonella_paratyphi_b_o = Crypt::encryptString($request->input('salmonella_paratyphi_b_o'));
        $widal->salmonella_paratyphi_c_o = Crypt::encryptString($request->input('salmonella_paratyphi_c_o'));
        $widal->salmonella_paratyphi_a_h = Crypt::encryptString($request->input('salmonella_paratyphi_a_h'));
        $widal->salmonella_paratyphi_b_h = Crypt::encryptString($request->input('salmonella_paratyphi_b_h'));
        $widal->salmonella_paratyphi_c_h = Crypt::encryptString($request->input('salmonella_paratyphi_c_h'));
        $widal->salmonella_typhi_h = Crypt::encryptString($request->input('salmonella_typhi_h'));
        $widal->salmonella_typhi_o = Crypt::encryptString($request->input('salmonella_typhi_o'));
        $widal->result = Crypt::encryptString($request->input('result'));
        $widal->patient_location = Crypt::encryptString($request->input('patient_location'));
        $widal->test_type = $testType;
        $widal->test_comments = Crypt::encryptString($request->input('test_comments'));
        $widal->document_number = TestHelper::IDGenerator(new Widal(), 'document', 6);


        if($widal->save())
        {
            Mail::to(Crypt::decryptString($widal->patient_email))->send(new MalariaMail($widal));

            return response()->json([
                'message' => 'Widal test successfully sent and mail delivered.'
                ], Response::HTTP_OK);
        }
    }



}
