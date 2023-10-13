<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ChartAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Chart::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){   

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm" id="editChart">Edit</a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteChart">Delete</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('chartajax');
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
        Chart::updateOrCreate(['id' => $request->chart_id],

        ['cadre_code' => $request->cadre_code, 
        'basicpa' => $request->basicpa, 
        'basicpm' => $request->basicpm, 
        'rent' => $request->rent, 
        'trans' => $request->trans, 
        'meal' => $request->meal, 
        'util' => $request->util, 
        'enter' => $request->enter, 
        'domestic' => $request->domestic
    ]);

return response()->json(['success'=>'Chart saved successfully.']);
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
        $chart = Chart::find($id);

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
        Chart::find($id)->delete();

        return response()->json(['success'=>'chart item deleted successfully.']);
    }
}
