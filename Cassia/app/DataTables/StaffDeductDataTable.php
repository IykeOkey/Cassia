<?php

namespace App\DataTables;

use App\Models\StaffDeduct;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StaffDeductDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'staffdeduct.action')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(StaffDeduct $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('staffdeduct-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
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
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('emp_code'),
            Column::make('name'),
            Column::make('tax'),
            Column::make('car_refu'),
            Column::make('dev_levy'),
            Column::make('edu_levy'),
            Column::make('ashia'),
            Column::make('nh_fund'),
            Column::make('u_dues'),
            Column::make('j_welfare'),
            Column::make('welfare_id'),
            Column::make('welf_refund'),
            Column::make('man'),
            Column::make('memb'),
            Column::make('h_loan'),
            Column::make('hl_bal'),
            Column::make('v_loan'),
            Column::make('vl_bal'),
            Column::make('sal_adv'),
            Column::make('sal_arrea'),
            Column::make('sal_bal'),
            Column::make('insure'),
            Column::make('other_ded'),
            Column::make('ded'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'StaffDeduct_' . date('YmdHis');
    }
}
