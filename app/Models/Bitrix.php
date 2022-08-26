<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitrix extends Model
{
    use HasFactory;

    protected $fillable = [
        'surname',
        'othername',
        'firstname',
        'title',
        'CMStatus',
        'dateofBirth',
        'gender',
        'mobilePhone',
        'email',
        'residence',
        'country',
        'state',
        'motherName',
        'nok',
        'nokPhone',
        'nin',
        'chn',
        'lga',
        'bankName',
        'bankAccount',
        'BVN',
        'Product',
    ];
}
