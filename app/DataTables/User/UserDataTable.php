<?php

namespace App\DataTables\User;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
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
                if (auth()->user()->hasRole('bungadavi')) {
                    $html .= "<a href='".route('bungadavi.users.edit', ['user' => $datatable->uuid])."' class='text-success m-1'><span class='fa fa-edit'></span></a>";
                    // $html .= "<a href='".route('bungadavi.floristadmin.show', ['floristadmin' => $datatable->uuid])."' class='text-primary m-1'><span class='fa fa-eye'></span></a>";
                    $html .= "<a class='text-danger m-1' onclick='delete_ajax(\"".$datatable->uuid."\")'><span class='fa fa-trash'></span></a>";
                }
                return $html;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User/User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        if (auth()->user()->hasRole('bungadavi')) {
            return $model->where('user_type', 'bungadavi')->newQuery();
        } elseif (auth()->user()->hasRole('affiliate')) {
            return $model->where('user_type', 'affiliate')->where('customer_uuid', auth()->user()->customer_uuid)->newQuery();
        } elseif (auth()->user()->hasRole('corporate')) {
            return $model->where('user_type', 'corporate')->where('customer_uuid', auth()->user()->customer_uuid)->newQuery();
        } else {
            return null;
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
            Column::make('name'),
            Column::make('username'),
            Column::make('email'),
            Column::make('position')
                ->title('Group'),
            Column::make('user_type')
                ->title('Access'),
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
        return 'User/User_' . date('YmdHis');
    }
}
