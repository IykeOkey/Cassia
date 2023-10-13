<?php

namespace App\Http\Controllers;

use App\Models\Cadre;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CadreAjaxController extends Controller
{ 
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Cadre::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){   

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm" id="editCadre">Edit</a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteCadre">Delete</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('cadreajax');
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
        Cadre::updateOrCreate(['id' => $request->cadre_id],

        [
            'glev_id' => $request->glev_id, 
            'cdr_code' => $request->cdr_code, 
            'cdr_name' => $request->cdr_name
    ]);

return response()->json(['success'=>'Bank saved successfully.']);
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
        $cadre = Cadre::find($id);

        return response()->json($cadre);
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
        Cadre::find($id)->delete();

        return response()->json(['success'=>'cadre info deleted successfully.']);
    }
}
