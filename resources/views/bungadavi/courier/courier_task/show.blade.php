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
                                            <div>{{$product->code_product ?? '-'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Name Product</label>
                                            <div>{{$product->name_product ?? '-'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Product Remarks</label>
                                            <div>{{$product->remarks_product ?? '-'}}</div>
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
                                            <div>{{$orders->from_message_order ?? '-'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>To</label>
                                            <div>{{$orders->to_message_order ?? '-'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Message</label>
                                            <div>{{$orders->card_message_message ?? '-'}}</div>
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
                                            <div>{{$orders->code_currency ?? '-'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <div>{{$product->qty_product ?? '-'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <div>{{$product->price_product ?? '-'}}</div>
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
                                            <div>{{$delivery_schedule->delivery_charge ?? '-'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Delivery Time Charge</label>
                                            <div>{{$delivery_schedule->time_slot_charge ?? '-'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label style="font-weight: bold">Total Price</label>
                                            <div>{{$orders->total_order_transaction ?? '-'}}</div>
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
                                            <label>Number</label>
                                            <div>-</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Recipient Name</label>
                                            <div>{{$receiver->receiver_name ?? '-'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Recipient Address</label>
                                            <div>{{$receiver->receiver_address ?? '-'}}</div>
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
                                            <div>{{$receiver->receiver_latitude}},{{$receiver->receiver_longitude}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Recipient Phone Number</label>
                                            <div>{{$receiver->receiver_phone_number ?? '-'}}</div>
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
                                            <div>{{$delivery_schedule->delivery_remarks ?? '-'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Internal Notes</label>
                                            <div>{{$delivery_schedule->internal_notes ?? '-'}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- END RECIPIENT DETAIL --}}
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('bungadavi.couriertask.index') }}" class="btn btn-secondary">Back</a>
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


