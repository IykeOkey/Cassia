<?php

namespace App\Http\Controllers;

use App\DataTables\TransferDataTable;
use App\Models\Transfer;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TransferDataTable $datatable)
    {
        return $datatable->render('transfer');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transfercreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new Transfer;
        $user->cad_id = $request->input('div_id');
        $user->ct_id = $request->input('ct_id');
        $user->emp_status = $request->input('staff_id');
        $user->flag = $request->input('trf_code');
        $user->remarks = $request->input('trf_name');
        $user->is_active = $request->input('wefdate');
        $user->save();
        
        return redirect()->route('transfers.transfer')->with([
            'message' => 'Transfer data added successfully!', 
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transfer $transfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transfer $transfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transfer $transfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transfer $transfer)
    {
        //
    }
}
