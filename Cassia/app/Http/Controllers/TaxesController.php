<?php

namespace App\Http\Controllers;

use App\DataTables\TaxesDataTable;
use App\Models\Taxes;
use Illuminate\Http\Request;

class TaxesController extends Controller
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
    public function create(TaxesDataTable $dataTable)
    {
        return $dataTable->render('chart');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('taxescreate');
    }

    /**
     * Display the specified resource.
     */
    public function show(Taxes $taxes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Taxes $taxes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Taxes $taxes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Taxes $taxes)
    {
        //
    }
}
