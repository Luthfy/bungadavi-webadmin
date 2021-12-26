<?php

namespace App\DataTables\BasicSetting;

use App\Models\BasicSetting\OurBank;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OurBankDataTable extends DataTable
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
        ->rawColumns(['bank_logo','action'])
        ->editColumn('bank_logo', function ($data){
            return "<img src='".asset('storage/'.$data->bank_logo)."' alt='".$data->bank_logo."' style='max-width:100px' />";
            })
        ->editColumn('type', function ($data){
            return $data->type != 1 ? 'CV':'PT';
            })
        ->addColumn('action', function ($datatable) {
            $html  = "";
            $html .= "<a href='".route('bungadavi.ourbank.edit', ['ourbank' => $datatable->id])."' class='text-success m-1'><span class='fa fa-edit'></span></a>";
            $html .= "<a class='text-danger m-1' onclick='delete_ajax(\"".$datatable->id."\")'><span class='fa fa-trash'></span></a>";
            return $html;
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BasicSetting/OurBank $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(OurBank $model)
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
            Column::make('type'),
            Column::make('bank_name'),
            Column::make('bank_account_number'),
            Column::make('bank_beneficiary_name'),
            Column::make('bank_code'),
            Column::make('bank_logo'),
            Column::make('bank_branch'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'BasicSetting/OurBank_' . date('YmdHis');
    }
}
