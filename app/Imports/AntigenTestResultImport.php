<?php

namespace App\Imports;

use App\Models\AntigenTestResult;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AntigenTestResultImport implements ToModel, WithHeadingRow
{
    use Loggable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AntigenTestResult([
            'patient_name' => $row['patient_name'],
            'patient_sex'     => Crypt::encryptString($row['patient_sex']),
            'patient_dob'    => Crypt::encryptString($row['patient_dob']),
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

        ]);
    }
}
