<?php

namespace App\Http\Controllers;

use App\Models\Due;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DueAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Due::latest()->get();
            return DataTables ::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){   

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm" id="editDue">Edit</a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteDue">Delete</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('dueajax');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Due::updateOrCreate(['id' => $request->due_id],

        [
        'emptype_id' => $request->emptype_id, 
        'rate_param' => $request->rate_param, 
        'rate' => $request->rate, 
        'due_name' => $request->due_name, 
        'amount' => $request->amount
    ]);

return response()->json(['success'=>'Dues saved successfully.']);
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
        $chart = Due::find($id);

        return response()->json($chart);
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
        Due::find($id)->delete();

        return response()->json(['success'=>'dues item deleted successfully.']);
    }    
}
