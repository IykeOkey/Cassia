<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainDeduct extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'emp_code',
        'tax',
        'car_refu',
        'dev_levy',
        'edu_levy',
        'ashia',
        'nh_fund',
        'u_dues',
        'j_welfare',
        'welfare_id',
        'welf_refund',
        'man',
        'memb',
        'h_loan',
        'hl_bal',
        'v_loan',
        'vl_bal',
        'sal_adv',
        'sal_arrea',
        'sal_bal',
        'insure',
    ];
}
