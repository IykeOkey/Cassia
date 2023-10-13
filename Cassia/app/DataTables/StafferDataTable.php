<?php

namespace App\DataTables;

use App\Models\Staffer;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StafferDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'staffer.action')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Staffer $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('staffer-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('add'),
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
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                  ->exportable(true)
                  ->printable(true)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('min_name'),
            Column::make('staff_id'),
            Column::make('file_no'),
            Column::make('hq_sno'),
            Column::make('emp_no'),
            Column::make('inc_mo'),
            Column::make('dept_code'),
            Column::make('div_code'),
            Column::make('sec_code'),
            Column::make('title'),
            Column::make('emp_sur'),
            Column::make('emp_fir'),
            Column::make('emp_init'),
            Column::make('gender'),
            Column::make('bir_date'),
            Column::make('fappo'),
            Column::make('rank'),
            Column::make('sal_desc'),
            Column::make('sal_glev'),
            Column::make('sal_step'),
            Column::make('email'),
            Column::make('phone'),
            Column::make('lga'),
            Column::make('town'),
            Column::make('nok_id'),
            Column::make('agree_type'),
            Column::make('duty_disp'),
            Column::make('bank_code'),
            Column::make('acct_no'),
            Column::make('bank_id'),
            Column::make('bverify'),
            Column::make('rtd_date'),
            Column::make('flag'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Staffer_' . date('YmdHis');
    }
}
