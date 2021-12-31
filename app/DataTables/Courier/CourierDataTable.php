<?php

namespace App\DataTables\Courier;

use App\Models\Courier\Courier;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CourierDataTable extends DataTable
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
                $html  = "";
                $html .= "<a href='".route('bungadavi.courier.edit', ['courier' => $datatable->uuid])."' class='text-success m-1'><span class='fa fa-edit'></span></a>";
                $html .= "<a href='".route('bungadavi.courier.show', ['courier' => $datatable->uuid])."' class='text-primary m-1'><span class='fa fa-eye'></span></a>";
                $html .= "<a class='text-danger m-1' onclick='delete_ajax(\"".$datatable->uuid."\")'><span class='fa fa-trash'></span></a>";
                return $html;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Courier $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Courier $model)
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
            Column::make('fullname'),
            Column::make('email'),
            Column::make('mobile'),
            Column::make('username'),
            Column::make('join_date'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Courier_' . date('YmdHis');
    }
}
