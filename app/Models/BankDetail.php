<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model
{
    protected $fillable = [
        'ifsc_code',
        'bank_name',
        'branch',
        'address',
        'account_number',
    ];
}
