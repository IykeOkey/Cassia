<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankSched extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tot_pay',
        'bank_code',
        'acct_no',
        'bank_name',
        'branch',
    ];
}
