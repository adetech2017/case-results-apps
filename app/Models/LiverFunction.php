<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiverFunction extends Model
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
        'bilirubin_total',
        'bilirubin_direct',
        'bilirubin_indirect',
        'sgot_ast',
        'sgpt_alt',
        'alkaline_phosphatase',
        'ggt_result',
        'total_proteins',
        'albumin',
        'globulin',
        'ag_ratio',
        'patient_location',
        'document_number',
        'test_type',
        'test_comments'
    ];
}
