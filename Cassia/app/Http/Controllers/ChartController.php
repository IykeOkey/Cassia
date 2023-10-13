<?php

namespace App\Http\Controllers;

use App\DataTables\ChartDataTable;
use App\Models\Chart;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ChartDataTable $dataTable)
    {
        return $dataTable->render('chart');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('chartcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new Chart;        
        $user->cadre_code = $request->input('sal_id');
        $user->basicpa = $request->input('basicpa');
        $user->basicpm = $request->input('basicpm');
        $user->rent = $request->input('rent');
        $user->trans = $request->input('trans');
        $user->meal = $request->input('meal');
        $user->util = $request->input('util');
        $user->enter = $request->input('enter');
        $user->domestic = $request->input('domestic');
        $user->save();
        
        return redirect()->route('charts.chart')->with([
            'message' => 'Salary added successfully!', 
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Chart $chart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chart $chart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chart $chart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chart $chart)
    {
        //
    }
}
