<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Pagination\Paginator;

class TestResult extends Model
{
    use Loggable;
    use HasFactory;
    //protected $guarded = array();

    protected $fillable = [
        'patient_name',
        'patient_sex',
        'patient_dob',
        'patient_phone',
        'patient_email',
        'patient_nationality',
        'patient_address',
        'nasopharyngeal',
        'oropharyngeal',
        'sputum',
        'blood',
        'other_samples',
        'lab_code',
        'result',
        'result_date',
        'sample_collection_date',
        'sample_collection_time',
        'passport_number',
        'patient_location',
        'document_number',
        'patient_type',
        'result_timer'
    ];


    // public function getNameAttribute($value)
    // {
    //     try {
    //         return Crypt::decryptString($value);
    //     } catch (\Exception $e) {
    //         return $value;
    //     }
    // }

    // public function getEmailAttribute($value)
    // {
    //     try {
    //         return Crypt::decryptString($value);
    //     } catch (\Exception $e) {
    //         return $value;
    //     }
    // }

    // public function getSexAttribute($value)
    // {
    //     try {
    //         return Crypt::decryptString($value);
    //     } catch (\Exception $e) {
    //         return $value;
    //     }
    // }

    // public function getData()
    // {
    //     return static::orderBy('created_at', 'desc')->paginate(5);
    // }
}
