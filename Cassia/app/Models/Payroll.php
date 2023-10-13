<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'emp_sur',
        'emp_fir',
        'emp_init',
        'sal_desc',
        'basic',
        'hous',
        'trans',
        'enter',
        'meal',
        'util',
        'j_allow',
        'dom',
        'over',
        'ca',
        'hazard',
        'rob_allow',
        'overtime',
        'spec_duty',
        'others',
        'tax',
        'ded',
        'gross_pay',
        'net_pay'

    ];
}
