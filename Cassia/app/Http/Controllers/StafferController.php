<?php

namespace App\Http\Controllers;

use App\DataTables\StafferDataTable;
use App\Models\Staffer;
use Illuminate\Http\Request;

class StafferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(StafferDataTable $dataTable)
    {
        return $dataTable->render('staffers');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staffercreate');
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
    public function show(Staffer $staffer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staffer $staffer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staffer $staffer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staffer $staffer)
    {
        //
    }
}
