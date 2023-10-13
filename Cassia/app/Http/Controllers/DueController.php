<?php

namespace App\Http\Controllers;

use App\DataTables\DueDataTable;
use App\Models\Due;
use Illuminate\Http\Request;

class DueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DueDataTable $datatable)
    {
        return $datatable->render('due');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('duecreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new Due;
        $user->emptype_id = $request->input('emptype_id');
        $user->rate_param = $request->input('rate_param');
        $user->rate = $request->input('rate');
        $user->due_name = $request->input('due_name');
        $user->amount = $request->input('amount');
        $user->save();
        
        return redirect()->route('dues.due')->with([
            'message' => 'Dues added successfully!', 
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Due $due)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Due $due)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Due $due)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Due $due)
    {
        //
    }
}
