<?php

namespace App\DataTables\BasicSetting;

use App\Models\BasicSetting\SubCategory;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SubCategoryDataTable extends DataTable
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
            ->rawColumns(['photo','action'])
            ->editColumn('photo', function ($data){
                return "<img src='".asset('storage/'.$data->photo)."' alt='".$data->photo."' style='max-width:60px' />";
                })
            ->editColumn('category_id', function ($data){
                return $data->category()->first()->name;
                })
            ->editColumn('is_active', function ($data){
                return $data->is_active != 1 ? 'No':'Yes';
                })
            ->addColumn('action', function ($datatable) {
                $html  = "";
                $html .= "<a href='".route('bungadavi.category.edit', ['category' => $datatable->id])."' class='text-success m-1'><span class='fa fa-edit'></span></a>";
                $html .= "<a class='text-danger m-1' onclick='delete_ajax(\"".$datatable->id."\")'><span class='fa fa-trash'></span></a>";
                return $html;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BasicSetting/SubCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SubCategory $model)
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
            Column::make('category_id')->title('Category'),
            Column::make('name'),
            Column::make('name_en'),
            Column::make('priority'),
            Column::make('photo'),
            Column::make('is_active'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'BasicSetting/SubCategory_' . date('YmdHis');
    }
}
