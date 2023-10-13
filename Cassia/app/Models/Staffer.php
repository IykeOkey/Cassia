<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staffer extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'min_name',
        'staff_id',
        'file_no',
        'hq_sno',
        'emp_no',
        'inc_mo',
        'dept_code',
        'div_code',
        'sec_code',
        'sp_duty',
        'title',
        'emp_sur',
        'emp_fir',
        'emp_init',
        'gender',
        'bir_date',
        'fappo',
        'rank',
        'sal_desc',
        'sal_glev',
        'sal_step',
        'email',
        'phone',
        'lga',
        'town',
        'nok_id',
        'agree_type',
        'duty_disp',
        'bank_code',
        'acct_no',
        'bank_id',
        'welfare_code',
        'dues_code',
        'contrib_code',
        'bverify',
        'rtd_date',
        'flag',
    ];
}
