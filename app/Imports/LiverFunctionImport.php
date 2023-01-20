<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Maatwebsite\Excel\Concerns\Importable;
use App\Helpers\TestHelper;
use App\Mail\LiverFunctionMail;
use App\Models\LiverFunction;
use Illuminate\Support\Facades\Mail;

class LiverFunctionImport implements ToCollection
{
    use Loggable;
    use Importable;


    /**
    * @param Collection $collection
    */
    public function collection($rows)
    {
        $testType = 'LiverFunction';
        foreach ($rows as $row)
        {
            $check[] = LiverFunction::create([
                'patient_name' => $row['patient_name'],
                'patient_gender'     => Crypt::encryptString($row['patient_gender']),
                'patient_age'    => Crypt::encryptString($row['patient_age']),
                'patient_phone' => Crypt::encryptString($row['patient_phone']),
                'patient_email' => Crypt::encryptString($row['patient_email']),
                'lab_code' => Crypt::encryptString($row['lab_code']),
                'collection_date' => Crypt::encryptString($row['collection_date']),
                'collection_time' => Crypt::encryptString($row['collection_time']),
                'result_date' => Crypt::encryptString($row['result_date']),
                'bilirubin_total' => Crypt::encryptString($row['bilirubin_total']),
                'bilirubin_direct' => Crypt::encryptString($row['bilirubin_direct']),
                'bilirubin_indirect' => Crypt::encryptString($row['bilirubin_indirect']),
                'sgot_ast' => Crypt::encryptString($row['sgot_ast']),
                'sgpt_alt' => Crypt::encryptString($row['sgpt_alt']),
                'alkaline_phosphatase' => Crypt::encryptString($row['alkaline_phosphatase']),
                'ggt_result' => Crypt::encryptString($row['ggt_result']),
                'total_proteins' => Crypt::encryptString($row['total_proteins']),
                'albumin' => Crypt::encryptString($row['albumin']),
                'globulin' => Crypt::encryptString($row['globulin']),
                'ag_ratio' => Crypt::encryptString(['ag_ratio']),
                'patient_location' => $row['patient_location'],
                'test_type' => $testType,
                'test_comments' => Crypt::encryptString($row['test_comments']),
                'document_number' => TestHelper::IDGenerator(new LiverFunction(), 'document_number', 6),

            ]);

        }
        foreach($check as $key => $result)
        {

            Mail::to(Crypt::decryptString($result->patient_email))->send(new LiverFunctionMail($result));

        }
    }
}
