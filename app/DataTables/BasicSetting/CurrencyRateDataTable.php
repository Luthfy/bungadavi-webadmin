<?php

namespace App\DataTables\BasicSetting;

use App\Models\BasicSetting\CurrencyRate;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CurrencyRateDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
        ->eloquent($query)
        ->addColumn('action', function ($datatable) {
            $active     = "<a href='#' onclick='updateCurrencyStatus(".$datatable->id." ,1)'><span class='badge badge-warning'>Not Active</span></a>";
            $inactive   = "<a href='#' onclick='updateCurrencyStatus(".$datatable->id." ,0)'><span class='badge badge-success'>Activated</span></a>";

            return ($datatable->is_active == 1 ? $inactive : $active);
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BasicSetting/CurrencyRate $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(CurrencyRate $model)
    {
        return $model
                    ->orderBy('currency_code_from_id', 'asc')
                    ->orderBy('is_active', 'desc')
                    ->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('datatablesserverside')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('lfrtip')
                    ->orderBy(3);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('currency_code_from_id')->title('Currency From'),
            Column::make('currency_code_to_id')->title('Currency To'),
            Column::make('value'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'BasicSetting/CurrencyRate_' . date('YmdHis');
    }
}
