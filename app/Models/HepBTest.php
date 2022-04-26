<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class HepBTest extends Model
{
    use Loggable;
    use HasFactory;

    protected $table = 'hep_test';

    protected $fillable = [
        'patient_name',
        'patient_dob',
        'patient_age',
        'patient_sex',
        'patient_email',
        'sample_collection_date',
        'date_received',
        'sample_collection_time',
        'date_reported',
        'ordering',
        'referring',
        'patient_id',
        'result',
        'reference',
        'interpretation',
        'patient_location',
        'document_number',
    ];
}
