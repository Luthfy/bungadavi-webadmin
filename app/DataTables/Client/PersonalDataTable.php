<?php

namespace App\DataTables\Client;

use App\Models\Client\Personal;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PersonalDataTable extends DataTable
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
            ->editColumn('country_id', function ($datatable) {
                return $datatable->country()->first()->name ?? '-';
            })
            ->editColumn('province_id', function ($datatable) {
                return $datatable->province()->first()->name ?? '-';
            })
            ->editColumn('city_id', function ($datatable) {
                return $datatable->city()->first()->name ?? '-';
            })
            ->editColumn('district_id', function ($datatable) {
                return $datatable->district()->first()->name ?? '-';
            })
            ->editColumn('village_id', function ($datatable) {
                return $datatable->village()->first()->name ?? '-';
            })
            ->editColumn('zipcode_id', function ($datatable) {
                return $datatable->zipcode()->first()->postal_code ?? '-';
            })
            ->addColumn('action', function ($datatable) {
                $html  = "";
                $html .= "<a href='".route('bungadavi.personal.edit', ['personal' => $datatable->uuid])."' class='text-success m-1'><span class='fa fa-edit'></span></a>";
                $html .= "<a href='".route('bungadavi.personal.show', ['personal' => $datatable->uuid])."' class='text-primary m-1'><span class='fa fa-eye'></span></a>";
                $html .= "<a class='text-danger m-1' onclick='delete_ajax(\"".$datatable->uuid."\")'><span class='fa fa-trash'></span></a>";
                return $html;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Client/Personal $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Personal $model)
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
                    ->setTableId('datatableserverside')
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
            Column::make('mobile'),
            Column::make('address'),
            Column::make('country_id')
                ->title('Country'),
            Column::make('province_id')
                ->title('Province'),
            Column::make('city_id')
                ->title('City'),
            Column::make('district_id')
                ->title('District'),
            Column::make('village_id')
                ->title('Village'),
            Column::make('zipcode_id')
                ->title('Zipcode'),
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
        return 'Client/Personal_' . date('YmdHis');
    }
}
