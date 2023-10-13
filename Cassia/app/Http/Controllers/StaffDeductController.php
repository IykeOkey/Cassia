<?php

namespace App\Http\Controllers;

use App\DataTables\StaffDeductDataTable;
use App\Models\StaffDeduct;
use Illuminate\Http\Request;

class StaffDeductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(StaffDeductDataTable $dataTable)
    {
        return $dataTable->render('staffdeduct');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staffdeductcreate');
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
    public function show(StaffDeduct $staffDeduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StaffDeduct $staffDeduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StaffDeduct $staffDeduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StaffDeduct $staffDeduct)
    {
        //
    }
}
