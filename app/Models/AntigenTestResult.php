<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntigenTestResult extends Model
{
    use Loggable;
    use HasFactory;

    protected $fillable = [
        'patient_name',
        'case_uid',
        'patient_sex',
        'patient_dob',
        'patient_phone',
        'patient_email',
        'patient_nationality',
        'passport_number',
        'lab_code',
        'collection_date',
        'collection_time',
        'result_date',
        'final_result',
        'sample_type',
        'patient_location',
        'document_number',
    ];
}
