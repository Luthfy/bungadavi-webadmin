<?php

namespace App\DataTables\Client;

use App\Models\Client\CorporateAdmin;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Models\User;

class CorporateAdminDataTable extends DataTable
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
            ->editColumn('customer_uuid', function ($datatable) {
                return $datatable->customer_admin()->first()->fullname ?? '-';
            })
            ->addColumn('action', function ($datatable) {
                $html  = "";
                if (auth()->user()->hasRole('bungadavi') || auth()->user()->hasRole('corporate')) {
                    $html .= "<a href='".route('bungadavi.corporateadmin.edit', ['corporateadmin' => $datatable->uuid])."' class='text-success m-1'><span class='fa fa-edit'></span></a>";
                    $html .= "<a class='text-danger m-1' onclick='delete_ajax(\"".$datatable->uuid."\")'><span class='fa fa-trash'></span></a>";
                }
                return $html;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Client/CorporateAdmin $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        if (auth()->user()->hasRole('bungadavi')) {
            return $model->where('user_type', 'corporate')->newQuery();
        } else {
            return $model->where('user_type', 'corporate')->where('customer_uuid', auth()->user()->customer_uuid)->newQuery();
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
                    ->setTableId('datatableserverside')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
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
            Column::make('name'),
            Column::make('email'),
            Column::make('phone'),
            Column::make('address'),
            Column::make('photo'),
            Column::make('position'),
            Column::make('user_type'),
            Column::make('customer_uuid')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Client/CorporateAdmin_' . date('YmdHis');
    }
}
