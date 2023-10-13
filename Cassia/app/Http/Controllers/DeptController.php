<?php

namespace App\Http\Controllers;

use App\DataTables\DeptDataTable;
use App\Models\Dept;
use Illuminate\Http\Request;

class DeptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DeptDataTable $datatable)
    {
        return $datatable->render('dept');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('deptcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new Dept;        
        $user->dept_code = $request->input('dept_code');
        $user->dept_name = $request->input('dept_name');
        $user->save();
        
        return redirect()->route('depts.dept')->with([
            'message' => 'Department added successfully!', 
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Dept $dept)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dept $dept)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dept $dept)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dept $dept)
    {
        //
    }
}
