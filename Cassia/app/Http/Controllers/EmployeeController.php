<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\DataTables\EmployeeDataTable;
use App\DataTables\EmployViewDataTable;

class EmployeeController extends Controller
{
    public function index(EmployeeDataTable $datatable)
    {
        return $datatable->render('employee');
    }

    public function index2(){
        return view('employview');
    }
     
    public function getUsers(EmployViewDataTable $dataTable){
        return $dataTable->render('employview');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new Employee;
        $user->emp_no = $request->input('emp_no');
        $user->file_no = $request->input('file_no');
        $user->last_name = $request->input('last_name');
        $user->middle_name = $request->input('middle_name');
        $user->first_name = $request->input('first_name');
        $user->inc_no = $request->input('inc_mo');
        $user->fappo = $request->input('fappo');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->birthdate = $request->input('birthdate');
        $user->marital_status = $request->input('marital_status');
        $user->media_id = $request->input('media_id');
        $user->address = $request->input('address');
        $user->country = $request->input('country');
        $user->state = $request->input('state');
        $user->lga = $request->input('lga');
        $user->town = $request->input('town');
        $user->gender = $request->input('gender');
        $user->rk_id = $request->input('rk_id');
        $user->cad_id = $request->input('cad_id');
        $user->ct_id = $request->input('ct_id');
        $user->emp_status = $request->input('emp_status');
        $user->flag = $request->input('flag');
        $user->remarks = $request->input('remark');
        $user->is_active = $request->input('is_active');
        $user->save();
        
        return redirect()->route('employees.employee')->with([
            'message' => 'Staff added successfully!', 
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
