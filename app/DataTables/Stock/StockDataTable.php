<?php

namespace App\DataTables\Stock;

use App\Models\Stock\Stock;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class StockDataTable extends DataTable
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
            ->rawColumns(['image_stock', 'action'])
            ->editColumn('image_stock', function ($datatable) {
                return "<img src='".asset('storage').'/'.$datatable->image_stock."' alt='$datatable->name_stock' style='max-height: 80px;' />";
            })
            ->editColumn('qty_stock', function ($datatable) {
                if ($datatable->type_stock == 2) {
                    $splitStock = $datatable->split($datatable->unit_id)->first();
                    return (int) $splitStock->stocks('stock_original_uuid')->first()->qty_stock * (int) $splitStock->qty_stock_split;
                } else {
                    return $datatable->qty_stock;
                }
            })
            ->editColumn('unit_id', function ($datatable) {
                return $datatable->unit()->first()->name;
            })
            ->editColumn('user_uuid', function ($datatable) {
                return $datatable->user()->first() != null ? $datatable->user()->first()->name : '-';
            })
            ->editColumn('type_stock', function ($datatable) {
                switch ($datatable->type_stock) {
                    case '0':
                        return 'component';
                        break;
                    case '1':
                        return 'Etc';
                        break;
                    case '2':
                        return 'Split';
                        break;
                    default:
                        return '-';
                        break;
                }
            })
            ->addColumn('action', function ($datatable) {
                $html  = "";
                $html .= "<a href='".route('bungadavi.stocks.edit', ['stock' => $datatable->uuid])."' class='text-success m-1'><span class='fa fa-edit'></span></a>";
                $html .= "<a href='".route('bungadavi.stocks.show', ['stock' => $datatable->uuid])."' class='text-primary m-1'><span class='fa fa-eye'></span></a>";
                $html .= "<a class='text-danger m-1' onclick='delete_ajax(".$datatable->uuid.")'><span class='fa fa-trash'></span></a>";
                return $html;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Product/Stock $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Stock $model)
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
            Column::make('type_stock')
                ->title('Type'),
            Column::make('name_stock')
                ->title('Name'),
            Column::make('qty_stock')
                ->title('Qty')
                ->class('text-center'),
            Column::make('unit_id')
                ->title('Unit')
                ->class('text-center'),
            Column::make('image_stock')
                ->title('Image')
                ->class('text-center'),
            Column::make('user_uuid')
                ->title('Created By')
                ->class('text-center'),
            Column::make('created_at')
                ->title('Created At')
                ->class('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Product/Stock_' . date('YmdHis');
    }
}
