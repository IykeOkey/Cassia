<?php

namespace App\Http\Controllers;

use App\DataTables\NomrollDataTable;
use App\Models\Nomroll;
use Illuminate\Http\Request;

class NomrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(NomrollDataTable $dataTable)
    {
        return $dataTable->render('nomroll');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nomrollcreate');
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
    public function show(Nomroll $nomroll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nomroll $nomroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nomroll $nomroll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nomroll $nomroll)
    {
        //
    }
}
