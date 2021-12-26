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
        ->editColumn('currency_code_from_id', function ($data){
            return $data->currencyCodeFrom()->first()->name;
            })
        ->editColumn('currency_code_to_id', function ($data){
            return $data->currencyCodeTo()->first()->name;
            })
        ->addColumn('action', function ($datatable) {
            $html  = "";
            $html .= "<a href='".route('bungadavi.currencyrate.edit', ['currencyrate' => $datatable->id])."' class='text-success m-1'><span class='fa fa-edit'></span></a>";
            $html .= "<a class='text-danger m-1' onclick='delete_ajax(\"".$datatable->id."\")'><span class='fa fa-trash'></span></a>";
            return $html;
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
        return $model->newQuery();
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
                    ->orderBy(1);
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
