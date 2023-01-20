<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Maatwebsite\Excel\Concerns\Importable;
use App\Helpers\TestHelper;
use App\Mail\LipidProfileMail;
use App\Models\LipidProfile;
use Illuminate\Support\Facades\Mail;

class LipidProfileImport implements ToCollection, WithHeadingRow
{
    use Loggable;
    use Importable;


    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $testType = 'LipidProfile';
        foreach ($rows as $row)
        {
            $check[] = LipidProfile::create([
                'patient_name' => $row['patient_name'],
                'patient_gender'     => Crypt::encryptString($row['patient_gender']),
                'patient_age'    => Crypt::encryptString($row['patient_age']),
                'patient_phone' => Crypt::encryptString($row['patient_phone']),
                'patient_email' => Crypt::encryptString($row['patient_email']),
                'lab_code' => Crypt::encryptString($row['lab_code']),
                'collection_date' => Crypt::encryptString($row['collection_date']),
                'collection_time' => Crypt::encryptString($row['collection_time']),
                'result_date' => Crypt::encryptString($row['result_date']),
                'total_cholesterol' => Crypt::encryptString($row['total_cholesterol']),
                'hdl_cholesterol' => Crypt::encryptString($row['hdl_cholesterol']),
                'ldl_cholesterol' => Crypt::encryptString($row['ldl_cholesterol']),
                'triglycerides' => Crypt::encryptString($row['triglycerides']),
                'vldl_result' => Crypt::encryptString($row['vldl_result']),
                'patient_location' => $row['patient_location'],
                'test_type' => $testType,
                'test_comments' => Crypt::encryptString($row['test_comments']),
                'document_number' => TestHelper::IDGenerator(new LipidProfile(), 'document_number', 6),

            ]);

        }
        foreach($check as $key => $result)
        {

            Mail::to(Crypt::decryptString($result->patient_email))->send(new LipidProfileMail($result));

        }
    }
}
