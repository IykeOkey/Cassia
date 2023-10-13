<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use App\Models\Payroll;
use App\Models\Staffer;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Payroll $payroll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payroll $payroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payroll $payroll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payroll $payroll)
    {
        //
    }

    public function generatePayroll(Request $request)
    {
        // Retrieve the staff ID and the month for which payroll needs to be generated
        $staffId = $request->input('staff_id');
        $month = $request->input('month');

        // Retrieve the staff, salary, and deduction records
        $staff = Staffer::find($staffId);
        $salary = Staffer::where('staff_id', $staffId)
                        ->whereMonth('Date', $month)
                        ->first();
        $deductions = Deduction::whereHas('salary', function ($query) use ($staffId, $month) {
                            $query->where('StaffID', $staffId)
                                  ->whereMonth('Date', $month);
                        })
                        ->get();

        // Calculate the total deductions
        $totalDeductions = $deductions->sum('amount');

        // Calculate the net salary
        $netSalary = $salary->amount - $totalDeductions;

        // Create the payroll entry
        $payroll = new Payroll();
        $payroll->staff_id = $staffId;
        $payroll->month = $month;
        $payroll->salary = $salary->amount;
        $payroll->staff_id
        $payroll->emp_sur
        $payroll->emp_fir
        $payroll->emp_init
        $payroll->sal_desc
        $payroll->basic
        $payroll->hous
        $payroll->trans
        $payroll->enter
        $payroll->meal
        $payroll->util
        $payroll->j_allow
        $payroll->dom
        $payroll->over
        $payroll->ca
        $payroll->hazard
        $payroll->rob_allow
        $payroll->overtime
        $payroll->spec_duty
        $payroll->others
        $payroll->tax
        $payroll->ded
        $payroll->gross_pay
        $payroll->net_pay
        $payroll->deductions = $totalDeductions;
        $payroll->net_salary = $netSalary;
        $payroll->save();

        // Return a response or redirect
        // ...
    }

    public function payroll(Request $request)
    {
        // Retrieve the necessary data for payroll processing
        $payrollMonth = $request->input('payroll_month'); // Month for the payroll

        // Retrieve all staff with their corresponding grade levels
        $staff = Staffer::all(['id', 'staff_id', 'sal_desc', 'emp_sur', 'emp_fir', 'emp_init']);

        // Fetch the staff salaries based on grade level from the chart table
        $staffSalaries = [];
        foreach ($staff as $staffData) {
            $gradeLevel = $staffData->staff_id;
            $salaryData = Staffer::where('sal_desc', $gradeLevel)->first().
                            Chart::where('sal_desc', $gradeLevel)->first();
            if ($salaryData) {
                $staffSalaries[] = [
                    'staff_id' => $staffData->id,
                    'grade_level' => $gradeLevel,
                    'basic_salary' => $salaryData->basic_salary,
                    'rent_allowance' => $salaryData->rent_allowance,
                    'transport_allowance' => $salaryData->transport_allowance,
                    'tax' => $salaryData->tax,
                    'union_dues' => $salaryData->union_dues,
                    'loan_repayment' => $salaryData->loan_repayment,
                    'levy' => $salaryData->levy,
                    'payroll_month' => $payrollMonth,
                    'staff_id' => $staffData->,
                    'emp_sur' => $staffData->,
                    'emp_fir' => $staffData->,
                    'emp_init' => $staffData->,
                    'sal_desc' => $staffData->,
                    'basic' => $staffData->,
                    'hous' => $staffData->,
                    'trans' => $staffData->,
                    'enter' => $staffData->,
                    'meal' => $staffData->,
                    'util' => $staffData->,
                    'j_allow' => $staffData->,
                    'dom' => $staffData->,
                    'over' => $staffData->,
                    'ca' => $staffData->,
                    'hazard' => $staffData->,
                    'rob_allow' => $staffData->,
                    'overtime' => $staffData->,
                    'spec_duty' => $staffData->,
                    'others' => $staffData->,
                    'tax' => $staffData->,
                    'ded' => $staffData->,
                    'gross_pay',
                    'net_pay'
                ];
            }
        }

        // Store the payroll data in the database
        DB::beginTransaction();
        try {
            Payroll::insert($staffSalaries);
            DB::commit();

            return redirect()->route('staff_salaries.index')->with('success', 'Payroll processed successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('staff_salaries.index')->with('error', 'Failed to process payroll.');
        }
    }

}
