<?php

namespace App\Models;

use App\Casts\EncryptCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HPV extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_name',
        'patient_dob',
        'patient_gender',
        'patient_phone',
        'nationality',
        'lab_code',
        'collection_date',
        'patient_email',
        'result_date',
        'patient_location',
        'document_number',
        'general_comment',
        'test_type',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'sample_source' => 'array',
        'cervix' => 'array',
    ];
}
