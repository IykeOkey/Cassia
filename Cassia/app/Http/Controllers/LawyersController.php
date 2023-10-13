<?php

namespace App\Http\Controllers;

use App\DataTables\LawyersDataTable;
use App\Models\Lawyers;
use Illuminate\Http\Request;

class LawyersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(LawyersDataTable $dataTable)
    {
        return $dataTable->render('lawyers');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lawyerscreate');
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
    public function show(Lawyers $lawyers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lawyers $lawyers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lawyers $lawyers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lawyers $lawyers)
    {
        //
    }
}
