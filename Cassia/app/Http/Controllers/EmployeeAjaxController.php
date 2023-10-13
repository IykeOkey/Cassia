<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Staffer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EmployeeAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Staffer::latest()->get();
            return DataTables ::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){   

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm" id="editEmployee">Edit</a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteEmployee">Delete</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('employeeajax');
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
        Employee::updateOrCreate(['id' => $request->employee_id],

        [
        'emp_no' => $request->emp_no, 
        'file_no' => $request->file_no, 
        'last_name' => $request->last_name, 
        'middle_name' => $request->middle_name, 
        'first_name' => $request->first_name, 
        'inc_mo' => $request->inc_mo, 
        'fappo' => $request->fappo, 
        'phone' => $request->phone, 
        'email' => $request->email, 
        'birthdate' => $request->birthdate, 
        'marital_status' => $request->marital_status, 
        'media_id' => $request->media_id, 
        'address' => $request->address, 
        'country' => $request->country, 
        'state' => $request->state, 
        'lga' => $request->lga, 
        'town' => $request->town, 
        'gender' => $request->gender, 
        'rk_id' => $request->rk_id, 
        'cad_id' => $request->cad_id, 
        'ct_id' => $request->ct_id, 
        'emp_status' => $request->emp_status, 
        'flag' => $request->flag, 
        'remark' => $request->remark, 
        'is_active' => $request->is_active
    ]);

return response()->json(['success'=>'Employee saved successfully.']);
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
        $employee = Employee::find($id);

        return response()->json($employee);
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
        Employee::find($id)->delete();

        return response()->json(['success'=>'employee deleted successfully.']);
    }
}
