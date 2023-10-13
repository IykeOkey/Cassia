<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    use HasFactory;

    protected $fillable = [
        'min_name',
        'file_no',
        'hq_sno',
        'emp_no',
        'dept_code',
        'div_code',
        'sec_code',
        'ashia',
        'emp_sur',
        'emp_fir',
        'emp_init',
        'sex',
        'bir_date',
        'fappo',
        'prom_date',
        'post',
        'rank',
        'sal_id',
        'sal_glev',
        'sal_step',
        'basic',
        'gross_pay',
        'agree_type',
        'duty_disp',
        'rent',
        'trans',
        'enter',
        'meal',
        'util',
        'j_allow',
        'tax',
        'car_refu',
        'cf',
        'ded',
        'tot_pay',
        'emp_code',
        'dev_levy',
        'edu_levy',
        'nh_fund',
        'sd',
        'dom',
        'gr',
        'out',
        'ca',
        'bank_code',
        'acct_no',
        'bank_id',
        'pen_pin',
        'staff_id',
        'bvn',
        'h_loan',
        'hl_bal',
        'v_loan',
        'vl_bal',
        'sal_adv',
        'sal_bal',
        'insure',
        'u_due',
        'fide',
        'cert',
        'lga',
        'sw',
        'a',
        'c',
        'harz',
        'rob_allow',
        'overtime',
        'inc_mo',
        'other',
        'wel_fare',
        'teac_allow',
        'ndi_olu',
        'flag',
    ];

    public function charts()
    {
        return $this->belongsTo(Chart::class);
    } 

    public function schedules()
    {
        return $this->belongsTo(Schedule::class);
    }
}
