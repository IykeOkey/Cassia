<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Schedule;
use Illuminate\Http\Request;

class RunSalaryController extends Controller
{
    public function copyData()
{
    $sourceData = Employee::where('flag', 'on')
                            ->select('emp_no',
                            'last_name',
                            'middle_name',
                            'first_name',
                            'inc_mo',
                            'fappo',
                            'phone',
                            'email',
                            'gender',
                            'rk_id',
                            'cad_id',
                            'ct_id',
                            'emp_status',
                            'flag',
                            'remark',
                            'is_active')
                            ->get();

    foreach ($sourceData as $data) {
        $destinationModel = new Schedule();
        $destinationModel->emp_no = $data->staff_id;
        $destinationModel->file_no = $data->file_no;
        $destinationModel->last_name = $data->last_name;
        $destinationModel->middle_name = $data->middle_name;
        $destinationModel->first_name = $data->first_name;
        $destinationModel->inc_mo = $data->inc_mo;
        $destinationModel->fappo = $data->fappo;
        $destinationModel->phone = $data->phone;
        $destinationModel->email = $data->email;
        $destinationModel->gender = $data->gender;
        $destinationModel->rk_id = $data->rk_id;
        $destinationModel->cad_id = $data->cadre_code;
        $destinationModel->ct_id = $data->ct_id;
        $destinationModel->flag = $data->flag;
        $destinationModel->remark = $data->remark;
        
        $destinationModel->save();
    }
}
}
