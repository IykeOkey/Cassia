<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use App\Models\Pay;
use Illuminate\Http\Request;

class SalaryPayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        $chart = Chart::all();

        Pay::where('sal_id', $chart->sal_id)
          ->update([
            'basic' => $chart->basicpm,
          'rent' => $chart->rent,
          'trans' => $chart->trans,
          'meal' => $chart->meal,
          'util' => $chart->util,
          'enter' => $chart->enter,
          'dom' => $chart->domestic,
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
