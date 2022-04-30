<?php

namespace App\Imports;

use App\Helpers\TestHelper;
use App\Mail\PatientTestResult;
use App\Mail\PcrImmeditate;
use App\Models\PatientDocNumber;
use App\Models\TestResult;
use Barryvdh\DomPDF\Facade\Pdf;
//use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use ZipArchive;

class TestResultImport implements ToCollection, WithHeadingRow
{
    use Loggable;
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {

    //     $user = Auth::user();

    //     return new TestResult([
    //         'patient_name' => $row['patient_name'],
    //         'patient_sex'     => Crypt::encryptString($row['patient_sex']),
    //         'patient_dob'    => Crypt::encryptString($row['patient_dob']),
    //         'patient_phone' => Crypt::encryptString($row['patient_phone']),
    //         'patient_email' => Crypt::encryptString($row['patient_email']),
    //         'patient_nationality' => Crypt::encryptString($row['patient_nationality']),
    //         'patient_address' => Crypt::encryptString($row['patient_address']),
    //         'nasopharyngeal' => Crypt::encryptString($row['nasopharyngeal']),
    //         'oropharyngeal' => Crypt::encryptString($row['oropharyngeal']),
    //         'sputum' => Crypt::encryptString($row['sputum']),
    //         'blood' => Crypt::encryptString($row['blood']),
    //         'other_samples' => Crypt::encryptString($row['other_samples']),
    //         'lab_code' => Crypt::encryptString($row['lab_code']),
    //         'result' => Crypt::encryptString($row['result']),
    //         'result_date' => Crypt::encryptString($row['result_date']),
    //         'sample_collection_date' => Crypt::encryptString($row['sample_collection_date']),
    //         'sample_collection_time' => Crypt::encryptString($row['sample_collection_time']),
    //         'passport_number' => Crypt::encryptString($row['passport_number']),
    //         'patient_location' => $row['patient_location'],
    //         'document_number' => TestHelper::IDGenerator(new TestResult(), 'document_number', 6),
    //         'patient_type' => $row['patient_type'],
    //         'result_timer' => Carbon::createFromFormat('m/d/Y H:i', $row['sample_collection_date'].$row['sample_collection_time'])->format('Y-m-d H:i')
    //     ]);
    // }


    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $check[] = TestResult::create([
                'patient_name' => $row['patient_name'],
                'patient_sex'     => Crypt::encryptString($row['patient_sex']),
                'patient_dob'    => Crypt::encryptString($row['patient_dob']),
                'patient_phone' => Crypt::encryptString($row['patient_phone']),
                'patient_email' => Crypt::encryptString($row['patient_email']),
                'patient_nationality' => Crypt::encryptString($row['patient_nationality']),
                'patient_address' => Crypt::encryptString($row['patient_address']),
                'nasopharyngeal' => Crypt::encryptString($row['nasopharyngeal']),
                'oropharyngeal' => Crypt::encryptString($row['oropharyngeal']),
                'sputum' => Crypt::encryptString($row['sputum']),
                'blood' => Crypt::encryptString($row['blood']),
                'other_samples' => Crypt::encryptString($row['other_samples']),
                'lab_code' => Crypt::encryptString($row['lab_code']),
                'result' => Crypt::encryptString($row['result']),
                'result_date' => Crypt::encryptString($row['result_date']),
                'sample_collection_date' => Crypt::encryptString($row['sample_collection_date']),
                'sample_collection_time' => Crypt::encryptString($row['sample_collection_time']),
                'passport_number' => Crypt::encryptString($row['passport_number']),
                'patient_location' => $row['patient_location'],
                'document_number' => TestHelper::IDGenerator(new TestResult(), 'document_number', 6),
                'patient_type' => $row['patient_type'],
                'result_timer' => Carbon::createFromFormat('m/d/Y H:i', $row['sample_collection_date'].$row['sample_collection_time'])->format('Y-m-d H:i')
            ]);

            // if($check['patient_type'] === 'Immediate')
            // {
            //     Mail::to(Crypt::decryptString($check['patient_email']))->send(new PcrImmeditate($check));
            // }


        }
        foreach($check as $key => $result)
        {
            if($result->patient_type === 'Immediate')
            {
                Mail::to(Crypt::decryptString($result->patient_email))->send(new PcrImmeditate($result));
            }
        }
        //dd($check);
        // $zip = new ZipArchive();
        // $zip_file = 'batch-results-archive/batch-'.time().'.zip';

        // foreach($check as $key => $result)
        // {
        //     if($result->patient_type === 'Immediate')
        //     {
        //         Mail::to(Crypt::decryptString($result->patient_email))->send(new PcrImmeditate($result));
        //     }

        //     if(!File::exists(public_path('batch_results')))
        //     {
        //         File::makeDirectory(public_path('batch_results'), 0775, true);
        //     }

        //     $html = '';
        //     $view = view('print-result')->with(compact('result'));
        //     $html .= $view->render();
        //     Pdf::loadHTML($html)->save(public_path().'/batch_results/'.$result->patient_name.'.pdf');


        // }
        // if($zip->open($zip_file,  ZipArchive::CREATE | ZipArchive::OVERWRITE )=== TRUE)
        // {
        //     $files = File::files(public_path('batch_results'));

        //     foreach ($files as $key => $value)
        //     {
        //         $nameofFile = basename($value);
        //         $zip->addFile($value, $nameofFile);
        //     }

        //     $zip->close();
        // }
        // if(file_exists($zip_file))
        // {
        //     // push to download the zip
        //     header('Content-type: application/zip');
        //     header('Content-Disposition: attachment; filename="'.$zip_file.'"');
        //     readfile($zip_file);
        //     // remove zip file is exists in temp path
        //     File::deleteDirectory(public_path('batch_results'));
        //     unlink($zip_file);
        // }

    }
}
