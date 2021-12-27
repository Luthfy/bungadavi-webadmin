<?php

namespace App\DataTables\Stock;

use App\Models\Stock\Split;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SplitDataTable extends DataTable
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
            ->editColumn('stock_original_uuid', function ($datatable) {
                return $datatable->stocks('stock_original_uuid')->first() != null ? $datatable->stocks('stock_original_uuid')->first()->name_stock : '-';
            })
            ->editColumn('stock_fraction_uuid', function ($datatable) {
                return $datatable->stocks('stock_fraction_uuid')->first() != null ? $datatable->stocks('stock_fraction_uuid')->first()->name_stock : '-';
            })
            ->addColumn('action', function ($datatable) {
                $html  = "";
                // $html .= "<a href='".route('bungadavi.shops.edit', ['shop' => $datatable->uuid])."' class='text-success m-1'><span class='fa fa-edit'></span></a>";
                $html .= "<a href='".route('bungadavi.stocks.show', ['stock' => $datatable->stock_original_uuid])."' class='text-primary m-1'><span class='fa fa-eye'></span></a>";
                $html .= "<a class='text-danger m-1' onclick='delete_ajax(\"".$datatable->uuid."\")'><span class='fa fa-trash'></span></a>";
                return $html;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Split $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Split $model)
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
            Column::make('stock_original_uuid')
                ->title('Stock Original'),
            Column::make('stock_fraction_uuid')
                ->title('Stock New'),
            Column::make('qty_stock_split')
                ->title('Multiplier'),
            Column::make('unit_id')
                ->title('Unit'),
            Column::make('notes_stock_split')
                ->title('Notes'),
            Column::make('created_at')
                ->title('Created'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Split_' . date('YmdHis');
    }
}
