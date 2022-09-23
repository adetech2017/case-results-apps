<?php

namespace App\Imports;

use App\Models\PregenacyTest;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Maatwebsite\Excel\Concerns\Importable;
use App\Helpers\TestHelper;
use App\Mail\PTMail;
use Illuminate\Support\Facades\Mail;

class PTImport implements ToCollection, WithHeadingRow
{
    use Loggable;
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        $testType = 'PT';
        foreach ($rows as $row)
        {
            $check[] = PregenacyTest::create([
                'patient_name' => $row['patient_name'],
                'patient_gender'     => Crypt::encryptString($row['patient_gender']),
                'patient_age'    => Crypt::encryptString($row['patient_age']),
                'patient_phone' => Crypt::encryptString($row['patient_phone']),
                'patient_email' => Crypt::encryptString($row['patient_email']),
                'lab_code' => Crypt::encryptString($row['lab_code']),
                'collection_date' => Crypt::encryptString($row['collection_date']),
                'collection_time' => Crypt::encryptString($row['collection_time']),
                'result_date' => Crypt::encryptString($row['result_date']),
                'final_result' => Crypt::encryptString($row['result']),
                'patient_location' => $row['patient_location'],
                'test_type' => $testType,
                'test_comments' => Crypt::encryptString($row['test_comments']),
                'document_number' => TestHelper::IDGenerator(new PregenacyTest(), 'document_number', 6),

            ]);

        }
        foreach($check as $key => $result)
        {

            Mail::to(Crypt::decryptString($result->patient_email))->send(new PTMail($result));

        }
    }
}
