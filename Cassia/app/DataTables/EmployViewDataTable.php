<?php

namespace App\DataTables;

use App\Models\Employee;
use App\Models\EmployView;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EmployViewDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable( $query)
    {
        return ($query)
        ->order(function($query){
            $query->orderBy('created_at', 'desc');
        })->addIndexColumn()
            ->addColumn('action', function($employee) {
                $btn = "<a href='javascript:void(0);' data-toggle='modal' 
            data-id=''.$employee->id.'' data-original-title='Edit' 
            id='edit-user' data-target='#editUserModal'
              class='btn btn-primary edit-user pr-4'>
             <span class='fa fa-pencil'></span></a>";
           $btn .= '<a href="javascript:void(0);" id="view-user" 
           data-toggle="modal" data-original-title="View"
 data-target="#viewUserModal"
            data-id="'.$employee->id.'" class="btn btn-info bolded">
           <i class="fa fa-eye" ></i></a>';
            $btn .= '<a href="javascript:void(0);" id="delete-user" 
            data-toggle="modal" data-original-title="Delete" 
data-target="#deleteUserModal"
             data-id="'.$employee->id.'" class="btn btn-danger pr-4"">
            <span class="fa fa-trash" ></span></a>';
           return $btn;
            })->addColumn('checkbox', function ($employee) {
                $checkBox = '<input type="checkbox" id="'.$employee->id.'"/>';
               return $checkBox;
          })->rawColumns(['action', 'checkbox']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Employee $model)
    {
        return $model->newQuery()->select('*');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('employees-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('create'),
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns()
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('emp_no'),
            Column::make('file_no'),
            Column::make('last_name'),
            Column::make('middle_name'),
            Column::make('first_name'),
            Column::make('inc_mo'),
            Column::make('fappo'),
            Column::make('phone'),
            Column::make('email'),
            Column::make('birthdate'),
            Column::make('marital_status'),
            Column::make('media_id'),
            Column::make('address'),
            Column::make('country'),
            Column::make('state'),
            Column::make('lga'),
            Column::make('town'),
            Column::make('gender'),
            Column::make('rk_id'),
            Column::make('cad_id'),
            Column::make('ct_id'),
            Column::make('emp_status'),
            Column::make('flag'),
            Column::make('remark'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'EmployView_' . date('YmdHis');
    }
}
