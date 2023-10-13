<?php

namespace App\Http\Controllers;

use App\DataTables\CourtDataTable;
use App\Models\Court;
use Illuminate\Http\Request;

class CourtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CourtDataTable $datatable)
    {
        return $datatable->render('court');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courtcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new Court;        
        $user->div_id = $request->input('div_id');
        $user->ct_code = $request->input('ct_code');
        $user->ct_name = $request->input('ct_name');
        $user->save();
        
        return redirect()->route('courts.court')->with([
            'message' => 'Court added successfully!', 
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Court $court)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Court $court)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Court $court)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Court $court)
    {
        //
    }
}
