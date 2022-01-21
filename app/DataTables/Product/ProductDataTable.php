<?php

namespace App\DataTables\Product;

use App\Models\Product\Product;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Collective\Html\FormFacade as Form;

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
            ->rawColumns(['image_main_product', 'action', 'code_product', 'selling_price_product'])
            ->editColumn('image_main_product', function ($datatable) {
                return "<img src='".asset('storage').'/'.$datatable->image_main_product."' alt='".$datatable->code_product."' style='max-height:100px;'/>";
            })
            ->editColumn('code_product', function ($datatable) {
                switch ($datatable->status_product) {
                    case '0':
                        $type = "Reguler";
                        break;
                    case '1':
                        $type = "New";
                        break;
                    case '2':
                        $type = "Most Wanted";
                        break;
                    default:
                        $type = "-";
                        break;
                }
                return $datatable->code_product . "<br>" . $datatable->name_product . '<br>' . $type;
            })
            ->editColumn('selling_price_product', function ($datatable) {
                return $datatable->selling_price_product . "<br>" . $datatable->cost_product;
            })
            ->addColumn('action', function ($datatable) {
                $html  = "";
                // $html .= "<a href='".route('bungadavi.products.edit', ['product' => $datatable->uuid])."' class='text-success m-1'><span class='fa fa-edit'></span></a>";
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

    public function ajax()
    {
        return datatables()
            ->eloquent($this->query(new Product()))
            ->rawColumns(['image_main_product', 'action', 'code_product', 'selling_price_product'])
            ->editColumn('image_main_product', function ($datatable) {
                return "<img src='".asset('storage').'/'.$datatable->image_main_product."' alt='".$datatable->code_product."' style='max-height:100px;'/>";
            })
            ->editColumn('code_product', function ($datatable) {
                switch ($datatable->status_product) {
                    case '0':
                        $type = "Reguler";
                        break;
                    case '1':
                        $type = "New";
                        break;
                    case '2':
                        $type = "Most Wanted";
                        break;
                    default:
                        $type = "-";
                        break;
                }
                return $datatable->code_product . "<br>" . $datatable->name_product . '<br>' . $type;
            })
            ->editColumn('selling_price_product', function ($datatable) {
                return $datatable->selling_price_product . "<br>" . $datatable->cost_product;
            })
            ->addColumn('action', function ($datatable) {
                $html = Form::checkbox('product_checkbox[]', $datatable->uuid, null, ['id' => 'product_uuid']);

                // $html  = "";
                // // $html .= "<a href='".route('bungadavi.products.edit', ['product' => $datatable->uuid])."' class='text-success m-1'><span class='fa fa-edit'></span></a>";
                // $html .= "<a href='".route('bungadavi.products.show', ['product' => $datatable->uuid])."' class='text-primary m-1'><span class='fa fa-eye'></span></a>";
                // $html .= "<a class='text-danger m-1' onclick='delete_ajax(\"".$datatable->uuid."\")'><span class='fa fa-trash'></span></a>";
                return $html;
            })
        ->make(true);
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
                  ->addClass('text-center'),
            Column::make('image_main_product')
                ->title('Image'),
            Column::make('code_product')
                ->title('Product'),
            Column::make('selling_price_product')
                ->title('Price')
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
