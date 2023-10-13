<?php

namespace App\DataTables;

use App\Models\Pay;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PayDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', '')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Pay $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('pay-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                   // ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
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
            Column::make('file_no'),
            Column::make('hq_sno'),
            Column::make('emp_no'),
            Column::make('dept_code'),
            Column::make('div_code'),
            Column::make('sec_code'),
            Column::make('ashia'),
            Column::make('emp_sur'),
            Column::make('emp_fir'),
            Column::make('emp_init'),
            Column::make('sex'),
            Column::make('bir_date'),
            Column::make('fappo'),
            Column::make('prom_date'),
            Column::make('post'),
            Column::make('rank'),
            Column::make('sal_id'),
            Column::make('sal_glev'),
            Column::make('sal_step'),
            Column::make('basic'),
            Column::make('gross_pay'),
            Column::make('agree_type'),
            Column::make('duty_disp'),
            Column::make('rent'),
            Column::make('trans'),
            Column::make('enter'),
            Column::make('meal'),
            Column::make('util'),
            Column::make('j_allow'),
            Column::make('tax'),
            Column::make('car_refu'),
            Column::make('cf'),
            Column::make('ded'),
            Column::make('tot_pay'),
            Column::make('emp_code'),
            Column::make('dev_levy'),
            Column::make('edu_levy'),
            Column::make('nh_fund'),
            Column::make('sd'),
            Column::make('dom'),
            Column::make('gr'),
            Column::make('out'),
            Column::make('ca'),
            Column::make('bank_code'),
            Column::make('acct_no'),
            Column::make('bank_id'),
            Column::make('pen_pin'),
            Column::make('staff_id'),
            Column::make('bvn'),
            Column::make('h_loan'),
            Column::make('hl_bal'),
            Column::make('v_loan'),
            Column::make('vl_bal'),
            Column::make('sal_adv'),
            Column::make('sal_bal'),
            Column::make('insure'),
            Column::make('u_due'),
            Column::make('fide'),
            Column::make('cert'),
            Column::make('lga'),
            Column::make('sw'),
            Column::make('a'),
            Column::make('c'),
            Column::make('harz'),
            Column::make('rob_allow'),
            Column::make('overtime'),
            Column::make('inc_mo'),
            Column::make('other'),
            Column::make('wel_fare'),
            Column::make('teac_allow'),
            Column::make('ndi_olu'),
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
        return 'Pay_' . date('YmdHis');
    }
}
