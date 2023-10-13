<?php

namespace App\Http\Controllers;

use App\DataTables\LeaveDataTable;
use App\DataTables\LeaveDataTableEditor;
use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(LeaveDataTable $dataTable)
    {
        return $dataTable->render('leave');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leavtypecreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new Leave;
        $user->lv_code = $request->input('lv_code');
        $user->lv_name = $request->input('lv_name');
        $user->save();
        
        return redirect()->route('leaves.leave')->with([
            'message' => 'Leave type added successfully!', 
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Leave $leave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leave $leave)
    {
        //
    }
}
