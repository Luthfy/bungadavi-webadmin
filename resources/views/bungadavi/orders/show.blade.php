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
                            <h4 class="mb-0">Detail Transaction</h4>
                            <hr>
                        </div>
                        {{-- SENDER RECIPIENT SECTION --}}
                        <div class="row pb-4 mb-4">
                            <div class="col-6">
                                <h4 class="h5">SENDER</h4>
                                <hr>
                                <table class='table'>
                                    <tr>
                                        <td>Sender Name</td>
                                        <td>:</td>
                                        <td>{{$sender->sender_name}}</td>
                                    </tr>

                                    <tr>
                                        <td>Sender Address</td>
                                        <td>:</td>
                                        <td>{{$sender->sender_address}}</td>
                                    </tr>

                                    <tr>
                                        <td>Sender Phone</td>
                                        <td>:</td>
                                        <td>{{$sender->sender_phone_number}}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-6">
                                <h4 class="h5">RECIPIENT</h4>
                                <hr>
                                <table class='table'>
                                    <tr>
                                        <td>Recipient Name</td>
                                        <td>:</td>
                                        <td>{{$sender->receiver_name}}</td>
                                    </tr>

                                    <tr>
                                        <td>Recipient Address</td>
                                        <td>:</td>
                                        <td>{{$sender->receiver_address}}</td>
                                    </tr>

                                    <tr>
                                        <td>Recipient Phone</td>
                                        <td>:</td>
                                        <td>{{$sender->receiver_phone_number}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        {{-- END SENDER RECIPIENT SECTION --}}

                        {{-- PRODUCT ORDER --}}
                        <div class="row pb-4 mb-4">
                            <div class="col-12">
                                <h4 class="h5">PRODUCT LIST</h4>
                                <hr>
                                <table class='table'>
                                    <center><img src="{{ asset('storage/'.$data_product->image_product) }}" height="200px" width="250" style="margin-bottom: 2rem"></center>
                                    <tr>
                                        <td>Code Product</td>
                                        <td>:</td>
                                        <td>{{$list_product->code_product}}</td>
                                    </tr>

                                    <tr>
                                        <td>Name Product</td>
                                        <td>:</td>
                                        <td>{{$list_product->name_product}}</td>
                                    </tr>

                                    <tr>
                                        <td>Qty</td>
                                        <td>:</td>
                                        <td>{{$list_product->qty_product}}</td>
                                    </tr>

                                    <tr>
                                        <td>Cost Price</td>
                                        <td>:</td>
                                        <td>{{$list_product->price_product}}</td>
                                    </tr>

                                    <tr>
                                        <td>Cost Selling Price</td>
                                        <td>:</td>
                                        <td>{{$data_product->selling_price_product}}</td>
                                    </tr>

                                    <tr>
                                        <td>Product Remark</td>
                                        <td>:</td>
                                        <td>{{$list_product->remarks_product}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        {{-- END PRODUCT ORDER --}}

                        {{-- CARD MESSAGE --}}
                        <div class="row pb-4">
                            <div class="col-12">
                                <h4 class="h5">CARD MESSAGE</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>From</label>
                                            <div>{{$data->from_message_order}}</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>To</label>
                                            <div>{{$data->to_message_order}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputCardMessageCategory">Card Message Category</label>
                                            <div>{{$data->card_message_category}}</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputCardMessageSubCategory">Card Message Sub Category</label>
                                            <div>{{$data->card_message_subcategory}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="inputDeliveryDate">Card Message</label>
                                            <div>{{$data->card_message_message}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- END CARD MESSAGE--}}

                        {{-- DELIVERY DETAIL--}}
                        <div class="row pb-4">
                            <div class="col-12">
                                <h4 class="h5">DELIVERY DETAILS</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputDeliveryDate">Delivery Date</label>
                                            <div>{{$delivery->delivery_date}}</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputDeliveryDate">Delivery Timeslot</label>
                                            <div>{{$delivery->time_slot_name}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputDeliveryDate">Delivery Charge</label>
                                            <div>{{$delivery->delivery_charge}}</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputDeliveryDate">Delivery Charge Timeslot</label>
                                            <div>{{$delivery->time_slot_charge}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-12">
                                        <label>Delivery Remarks</label>
                                        <div class="form-group">
                                            <div>{{$delivery->delivery_remarks}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="inputDeliveryDate">Internal Notes</label>
                                            <div>{{$delivery->internal_notes}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- END DELIVERY DETAIL--}}

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Transaction Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <strong>Product Price</strong>
                                </div>
                                <div class="form-group">
                                    <strong>Delivery Charge</strong>
                                </div>
                                <div class="form-group">
                                    <strong>Timeslot Charge</strong>
                                </div>
                                <div class="form-group">
                                    <strong>Total Price</strong>
                                    <br>
                                    <div>{{$data->total_order_transaction}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h4 class="mb-0">Select Payment</h4>
                                <div>{!!$payment->data_payment_order!!}</div>
                            </div>
                        </div>
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


