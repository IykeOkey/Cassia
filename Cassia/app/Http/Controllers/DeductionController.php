<?php

namespace App\Http\Controllers;

use App\DataTables\DeductionDataTable;
use App\Models\Deduction;
use Illuminate\Http\Request;

class DeductionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DeductionDataTable $datatable)
    {
        return $datatable->render('deduction');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('deductcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new Deduction;        
        $user->ded_code = $request->input('ded_code');
        $user->ded_name = $request->input('ded_name');
        $user->amount = $request->input('amount');
        $user->save();
        
        return redirect()->route('deductions.deduction')->with([
            'message' => 'Deduction added successfully!', 
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Deduction $deduction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deduction $deduction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deduction $deduction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deduction $deduction)
    {
        //
    }
}
