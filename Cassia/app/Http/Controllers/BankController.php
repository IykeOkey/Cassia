<?php

namespace App\Http\Controllers;

use App\DataTables\BankDataTable;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BankDataTable $datatable)
    {
        return $datatable->render('bankview');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bankcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new Bank;
        $user->bk_type = $request->input('bk_type');
        $user->bk_code = $request->input('bk_code');
        $user->sort_code = $request->input('sort_code');
        $user->bk_name = $request->input('bk_name');
        $user->branch = $request->input('branch');
        $user->save();

        return redirect()->route('banks.bankview')->with([
            'message' => 'Bank added successfully!', 
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bank $bank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bank $bank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bank $bank)
    {
        //
    }
}
