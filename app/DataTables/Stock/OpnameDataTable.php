<?php

namespace App\DataTables\Stock;

use App\Models\Stock\Opname;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class OpnameDataTable extends DataTable
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
            ->editColumn('user_uuid', function ($datatable) {
                return $datatable->user()->first()->fullname;
            })
            ->addColumn('action', function ($datatable) {
                $html  = "";
                $html .= "<a href='".route('bungadavi.opnames.edit', ['opname' => $datatable->uuid])."' class='text-success m-1'><span class='fa fa-edit'></span></a>";
                $html .= "<a href='".route('bungadavi.stocks.show', ['stock' => $datatable->stocks_uuid])."' class='text-primary m-1'><span class='fa fa-eye'></span></a>";
                $html .= "<a class='text-danger m-1' onclick='delete_ajax(\"".$datatable->uuid."\")'><span class='fa fa-trash'></span></a>";
                return $html;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Product/Opname $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Opname $model)
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
            Column::make('stocks_uuid'),
            Column::make('qty_stock_opname'),
            Column::make('notes_stock_opname'),
            Column::make('user_uuid'),
            Column::make('created_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Product/Opname_' . date('YmdHis');
    }
}
