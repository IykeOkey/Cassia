<?php

namespace App\Http\Controllers;

use App\Models\Staffer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StafferEditController extends Controller
{
    
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Staffer::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){   

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm" id="editStaffer">Edit</a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteStaffer">Delete</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('stafferedit');
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
        Staffer::updateOrCreate(['id' => $request->staffer_id],

        [
            'min_name' => $request->min_name,
            'staff_id' => $request->staff_id,
            'file_no' => $request->file_no,
            'hq_sno' => $request->hq_sno,
            'emp_no' => $request->emp_no,
            'inc_mo' => $request->inc_mo,
            'dept_code' => $request->dept_code,
            'div_code' => $request->div_code,
            'sec_code' => $request->sec_code,
            'title' => $request->title,
            'emp_sur' => $request->emp_sur,
            'emp_fir' => $request->emp_fir,
            'emp_init' => $request->emp_init,
            'gender' => $request->gender,
            'bir_date' => $request->bir_date,
            'fappo' => $request->fappo,
            'rank' => $request->rank,
            'sal_desc' => $request->sal_desc,
            'sal_glev' => $request->sal_glev,
            'sal_step' => $request->sal_step,
            'email' => $request->email,
            'phone' => $request->phone,
            'lga' => $request->lga,
            'town' => $request->town,
            'nok_id' => $request->nok_id,
            'agree_type' => $request->agree_type,
            'duty_disp' => $request->duty_disp,
            'bank_code' => $request->bank_code,
            'acct_no' => $request->acct_no,
            'bank_id' => $request->bank_id,
            'bverify' => $request->bverify,
            'rtd_date' => $request->rtd_date,
            'flag' => $request->flag,
    ]);

return response()->json(['success'=>'Staff saved successfully.']);
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
        $cadre = Staffer::find($id);

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
        Staffer::find($id)->delete();

        return response()->json(['success'=>'staff info deleted successfully.']);
    }
}
