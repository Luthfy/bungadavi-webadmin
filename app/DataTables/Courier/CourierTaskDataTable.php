<?php

namespace App\DataTables\Courier;

use App\Models\Courier\CourierTask;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CourierTaskDataTable extends DataTable
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
            ->rawColumns(['status_assignment', 'action'])
            ->addColumn('code_order_transaction', function ($datatable) {
                return $datatable->order()->first()->code_order_transaction ?? '-';
            })
            ->addColumn('village_id', function ($datatable) {
                return $datatable->user()->first()->village_id ?? '-';
            })
            ->addColumn('delivery_date', function ($datatable) {
                return $datatable->delivery()->first()->delivery_date ?? '-';
            })
            ->addColumn('time_slot_name', function ($datatable) {
                return $datatable->delivery()->first()->time_slot_name ?? '-';
            })
            ->addColumn('fullname', function ($datatable) {
                return $datatable->courier()->first()->fullname ?? '-';
            })
            ->addColumn('status_order_transaction', function ($datatable) {
                return $datatable->order()->first()->status_order_transaction ?? '-';
            })
            ->addColumn('action', function ($datatable) {
                $html  = "";
                $html .= "<a href='".route('bungadavi.couriertask.show', ['couriertask' => $datatable->uuid])."' class='text-primary m-1'><span class='fa fa-eye'></span></a>";
                return $html;
            })
            ->editColumn('status_assignment', function ($datatable) {
                $button = '<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModalAssignCourier" data-uuid="'.$datatable->uuid.'" data-code-product="'.$datatable->code_product.'">Assign Courier</button>';
                return ($datatable->courier_uuid == null) ? $button : $datatable->courier_uuid ;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Courier/CourierTask $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(CourierTask $model)
    {
        if (auth()->user()->hasRole('bungadavi')) {
            return $model->newQuery();
        } else {
            // return $model->where('florist_uuid', auth()->user()->customer_uuid)->newQuery();
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
                ->title('DO Number'),
            Column::make('village_id')
                ->title('Village'),
            Column::make('delivery_date')
                ->title('Delivery Date'),
            Column::make('time_slot_name')
                ->title('Time Slot'),
            Column::make('fullname')
                ->title('Courier Name'),
            Column::make('status_assignment')
                ->title('Status Assign'),
            Column::make('status_order_transaction')
                ->title('Status Order'),
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
        return 'Courier/CourierTask_' . date('YmdHis');
    }
}
