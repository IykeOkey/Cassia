<?php

namespace App\Http\Controllers;

use App\Models\Workers;
use Illuminate\Http\Request;

class WorkersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workers = Workers::query();
        return datatables()::of($workers)
            ->addColumn('action', function ($workers) {
                 
                $showBtn =  '<button ' .
                                ' class="btn btn-outline-info" ' .
                                ' onclick="showWorkers(' . $workers->id . ')">Show' .
                            '</button> ';
 
                $editBtn =  '<button ' .
                                ' class="btn btn-outline-success" ' .
                                ' onclick="editWorkers(' . $workers->id . ')">Edit' .
                            '</button> ';
 
                $deleteBtn =  '<button ' .
                                ' class="btn btn-outline-danger" ' .
                                ' onclick="destroyWorkers(' . $workers->id . ')">Delete' .
                            '</button> ';
 
                return $showBtn . $editBtn . $deleteBtn;
            })
            ->rawColumns(
            [
                'action',
            ])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required',
            'position ' => 'required',
            'office' => 'required',
            'start_date' => 'required',
            'salary' => 'required'
        ]);
  
        $workers = new Workers();
        $workers->first_name = $request->first_name;
        $workers->last_name = $request->last_name;
        $workers->position = $request->position;
        $workers->office = $request->office;
        $workers->start_date = $request->start_date;
        $workers->salary = $request->salary;
        $workers->save();
        return response()->json(['status' => "success"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $workers = Workers::find($id);
        return response()->json(['workers' => $workers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required',
            'position ' => 'required',
            'office' => 'required',
            'start_date' => 'required',
            'salary' => 'required'
        ]);
  
        $workers = Workers::find($id);
        $workers->first_name = $request->first_name;
        $workers->last_name = $request->last_name;
        $workers->position = $request->position;
        $workers->office = $request->office;
        $workers->start_date = $request->start_date;
        $workers->salary = $request->salary;
        $workers->save();
        return response()->json(['status' => "success"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Workers::destroy($id);
        return response()->json(['status' => "success"]);
    }
}
