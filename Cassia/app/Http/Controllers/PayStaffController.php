<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use App\Models\Deductn;
use App\Models\Nomroll;
use App\Models\Lawyers;
use App\Models\Pay;
use App\Models\SchedSal;
use App\Models\Welfare;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PayStaffController extends Controller
{
    
    public function doPayroll()
    {
        ini_set('max_execution_time', 300);

        $this->index();
        $this->create();
        $this->addLagalAllow();
        $this->addAllow();
    }

    public function runSalary()
    {
        ini_set('max_execution_time', 300);
        
        $this->addWelfare();
        $this->calcDed();
        $this->addGrossPay();
        $this->addTotalDed();
        $this->addNetPay();
    } 

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // $employees = Nomroll::all();

       DB::table('pays')->truncate();

        $sourceTable = 'nomrolls';
        $destinationTable = 'pays';

        DB::table($sourceTable)->orderBy('id')->where('flag', '=', 'ON')
        ->chunk(200, function ($rows) use ($destinationTable) {
            $insertData = [];

            foreach ($rows as $row) {
                $insertData[] = (array) $row;
            }

            DB::table($destinationTable)->insert($insertData);
        });

    }

    public function create(){
        

        $employees = Pay::all();

        $employees->each(function ($employee) {
            Chart::where('sal_id', $employee->sal_id)->chunk(300, function ($salaries) use ($employee) {
                foreach ($salaries as $item) {
                    $employee->update([
                        'basic' => $item->basicpm,
                        'rent' => $item->rent,
                        'trans' => $item->trans,
                        'meal' => $item->meal,
                        'util' => $item->util,
                        'enter' => $item->enter,
                        'dom' => $item->domestic,
                    ]);
                }
            });
        });
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addLagalAllow()
    {
        $employees = Pay::all();

        foreach ($employees as $employee) {
            $salaries = Lawyers::where('duty_disp', $employee->emp_no)->get();
            
            foreach ($salaries as $item) {
                $employee->update([
                    'c' => $item->dom,
                    'ca' => $item->ca,
                    'harz' => $item->harz,
                    'rob_allow' => $item->rob_allow,
                ]);
            }
        }
    }

    public function addAllow()
    {
        $employees = Pay::all();

        foreach ($employees as $employee) {
            $salaries = Deductn::where('duty_disp', $employee->duty_disp)->get();

            foreach ($salaries as $item) {
                $employee->update([
                    'overtime' => $item->o_time,
                    'sd' => $item->sp_duty,
                ]);
            }
        }
    }

    public function addWelfare()
    {
        $employees = Pay::all();

        foreach ($employees as $employee) {
            $salaries = Welfare::where('welfare_code', $employee->sec_code)->get();

            foreach ($salaries as $item) {
                $employee->update([
                    'wel_fare' => $item->welfare_amount,
                ]);
            }
        }
    }

        
    public function calcDed(){
        $employees = Pay::all();

        foreach ($employees as $employee) {
                     
            $basic = $employee->basic;
            $ashia = $employee->ashia;
            $emp_no = $employee->emp_no;
            $rank = $employee->rank;

            $tax = '';
            $tax_others = $basic * 0.01;
            $tax_dreg = 704.90;
            $tax_psec = 1560.79;

            if ($employee->emp_no == 'DREG') {
                $tax = $tax_dreg;
            } elseif ($employee->emp_no == 'PSEC') {
                $tax = $tax_psec;
            } else {
                $tax = $tax_others;
            }

               $ndi_olu = 0.00;
               
            if ($ashia != 'YES') {
                $ndi_olu = 0.00;
            } else {
                $ndi_olu = $basic * 0.05;
            }

            if (($rank == 'TEMP.DRIVER') || ($rank == 'TEMP. DRIVER')
            || ($rank == 'TEMP. MOTOR DRIVER') || ($rank == 'TEMPORARY DRIVER') || ($rank == 'MEMBER')) {
                $union_dues = 0.00;
            } elseif(($emp_no == 'PSEC') || ($emp_no == 'DREG') || ($emp_no == 'PRESIDENT') || ($emp_no == 'MAG17')) {
                $union_dues = 0.00;
            } else{
                $union_dues = $basic * 0.03;
            }
        //    print_r(round($union_dues, 2));

            $employee->update([
                'u_due' => $union_dues,
                'ndi_olu' => $ndi_olu,
                'tax' => $tax,
            ]);
            
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addGrossPay()
    {   
        Pay::chunk(200, function ($employees) {

            foreach ($employees as $employee) {
                     
                $basic = $employee->basic;
                $rent = $employee->rent;
                $trans = $employee->trans;
                $meal = $employee->meal;
                $util = $employee->util;
                $enter = $employee->enter;
                $dom = $employee->dom + $employee->c;
                $otime = $employee->overtime;
                $sd = $employee->sd;
                $ca = $employee->ca;
                $harz = $employee->harz;
                $rob_allow = $employee->rob_allow;
            
            $gross_pay = $basic + $otime + $sd + $ca + $harz 
                + $rob_allow + $rent + $trans + $meal + $util 
                + $enter + $dom;
            
                $conjus = $gross_pay * 0.05;
                $gross_pays = $gross_pay + $conjus;
             
              // might be more logic here
              $employee->update([
                'gross_pay' => $gross_pays,
                'j_allow' => $conjus,
            ]);
            }
          });
    }

    public function addTotalDed()
    {
        Pay::chunk(200, function ($employees) {

            foreach ($employees as $employee) {
                     
                $car_refu = $employee->car_refu;
                $cf = $employee->cf;
                $dev_levy = $employee->dev_levy;
                $edu_levy = $employee->edu_levy;
                $nh_fund = $employee->nh_fund;
                $h_loan = $employee->h_loan;
                $hl_bal = $employee->h_bal;
                $v_loan = $employee->v_loan;
                $vl_bal = $employee->vl_bal;
                $sal_adv = $employee->sal_adv;
                $sal_arrea = $employee->sal_arrea;
                $sal_bal = $employee->sal_bal;
                $insure = $employee->insure;
                $union_dues = $employee->u_dues;
                $fide = $employee->fide;
                $a = $employee->a;
                $other = $employee->other;
                $wel_fare = $employee->wel_fare;
                $teac_allow = $employee->teach_allow;
                $ndi_olu = $employee->ndi_olu;
    
                $tot_ded =  $car_refu + $dev_levy + $edu_levy + $nh_fund + 
                        $h_loan + $hl_bal + $v_loan + $vl_bal + $sal_adv + $sal_arrea + 
                        $sal_bal + $insure + $union_dues + $fide + $a + $other + 
                        $wel_fare + $teac_allow + $ndi_olu;
              
              $employee->update(['ded' => $tot_ded]);
            }
          });
    }

    /**
     * Display the specified resource.
     */
    public function addNetPay()
    {
        Pay::chunk(200, function ($employees) {

            foreach ($employees as $employee) {
                $gross_pay = $employee->gross_pay;
                $gross_ded = $employee->ded;
                $net_pay = $gross_pay - $gross_ded;

              // might be more logic here
              $employee->update(['tot_pay' => $net_pay]);
            }
          });
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
