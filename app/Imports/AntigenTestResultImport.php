<?php

namespace App\Imports;

use App\Helpers\TestHelper;
use App\Mail\AntigenImmediateMail;
use App\Mail\AntigenTestMail;
use App\Models\AntigenTestResult;
use Carbon\Carbon;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithValidation;

class AntigenTestResultImport implements ToCollection, WithHeadingRow
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

    //     return new AntigenTestResult([
    //         'patient_name' => $row['patient_name'],
    //         'case_uid' => Str::uuid()->toString(),
    //         'patient_sex' => Crypt::encryptString($row['patient_sex']),
    //         'patient_dob' => Crypt::encryptString($row['patient_dob']),
    //         'patient_phone' => Crypt::encryptString($row['patient_phone']),
    //         'patient_email' => Crypt::encryptString($row['patient_email']),
    //         'patient_nationality' => Crypt::encryptString($row['patient_nationality']),
    //         'passport_number' => Crypt::encryptString($row['passport_number']),
    //         'lab_code' => Crypt::encryptString($row['lab_code']),
    //         'collection_date' => Crypt::encryptString($row['collection_date']),
    //         'collection_time' => Crypt::encryptString($row['collection_time']),
    //         'result_date' => Crypt::encryptString($row['result_date']),
    //         'final_result' => Crypt::encryptString($row['final_result']),
    //         'sample_type' => Crypt::encryptString($row['sample_type']),
    //         'patient_location' => $row['patient_location'],
    //         'document_number' => TestHelper::IDGenerator(new AntigenTestResult(), 'document_number', 6),
    //     ]);

    //     $patients = AntigenTestResult::where('created_at', Carbon::now())->toDateTimeString()
    //     ->get();

    //     foreach ($patients as $mailData)
    //     {
    //         Mail::to(Crypt::decryptString($mailData->patient_email))->send(new AntigenTestMail($mailData));
    //     }

    // }


    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $count = count($rows);
            //dd($row['patient_email']);

            $check = AntigenTestResult::create([
                'patient_name' => $row['patient_name'],
                'case_uid' => Str::uuid()->toString(),
                'patient_sex' => Crypt::encryptString($row['patient_sex']),
                'patient_dob' => Crypt::encryptString($row['patient_dob']),
                'patient_phone' => Crypt::encryptString($row['patient_phone']),
                'patient_email' => Crypt::encryptString($row['patient_email']),
                'patient_nationality' => Crypt::encryptString($row['patient_nationality']),
                'passport_number' => Crypt::encryptString($row['passport_number']),
                'lab_code' => Crypt::encryptString($row['lab_code']),
                'collection_date' => Crypt::encryptString($row['collection_date']),
                'collection_time' => Crypt::encryptString($row['collection_time']),
                'result_date' => Crypt::encryptString($row['result_date']),
                'final_result' => Crypt::encryptString($row['final_result']),
                'sample_type' => Crypt::encryptString($row['sample_type']),
                'patient_location' => $row['patient_location'],
                'document_number' => TestHelper::IDGenerator(new AntigenTestResult(), 'document_number', 6),
            ]);

            Mail::to(Crypt::decryptString($check['patient_email']))->send(new AntigenImmediateMail($check));
        }
    }
}
