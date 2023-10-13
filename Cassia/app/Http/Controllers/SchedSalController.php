<?php

namespace App\Http\Controllers;

use App\DataTables\SchedSalDataTable;
use App\Models\SchedSal;
use Illuminate\Http\Request;

class SchedSalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SchedSalDataTable $dataTable)
    {
        return $dataTable->render('schedsal');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('schedsalcreate');
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
    public function show(SchedSal $schedSal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchedSal $schedSal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SchedSal $schedSal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchedSal $schedSal)
    {
        //
    }
}
