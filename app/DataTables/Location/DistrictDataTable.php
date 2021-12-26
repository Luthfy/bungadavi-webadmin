<?php

namespace App\DataTables\Location;

use App\Models\Location\District;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class DistrictDataTable extends DataTable
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
            ->editColumn('province_id', function ($data){
                return $data->province()->first()->name;
                })
            ->editColumn('city_id', function ($data){
                return $data->city()->first()->name;
                })
            ->addColumn('action', function ($datatable) {
                $html  = "";
                $html .= "<a href='".route('bungadavi.district.edit', ['district' => $datatable->id])."' class='text-success m-1'><span class='fa fa-edit'></span></a>";
                $html .= "<a class='text-danger m-1' onclick='delete_ajax(\"".$datatable->id."\")'><span class='fa fa-trash'></span></a>";
                return $html;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\District $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(District $model)
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
            Column::make('country_id')->title('Country'),
            Column::make('province_id')->title('Province'),
            Column::make('city_id')->title('City'),
            Column::make('name'),
            Column::make('jne_code'),
            Column::make('sicepat_code'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Location/District_' . date('YmdHis');
    }
}
