<?php

namespace App\Http\Controllers;

use App\DataTables\CadreDataTable;
use App\Models\Cadre;
use Illuminate\Http\Request;

class CadreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CadreDataTable $dataTable)
    {
        return $dataTable->render('cadre');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cadrecreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new Cadre;
        $user->glev_id = $request->input('glev_id');
        $user->cdr_code = $request->input('cdr_code');
        $user->cdr_name = $request->input('cdr_name');
        $user->save();
        
        return redirect()->route('cadres.cadre')->with([
            'message' => 'Bank added successfully!', 
            'status' => 'success'
        ]);        
    }

    /**
     * Display the specified resource.
     */
    public function show(Cadre $cadre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cadre $cadre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cadre $cadre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cadre $cadre)
    {
        //
    }
}
