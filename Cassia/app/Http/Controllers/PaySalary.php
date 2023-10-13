<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\BankSched;
use App\Models\Chart;
use App\Models\Deduction;
use App\Models\Employee;
use App\Models\JudAllow;
use App\Models\SchedSal;
use App\Models\deductionuct;
use App\Models\Deductn;
use App\Models\Lawyers;
use App\Models\Nomroll;
use App\Models\Pay;
use App\Models\Schedule;
use App\Models\StaffDeduct;
use App\Models\Welfare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Double;

class PaySalary extends Controller
{

    public function index()
    {
        ini_set('max_execution_time', 300);

        $this->runSchedule();
        $this->runBankSched();
        $this->addAcctNo();
    }

    public function runSalary()
    {
        $sourceTable = 'pays';
        $destinationTable = 'schedules';

        DB::table($sourceTable)->orderBy('id')
        ->chunk(200, function ($rows) use ($destinationTable) {
            $insertData = [];

            foreach ($rows as $row) {
                $insertData[] = (array) $row;
            }

            DB::table($destinationTable)->insert($insertData);
        });
    }

    public function runSchedule(){
       
        // Assuming you're copying data from Table1 to Table2
        Pay::chunk(200, function ($table1Data) {
            foreach ($table1Data as $data) {
                $schedule = new Schedule();
                
                // Copy the attributes from Table1 to Table2
                $schedule->name = $data->emp_sur .' '. $data->emp_fir .' '. $data->emp_init;
                $schedule->basic = $data->basic;
                $schedule->rent = $data->rent;
                $schedule->trans = $data->trans;
                $schedule->enter = $data->enter;
                $schedule->util = $data->util;
                $schedule->meal = $data->meal;
                $schedule->overtime = $data->overtime;
                $schedule->dom = $data->dom;
                $schedule->c = $data->c;
                $schedule->ca = $data->ca;
                $schedule->sd = $data->sd;
                $schedule->harz = $data->harz;
                $schedule->j_allow = $data->j_allow;
                $schedule->rob_allow = $data->rob_allow;
                $schedule->gross_pay = $data->gross_pay;
                $schedule->ded = $data->ded;
                $schedule->tot_pay = $data->tot_pay;
                
                // Set other attributes as needed
                
                // Save the record
                $schedule->save();
            }
        });
    }

    public function runBankSched(){
       
        // Assuming you're copying data from Table1 to Table2
        Pay::chunk(200, function($table1Data) {
            foreach ($table1Data as $data) {
                $banksched = new BankSched();

                $banksched->name = $data->emp_sur .' '. $data->emp_fir .' '. $data->emp_init;
                $banksched->tot_pay = $data->tot_pay;
                $banksched->bank_code = $data->bank_code;
                $banksched->acct_no = $data->acct_no;
                $banksched->bank_name = $data->bank_name;

                // Save the record
                $banksched->save();
            }
        });
        
    }

    public function addAcctNo(){
       
        // Assuming you're copying data from Table1 to Table2
        $employees = BankSched::all();

        foreach ($employees as $employee) {
            $salaries = Bank::where('bk_code', $employee->bank_code)->get();

            foreach ($salaries as $item) {
                $employee->update([
                    'bank_name' => $item->bk_name,
                    'branch' => $item->branch,
                ]);
            }
        }
    }

    public function runDeduct()
    {
        // Assuming you're copying data from Table1 to Table2
        Pay::chunk(200, function ($table1Data) {
            foreach ($table1Data as $data) {
                $schedule = new StaffDeduct();
                
                // Copy the attributes from Table1 to Table2
                $schedule->name = $data->emp_sur .' '. $data->emp_fir .' '. $data->emp_init;
                $schedule->tax = $data->tax;
                $schedule->car_refu = $data->car_refu;
                $schedule->cf = $data->cf;
                $schedule->dev_levy = $data->dev_levy;
                $schedule->edu_levy = $data->edu_levy;
                $schedule->nh_fund = $data->nh_fund;
                $schedule->sd = $data->sd;
                $schedule->h_loan = $data->h_loan;
                $schedule->hl_bal = $data->hl_bal;
                $schedule->v_loan = $data->v_loan;
                $schedule->vl_bal = $data->vl_bal;
                $schedule->sal_adv = $data->sal_adv;
                $schedule->insure = $data->insure;
                $schedule->u_due = $data->u_due;
                $schedule->fide = $data->fide;
                $schedule->a = $data->a;
                $schedule->other = $data->other;
                $schedule->wel_fare = $data->wel_fare;
                $schedule->teac_allow = $data->teac_allow;
                $schedule->ndi_olu = $data->ndi_olu;
                $schedule->tot_ded = $data->ded;
                
                // Set other attributes as needed
                
                // Save the record
                $schedule->save();
            }
        });
    }
}
