<?php

namespace App\Imports;

use App\Models\HepBTest;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Maatwebsite\Excel\Concerns\Importable;
use App\Helpers\TestHelper;
use App\Mail\HepBTest as MailHepBTest;
use Illuminate\Support\Facades\Mail;

class HepBTestImport implements ToCollection, WithHeadingRow
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
        foreach ($rows as $row)
        {
            $check[] = HepBTest::create([
                'patient_name' => $row['patient_name'],
                'patient_sex'     => Crypt::encryptString($row['patient_sex']),
                'patient_dob'    => Crypt::encryptString($row['patient_dob']),
                'patient_age' => Crypt::encryptString($row['patient_age']),
                'patient_email' => Crypt::encryptString($row['patient_email']),
                'sample_collection_date' => Crypt::encryptString($row['sample_collection_date']),
                'date_received' => Crypt::encryptString($row['date_received']),
                'sample_collection_time' => Crypt::encryptString($row['sample_collection_time']),
                'date_reported' => Crypt::encryptString($row['date_reported']),
                'ordering' => Crypt::encryptString($row['ordering']),
                'referring' => Crypt::encryptString($row['referring']),
                'patient_id' => Crypt::encryptString($row['patient_id']),
                'result' => Crypt::encryptString($row['result']),
                'reference' => Crypt::encryptString($row['reference']),
                'interpretation' => Crypt::encryptString($row['interpretation']),
                'patient_location' => $row['patient_location'],
                'document_number' => TestHelper::IDGenerator(new HepBTest(), 'document_number', 6),

            ]);

        }
        foreach($check as $key => $result)
        {

            Mail::to(Crypt::decryptString($result->patient_email))->send(new MailHepBTest($result));

        }
    }



    
}
