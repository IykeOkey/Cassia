<?php

namespace App\Http\Controllers;

use App\DataTables\StaffDataTable;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    
        public function index(){
           return view('staffers');
        }
        
         public function getStaffers(StaffDataTable $dataTable){
                return $dataTable->render('staffers');
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
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        //
    }
}
