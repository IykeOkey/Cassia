<?php

namespace App\Http\Controllers;

use App\DataTables\DeductDataTable;
use App\Models\Deductn;
use Illuminate\Http\Request;

class DeductnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DeductDataTable $dataTable)
    {
        return $dataTable->render('deductns');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('deductncreate');
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
    public function show(Deductn $deductn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deductn $deductn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deductn $deductn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deductn $deductn)
    {
        //
    }
}
