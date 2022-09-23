<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HivScreening extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_name',
        'patient_gender',
        'patient_age',
        'patient_phone',
        'patient_email',
        'lab_code',
        'collection_date',
        'collection_time',
        'result_date',
        'final_result',
        'patient_location',
        'document_number',
        'test_type',
        'test_comments'
    ];
}
