<?php

namespace App\DataTables\Location;

use App\Models\Location\Province;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProvinceDataTable extends DataTable
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
        ->editColumn('country_id', function ($data){
            return $data->country()->first()->name;
        })
        ->editColumn('city', function ($data){
            return ($data->hasCity()->count()) . ' City';
        })
        ->addColumn('action', function ($datatable) {
            $html  = "";
            $html .= "<a href='".route('bungadavi.province.edit', ['province' => $datatable->id])."' class='text-success m-1'><span class='fa fa-edit'></span></a>";
            $html .= "<a class='text-danger m-1' onclick='delete_ajax(\"".$datatable->id."\")'><span class='fa fa-trash'></span></a>";
            return $html;
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Province $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Province $model)
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
            Column::make('country_id')
                ->title('Country Name'),
            Column::make('name')
                ->title('Province Name'),
            Column::make('city')
                ->title('City')
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
        return 'Location/Province_' . date('YmdHis');
    }
}
