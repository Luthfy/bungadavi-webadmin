@extends('layouts.bungadavi')

@section('body')

    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Order Detail</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Bunga Davi</a></li>
                        <li class="breadcrumb-item">Order</li>
                        <li class="breadcrumb-item active">Order Detail</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <h4 class="mb-0">PRODUCT LIST</h4>
                            <hr>
                        </div>

                        {{-- PRODUCT --}}
                        <div class="row pb-4 mb-4">
                            <div class="col-12">
                                <center><img src="{{ asset('storage/'.$data_product->image_main_product) }}" height="200px" width="250" style="margin-bottom: 2rem"></center>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Code Product</label>
                                            <div>{{$list_product->code_product ?? '-'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Name Product</label>
                                            <div>{{$list_product->name_product ?? '-'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Product Remarks</label>
                                            <div>{{$list_product->remarks_product ?? '-'}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row pb-4 mb-4">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>From</label>
                                            <div>{{$data->from_message_order ?? '-'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>To</label>
                                            <div>{{$data->to_message_order ?? '-'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Message</label>
                                            <div>{{$data->card_message_message ?? '-'}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row pb-4 mb-4">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Currency</label>
                                            <div>{{$data->code_currency ?? '-'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <div>{{$list_product->qty_product ?? '-'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <div>{{$list_product->price_product ?? '-'}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row pb-4 mb-4">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Delivery Charge</label>
                                            <div>{{$delivery->delivery_charge ?? '-'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Delivery Time Charge</label>
                                            <div>{{$delivery->time_slot_charge ?? '-'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label style="font-weight: bold">Total Price</label>
                                            <div>{{$data->total_order_transaction+$data->shipping_price_order_transaction ?? '-'}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- END PRODUCT --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <h4 class="mb-0">RECIPIENT DETAIL</h4>
                            <hr>
                        </div>

                        {{-- RECIPIENT DETAIL --}}
                        <div class="row pb-4 mb-4">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Address Info</label>
                                            <div>{{$sender->receiver_address_info ?? '-'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Recipient Name</label>
                                            <div>{{$sender->receiver_name ?? '-'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Recipient Address</label>
                                            <div>{{$sender->receiver_address ?? '-'}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row pb-4 mb-4">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Province</label>
                                            <div>{{$province->name ?? '-'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Coordinate</label>
                                            <div>{{$sender->receiver_latitude }},{{$sender->receiver_longitude }}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Recipient Phone Number</label>
                                            <div>{{$sender->receiver_phone_number ?? '-'}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row pb-4 mb-4">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Delivery Remarks</label>
                                            <div>{{$delivery->delivery_remarks ?? '-'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Internal Notes</label>
                                            <div>{{$delivery->internal_notes ?? '-'}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- END RECIPIENT DETAIL --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <h4 class="mb-0">LIST ORDER INFORMATION SHIPPING</h4>
                            <hr>
                        </div>

                        {{-- LIST ORDER --}}
                        <div class="row pb-4 mb-4">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Transaction Code Detail</label>
                                            <div>{{$data->code_order_transaction ?? '-'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>DO Number</label>
                                            <div>{{$assign->delivery_number_assignment ?? '-'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Status DO</label>
                                            <div>{{$assign->status_assignment ?? '-'}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row pb-4 mb-4">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Delivery Date</label>
                                            <div>{{$delivery->delivery_date ?? '-'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Time Slot</label>
                                            <div>{{date('H:ia', strtotime($time_slot->time_from))}} - {{date('H:ia', strtotime($time_slot->time_from))}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Type DO</label>
                                            <div>{{$data->status_order_transaction ?? '-'}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row pb-4 mb-4">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Note</label>
                                            <div>{{$receipt->notes_receipt ?? '-'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Photo From Courier</label>
                                            @if ($receipt == null)
                                                <div>-</div>
                                            @else
                                                <div><img src="{{ asset('storage/'.$receipt->photo_delivery_receipt) }}" height="150px" width="150" style="margin-bottom: 2rem"></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row pb-4 mb-4">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Created Date</label>
                                            <div>{{date('d M Y H:i:sa', strtotime($data->created_at))}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Updated Date</label>
                                            <div>{{date('d M Y H:i:sa', strtotime($data->updated_at))}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- END LIST ORDER --}}
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('bungadavi.orders.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>

@endsection
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@push('js')
@endpush


