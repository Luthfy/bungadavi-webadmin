<?php

namespace App\DataTables\Order;

use App\Models\Transaction\Order;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class NewOrderDataTable extends DataTable
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
            ->rawColumns(['florist_uuid', 'action', 'status_order_transaction', 'pic_name', 'sender_info', 'recipient_info', 'delivery_info', 'code_order_transaction'])
            ->addColumn('action', function ($datatable) {
                $html  = "";
                if (auth()->user()->hasRole('bungadavi')) {
                    $html .= "<a href='".route('bungadavi.orders.edit', ['transaction' => $datatable->uuid])."' class='text-success m-1'><span class='fa fa-edit'></span></a>";
                    $html .= "<a href='".route('bungadavi.orders.show', ['transaction' => $datatable->uuid])."' class='text-primary m-1'><span class='fa fa-eye'></span></a>";
                } else if(auth()->user()->hasRole('corporate')){
                    $html .= "<a href='".route('corporate.orders.show', ['transaction' => $datatable->uuid])."' class='text-primary m-1'><span class='fa fa-eye'></span></a>";
                } else {
                    $html .= "<a href='".route('affiliate.orders.show', ['transaction' => $datatable->uuid])."' class='text-primary m-1'><span class='fa fa-eye'></span></a>";
                }
                $html .= "<a href='".route('affiliate.orders.show', ['transaction' => $datatable->uuid])."' class='text-primary m-1'><span class='fa fa-print'></span></a>";

                return $html;
            })
            ->editColumn('code_order_transaction', function ($datatable) {
                return $datatable->code_order_transaction . "<br />" . $datatable->created_at;
            })
            ->editColumn('status_order_transaction', function ($datatable) {
                $button = "";
                if ($datatable->florist_uuid != null) {
                    if ($datatable->status_order_transaction == 'NEEDED CONFIRMATION') {
                        $button = '<button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#updateStatusOrder" data-uuid="'.$datatable->uuid.'" data-codeproduct="'.$datatable->code_order_transaction.'">'.$datatable->status_order_transaction.'</button>';
                    } else {
                        $button = $datatable->status_order_transaction;
                    }
                } else {
                    $button = $datatable->status_order_transaction;
                }


                return $button;
            })
            ->editColumn('pic_name', function ($datatable) {
                $text  = "";
                // $text .= $datatable->sender_receiver()->first()->po_reference ?? '';
                // $text .= "<br />";
                $text .= $datatable->sender_receiver()->first()->pic_name ?? '';
                return $text;
            })
            ->editColumn('po_referrence', function ($datatable) {
                return $datatable->sender_receiver()->first()->po_referrence ?? '-';
            })
            ->addColumn('sender_info', function ($datatable) {
                $text  = $datatable->sender_receiver()->first()->sender_name ?? '';
                $text .= "<br />";
                $text .= $datatable->sender_receiver()->first()->sender_phone_number != null ? "(" .$datatable->sender_receiver()->first()->sender_phone_number . ")" : '';
                return $text;
            })
            ->addColumn('recipient_info', function ($datatable) {
                $text  = $datatable->sender_receiver()->first()->receiver_name ?? '';
                $text .= "<br />";
                $text .= $datatable->sender_receiver()->first()->receiver_phone_number  != null ? "(". $datatable->sender_receiver()->first()->receiver_phone_number . ")": '';
                return $text;
            })
            ->addColumn('delivery_info', function ($datatable) {
                $text  = $datatable->delivery_schedule()->first()->delivery_date ?? '';
                $text .= "<br />";
                $text .= $datatable->delivery_schedule()->first()->time_slot_name ?? '';
                return $text;
            })
            ->editColumn('delivery_remarks', function ($datatable) {
                return $datatable->delivery_schedule()->first()->delivery_remarks ?? '-';
            })
            ->editColumn('florist_uuid', function ($datatable) {
                if (auth()->user()->hasRole('bungadavi')) {
                    $button = '<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModalAssignFlorist" data-uuid="'.$datatable->uuid.'" data-codeproduct="'.$datatable->code_order_transaction.'">Assign To Florist</button>';
                    return ($datatable->florist_uuid == null) ? $button : $datatable->floristName() ;
                } elseif (auth()->user()->hasRole('affiliate')) {
                    return $datatable->floristName();
                } else {
                    // $button = '<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModalAssignFlorist" data-uuid="'.$datatable->uuid.'" data-codeproduct="'.$datatable->code_order_transaction.'">Assign To Florist</button>';
                    // return ($datatable->florist_uuid == null) ? $button : "-" ;
                }
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Order/Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
    {
        if (auth()->user()->hasRole('bungadavi')) {
            return $model->orderBy('created_at', 'desc')->where('status_order_transaction', "New Order")->orWhere('status_order_transaction', "NEEDED CONFIRMATION")->orWhere('status_order_transaction', "Reject Florist")->newQuery();
        } else {
            return $model->orderBy('created_at', 'desc')->where('florist_uuid', auth()->user()->customer_uuid)->orWhere('status_order_transaction', "New Order")->orWhere('status_order_transaction', "NEEDED CONFIRMATION")->orWhere('status_order_transaction', "Reject Florist")->newQuery();
        }
    }

    public function ajax()
    {
        return datatables()
            ->eloquent($this->query(new Order()))
            ->rawColumns(['florist_uuid', 'action', 'status_order_transaction', 'pic_name', 'sender_info', 'recipient_info', 'delivery_info', 'code_order_transaction'])
            ->addColumn('action', function ($datatable) {
                $html  = "";
                if (auth()->user()->hasRole('bungadavi')) {
                    $html .= "<a href='".route('bungadavi.orders.edit', ['transaction' => $datatable->uuid])."' class='text-success m-1'><span class='fa fa-edit'></span></a>";
                    $html .= "<a href='".route('bungadavi.orders.show', ['transaction' => $datatable->uuid])."' class='text-primary m-1'><span class='fa fa-eye'></span></a>";
                    $html .= "<a href='".route('bungadavi.orders.update_delivered', ['transaction' => $datatable->uuid])."' class='text-info m-1' id='deliveredOrder'><span class='fa fa-check'></span></a>";
                    $html .= "<a href='".route('bungadavi.orders.print_do', ['transaction' => $datatable->uuid])."' class='badge badge-success m-1' target='_blank'><span class='fa fa-print'></span> Print DO</a>";
                    $html .= "<a href='".route('bungadavi.orders.print_card_message', ['transaction' => $datatable->uuid])."' class='badge badge-info m-1' target='_blank'><span class='fa fa-print'></span> Print Card Message</a>";
                    $html .= "<a href='".route('bungadavi.orders.print_invoice', ['transaction' => $datatable->uuid])."' class='badge badge-secondary m-1' target='_blank'><span class='fa fa-print'></span> Print Invoice</a>";
                } else if(auth()->user()->hasRole('corporate')){
                    $html .= "<a href='".route('corporate.orders.show', ['transaction' => $datatable->uuid])."' class='text-primary m-1'><span class='fa fa-eye'></span></a>";
                } else {
                    $html .= "<a href='".route('affiliate.orders.show', ['transaction' => $datatable->uuid])."' class='text-primary m-1'><span class='fa fa-eye'></span></a>";
                }
                return $html;
            })
            ->editColumn('code_order_transaction', function ($datatable) {
                return $datatable->code_order_transaction . "<br />" . $datatable->created_at;
            })
            ->editColumn('status_order_transaction', function ($datatable) {
                $button = "";
                if ($datatable->florist_uuid != null) {
                    if ($datatable->status_order_transaction == 'NEEDED CONFIRMATION') {
                        $button = '<button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#updateStatusOrder" data-uuid="'.$datatable->uuid.'" data-codeproduct="'.$datatable->code_order_transaction.'">'.$datatable->status_order_transaction.'</button>';
                    } else {
                        $button = $datatable->status_order_transaction;
                    }
                } else {
                    $button = $datatable->status_order_transaction;
                }


                return $button;
            })
            ->editColumn('pic_name', function ($datatable) {
                $text  = "";
                // $text .= $datatable->sender_receiver()->first()->po_reference ?? '';
                // $text .= "<br />";
                $text .= $datatable->sender_receiver()->first()->pic_name ?? '';
                return $text;
            })
            ->editColumn('po_referrence', function ($datatable) {
                return $datatable->sender_receiver()->first()->po_referrence ?? '-';
            })
            ->addColumn('sender_info', function ($datatable) {
                $text  = $datatable->sender_receiver()->first()->sender_name ?? '';
                $text .= "<br />";
                $text .= $datatable->sender_receiver()->first()->sender_phone_number != null ? "(" .$datatable->sender_receiver()->first()->sender_phone_number . ")" : '';
                return $text;
            })
            ->addColumn('recipient_info', function ($datatable) {
                $text  = $datatable->sender_receiver()->first()->receiver_name ?? '';
                $text .= "<br />";
                $text .= $datatable->sender_receiver()->first()->receiver_phone_number  != null ? "(". $datatable->sender_receiver()->first()->receiver_phone_number . ")": '';
                return $text;
            })
            ->addColumn('delivery_info', function ($datatable) {
                $text  = $datatable->delivery_schedule()->first()->delivery_date ?? '';
                $text .= "<br />";
                $text .= $datatable->delivery_schedule()->first()->time_slot_name ?? '';
                return $text;
            })
            ->editColumn('delivery_remarks', function ($datatable) {
                return $datatable->delivery_schedule()->first()->delivery_remarks ?? '-';
            })
            ->editColumn('florist_uuid', function ($datatable) {
                if (auth()->user()->hasRole('bungadavi')) {
                    $button = '<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModalAssignFlorist" data-uuid="'.$datatable->uuid.'" data-codeproduct="'.$datatable->code_order_transaction.'">Assign To Florist</button>';
                    return ($datatable->florist_uuid == null) ? $button : $datatable->floristName() ;
                } elseif (auth()->user()->hasRole('affiliate')) {
                    return $datatable->floristName();
                } else {
                    // $button = '<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModalAssignFlorist" data-uuid="'.$datatable->uuid.'" data-codeproduct="'.$datatable->code_order_transaction.'">Assign To Florist</button>';
                    // return ($datatable->florist_uuid == null) ? $button : "-" ;
                }
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
                    ->orderBy(1)
                    ->parameters([
                        "initComplete" => "function () {

                            this.api().columns().every(function () {
                                var column = this;
                                var input = document.createElement(\"input\");
                                $(input).appendTo($(column.footer()).empty())
                                .on('change', function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                            });
                        }",
                    ]);
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
            Column::make('code_order_transaction')
                ->title('Transaction Code'),
            Column::make('status_order_transaction')
                ->title('Status'),
            Column::make('florist_uuid')
                ->title('Florist Name'),
            Column::make('pic_name')
                ->title('Client Info'),
            Column::make('po_referrence')
                ->title('PO Reference'),
            Column::make('sender_info')
                ->title('Sender Info'),
            Column::make('recipient_info')
                ->title('Recipient Info'),
            Column::make('delivery_info')
                ->title('Delivery Info'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Order_' . date('YmdHis');
    }
}
