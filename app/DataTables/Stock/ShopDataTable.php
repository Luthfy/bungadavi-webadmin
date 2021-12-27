<?php

namespace App\DataTables\Stock;

use App\Models\Stock\Shop;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ShopDataTable extends DataTable
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
            ->editColumn('stocks_uuid', function ($datatable) {
                return $datatable->stocks()->first()->name_stock;
            })
            ->addColumn('action', function ($datatable) {
                $html  = "";
                $html .= "<a href='".route('bungadavi.shops.edit', ['shop' => $datatable->uuid])."' class='text-success m-1'><span class='fa fa-edit'></span></a>";
                $html .= "<a href='".route('bungadavi.stocks.show', ['stock' => $datatable->stocks_uuid])."' class='text-primary m-1'><span class='fa fa-eye'></span></a>";
                $html .= "<a class='text-danger m-1' onclick='delete_ajax(\"".$datatable->uuid."\")'><span class='fa fa-trash'></span></a>";
                return $html;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Product/Shop $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Shop $model)
    {
        return $model->newQuery()->where('deleted_at', null);
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
            Column::make('stocks_uuid')
                ->title('Name Stock'),
            Column::make('total_price_stock_shop')
                ->title('Total Price')
                ->class('text-right'),
            Column::make('qty_stock_shop')
                ->title('Qty Stock')
                ->class('text-center'),
            Column::make('reject_stock_shop')
                ->title('Reject Stock')
                ->class('text-center'),
            Column::make('notes_stock_shop')
                ->title('Notes'),
            Column::make('created_at')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Product/Shop_' . date('YmdHis');
    }
}
