<?php

namespace App\DataTables\Product;

use App\Models\Product\Product;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
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
            ->rawColumns(['image_main_product', 'action'])
            ->editColumn('image_main_product', function ($datatable) {
                return "<img src='".asset('storage').'/'.$datatable->image_main_product."' alt='".$datatable->code_product."' style='max-height:100px;'/>";
            })
            ->editColumn('status_product', function ($datatable) {
                switch ($datatable->status_product) {
                    case '0':
                        return  "Reguler";
                        break;
                    case '1':
                        return "New";
                        break;
                    case '2':
                        return "Most Wanted";
                        break;
                    default:
                        return "-";
                        break;
                }
            })
            ->editColumn('user_uuid', function ($datatable) {
                return $datatable->user()->first() == null ? null : $datatable->user()->first()->name;
            })
            ->addColumn('action', function ($datatable) {
                $html  = "";
                $html .= "<a href='".route('bungadavi.products.edit', ['product' => $datatable->uuid])."' class='text-success m-1'><span class='fa fa-edit'></span></a>";
                $html .= "<a href='".route('bungadavi.products.show', ['product' => $datatable->uuid])."' class='text-primary m-1'><span class='fa fa-eye'></span></a>";
                $html .= "<a class='text-danger m-1' onclick='delete_ajax(\"".$datatable->uuid."\")'><span class='fa fa-trash'></span></a>";
                return $html;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Product/Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model)
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
            Column::make('code_product')
                ->title('Code'),
            Column::make('name_product')
                ->title('Product'),
            Column::make('image_main_product')
                ->title('Image'),
            Column::make('status_product')
                ->title('Type'),
            Column::make('is_active')
                ->title('status'),
            Column::make('user_uuid')
                ->title('User Created'),
            Column::make('created_at')
                ->title('Created Date')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Product/Product_' . date('YmdHis');
    }
}
