<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Widal extends Model
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
        'salmonella_paratyphi_a_o',
        'salmonella_paratyphi_b_o',
        'salmonella_paratyphi_c_o',
        'salmonella_paratyphi_a_h',
        'salmonella_paratyphi_b_h',
        'salmonella_paratyphi_c_h',
        'salmonella_typhi_h',
        'salmonella_typhi_o',
        'result',
        'patient_location',
        'document_number',
        'test_type',
        'test_comments'
    ];
}
