<?php

namespace App\DataTables\Client;

use App\Models\Client\PersonalRecipient;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PersonalRecipientDataTable extends DataTable
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
            ->editColumn('client_personal_uuid', function ($datatable) {
                return $datatable->clientPersonal()->first()->fullname ?? '-';
            })
            ->editColumn('city_id', function ($datatable) {
                return $datatable->city()->first()->name ?? '-';
            })
            ->editColumn('zipcode_id', function ($datatable) {
                return $datatable->zipcode()->first()->postal_code ?? '-';
            })
            ->addColumn('action', function ($datatable) {
                $html  = "";
                $html .= "<a href='".route('bungadavi.personalrecipient.edit', ['personalrecipient' => $datatable->uuid])."' class='text-success m-1'><span class='fa fa-edit'></span></a>";
                $html .= "<a href='".route('bungadavi.personalrecipient.show', ['personalrecipient' => $datatable->uuid])."' class='text-primary m-1'><span class='fa fa-eye'></span></a>";
                $html .= "<a class='text-danger m-1' onclick='delete_ajax(\"".$datatable->uuid."\")'><span class='fa fa-trash'></span></a>";
                return $html;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Client/PersonalRecipient $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PersonalRecipient $model)
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
            Column::make('client_personal_uuid')->title('Customer Name'),
            Column::make('address'),
            Column::make('firstname')->title('Recipient Name'),
            Column::make('email')->title('Recipient Email'),
            Column::make('mobile')->title('Recipient Mobile'),
            Column::make('city_id')
                ->title('City'),
            Column::make('zipcode_id')
                ->title('Zip Code'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Client/PersonalRecipient_' . date('YmdHis');
    }
}
