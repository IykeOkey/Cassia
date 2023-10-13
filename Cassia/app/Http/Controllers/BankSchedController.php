<?php

namespace App\Http\Controllers;

use App\DataTables\BankSchedDataTable;
use App\Models\BankSched;
use Illuminate\Http\Request;

class BankSchedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BankSchedDataTable $dataTable)
    {
        return $dataTable->render('banksched');
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
    public function show(BankSched $bankSched)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BankSched $bankSched)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BankSched $bankSched)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankSched $bankSched)
    {
        //
    }
}
