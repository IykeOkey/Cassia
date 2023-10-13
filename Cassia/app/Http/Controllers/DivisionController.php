<?php

namespace App\Http\Controllers;

use App\DataTables\DivisionDataTable;
use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DivisionDataTable $datatable)
    {
        return $datatable->render('division');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('divcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new Division;
        $user->dept_code = $request->input('st_id');
        $user->dept_code = $request->input('div_code');
        $user->dept_name = $request->input('div_name');
        $user->save();
        
        return redirect()->route('divisions.division')->with([
            'message' => 'Department added successfully!', 
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Division $division)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Division $division)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Division $division)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Division $division)
    {
        //
    }
}
