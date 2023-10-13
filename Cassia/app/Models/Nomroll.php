<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Nomroll extends Model
{
    protected $table = 'nomrolls';
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
        'u_due',
        'fide',
        'insure',
        'cert',
        'lga',
        'agree_type',
        'duty_disp',
        'inc_mo',
        'harz',
        'flag',
    ];

        /**
     * The roles that belong to the user.
     */
    public function lawyers(): BelongsToMany
    {
        return $this->belongsToMany(Lawyers::class);
    }

         
}

/*
// Salary.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = ['rank', 'grade_level', 'step', 'basic_salary', 'rent_allowance', 'transport_allowance'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

// Allowance.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Allowance extends Model
{
    protected $fillable = ['rank', 'grade_level', 'step', 'rent_allowance', 'transport_allowance'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

// Deduction.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    protected $fillable = ['tax', 'union_dues', 'staff_loan_repayment', 'employee_id'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
} */
