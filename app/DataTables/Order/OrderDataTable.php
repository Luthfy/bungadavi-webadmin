<?php

namespace App\DataTables\Order;

use App\Models\Transaction\Order;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends DataTable
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
            ->rawColumns(['florist_uuid', 'action'])
            ->addColumn('action', function ($datatable) {
                $html  = "";
                if (auth()->user()->hasRole('bungadavi')) {
                    $html .= "<a href='".route('bungadavi.orders.edit', ['transaction' => $datatable->uuid])."' class='text-success m-1'><span class='fa fa-edit'></span></a>";
                    $html .= "<a href='".route('bungadavi.orders.show', ['transaction' => $datatable->uuid])."' class='text-primary m-1'><span class='fa fa-eye'></span></a>";
                } else if(auth()->user()->hasRole('corporate')){
                    $html .= "<a href='".route('corporate.orders.show', ['transaction' => $datatable->uuid])."' class='text-primary m-1'><span class='fa fa-eye'></span></a>";
                } else {
                    $html .= "<a href='".route('affiliate.orders.show', ['transaction' => $datatable->uuid])."' class='text-primary m-1'><span class='fa fa-eye'></span></a>";
                }
                return $html;
            })
            ->editColumn('florist_uuid', function ($datatable) {
                $button = '<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModalAssignFlorist" data-uuid="'.$datatable->uuid.'" data-codeproduct="'.$datatable->code_order_transaction.'">Assign To Florist</button>';
                return ($datatable->florist_uuid == null) ? $button : $datatable->florist_uuid ;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Order/Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
    {
        if (auth()->user()->hasRole('bungadavi')) {
            return $model->newQuery();
        } else {
            return $model->where('florist_uuid', auth()->user()->customer_uuid)->newQuery();
        }
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
            Column::make('code_order_transaction')
                ->title('Transaction Code'),
            Column::make('status_order_transaction')
                ->title('Status'),
            Column::make('florist_uuid')
                ->title('Florist Name'),
            Column::make('total_order_transaction')
                ->title('Client Name'),
            Column::make('total_order_transaction')
                ->title('PIC Name'),
            Column::make('total_order_transaction')
                ->title('PIC Name'),
            Column::make('total_order_transaction')
                ->title('PIC Name'),
            Column::make('total_order_transaction')
                ->title('PIC Name'),
            Column::make('total_order_transaction')
                ->title('PIC Name'),
            Column::make('total_order_transaction')
                ->title('PIC Name'),
            Column::make('total_order_transaction')
                ->title('PIC Name'),
            Column::make('total_order_transaction')
                ->title('PIC Name'),
            Column::make('total_order_transaction')
                ->title('PIC Name'),
            Column::make('total_order_transaction')
                ->title('PIC Name'),
            Column::make('total_order_transaction')
                ->title('PIC Name'),
            Column::make('total_order_transaction')
                ->title('PIC Name'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Order_' . date('YmdHis');
    }
}
