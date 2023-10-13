<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffDeduct extends Model
{
    use HasFactory;

    protected $fillable = 
    [
     //   'emp_code',
        'name',
        'tax',
        'car_refu',
        'cf',
        'ded',
        'dev_levy',
        'edu_levy',
        'nh_fund',
        'sd',
        'h_loan',
        'hl_bal',
        'v_loan',
        'vl_bal',
        'sal_adv',
        'sal_arrea',
        'sal_bal',
        'insure',
        'u_due',
        'fide',
        'a',
        'c',
        'other',
        'wel_fare',
        'teac_allow',
        'ndi_olu',
        'tot_ded',
    ];
}
