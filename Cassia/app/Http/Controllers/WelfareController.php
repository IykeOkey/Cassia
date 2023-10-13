<?php

namespace App\Http\Controllers;

use App\DataTables\WelfareDataTable;
use App\Models\Welfare;
use Illuminate\Http\Request;

class WelfareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WelfareDataTable $dataTable)
    {
        return $dataTable->render('welfare');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('welfarecreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new Welfare;        
        $user->welfare_code = $request->input('welfare_code');
        $user->welfare_name = $request->input('welfare_name');
        $user->welfare_amount = $request->input('welfare_amount');
        $user->remarks = $request->input('remarks');
        $user->save();
        
        return redirect()->route('welfares.welfare')->with([
            'message' => 'Welfare data added successfully!', 
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Welfare $welfare)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Welfare $welfare)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Welfare $welfare)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Welfare $welfare)
    {
        //
    }
}
