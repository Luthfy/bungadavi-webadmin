@extends('layouts.bungadavi')

@section('body')

    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Create New Order</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Bunga Davi</a></li>
                        <li class="breadcrumb-item">Order</li>
                        <li class="breadcrumb-item active">Create New Order</li>
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
                        <div class="row pb-4 mb-4">
                            <div class="col-6">
                                <h4 class="h5">SENDER</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-sm" class="btn btn-primary" data-toggle="modal" data-target="#addClientSender">Add Sender</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <h4 class="h5">RECEIVER</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addClientRecipient">Add Receiver</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pb-4 mb-4">
                            <div class="col-12">
                                <h4 class="h5">Product List</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addProductDetail">Add Product Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-12">
                                <h4 class="h5">DELIVERY DETAILS</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputDeliveryDate">Delivery Date</label>
                                            {!! Form::date('delivery_date', null, [ "class" => "form-control", "id" => "inputDeliveryDate", "aria-describedby" => "deliveryDateHelp"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputDeliveryDate">Delivery Timeslot</label>
                                            {!! Form::select('timeslot_id', [], null, [ "class" => "form-control", "id" => "selectTimeSlot", "aria-describedby" => "timeslotHelp"]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputDeliveryDate">Delivery Charge</label>
                                            {!! Form::date('delivery_charge', null, [ "class" => "form-control", "id" => "inputDeliveryCharge", "aria-describedby" => "deliveryChargeHelp"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputDeliveryDate">Delivery Charge Timeslot</label>
                                            {!! Form::number('delivery_charge_timeslot', null, [ "class" => "form-control", "id" => "inputDeliveryChargeTimeslot", "aria-describedby" => "deliveryChargeTimeslotHelp"]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <label>Delivery Remarks</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                              Default radio
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                            <label class="form-check-label" for="exampleRadios2">
                                              Second default radio
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" disabled>
                                            <label class="form-check-label" for="exampleRadios3">
                                              Disabled radio
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="inputDeliveryDate">Internal Notes</label>
                                            {!! Form::textarea('delivery_charge_timeslot', null, [ "class" => "form-control", "id" => "inputDeliveryChargeTimeslot", "aria-describedby" => "deliveryChargeTimeslotHelp"]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <div class="form-group">
                            <hr>

                        </div>
                        <a href="#" class="btn btn-info btn-sm">Select Payment</a>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('bungadavi.orders.index') }}" class="btn btn-secondary">Back</a>
                        {!! Form::reset('Reset', ['class' => 'btn btn-danger']) !!}
                        {!! Form::submit('Create Order', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
        </div>

        @include('bungadavi.orders.modal')

@endsection
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@push('js')

    {{-- @include('bungadavi.orders.form_js') --}}

    <script>
        var orderTransaction        = null;
        var senderRecipientOrder    = null;
        var listProductOrder        = null;
        var deliverySchedule        = null;
        var paymentOrder            = null;

        $(document).ready({
            $('input[type=radio][name=radioButtonClientType]').change(function() {
                if (this.value == 'clientPersonal') {
                    alert('personal')
                    // $('#picData').remove()
                    // $('#additionalForm').remove()
                    // $('#rowClient').after(`
                    //     <div id="additionalForm" class="col md-4">
                    //         <p>PO Reference</p>
                    //         <input text="" id="poReference" class="col md-4"></text>
                    //         <br>
                    //         <br>
                    //     </div>
                    // `)
                } else if (this.value == 'clientCorporate') {
                    alert('corporate')

                    // $('#poReference').after(`
                    //     <br>
                    //     <p>PIC</p>
                    //     <select id="picData" class="col md-4">
                    //         <option value="AL">Alabama</option>
                    //         <option value="WY">Wyoming</option>
                    //     </select>
                    // `)
                } else if (this.value == 'clientAffiliate') {
                    alert('affilaite')

                    // alert("tampilkan dropdown client affiliate");
                }
            });
        });

        function customerModal()
        {

        }

        function postOrder()
        {
            let data = {
                "_token"                : "{{ csrf_token() }}",
                "order_transaction"     : orderTransaction,
                "sender_recipient"      : senderRecipientOrder,
                "list_product_order"    : listProductOrder,
                "delivery_schedule"     : deliverySchedule,
                "payment_order"         : paymentOrder,
            };

            $.ajax({
                url: "{{ route('bungadavi.orders.store') }}",
                type: "post",
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                contentType: 'application/json',
                data: JSON.stringify(data),
                success: function (e) {
                    console.log(e)
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }

            })
        }

        function setOrderTransaction()
        {
            return {
                type_order_transaction : "backoffice_bungadavi",
                total_order_transaction : "",
                shipping_price_order_transaction : "",
                status_order_transaction : "",
                currency_id : "",
                is_guest : false,
            };
        }

        function setSenderRecipientOrder()
        {
            return {
                is_secret : false,
                client_type : "",
                client_uuid : "",
                pic_name : "",
                sender_name : "",
                po_referrence : "",
                sender_phone_number : "",
                sender_address : "",
                sender_country : "",
                sender_province : "",
                sender_city : "",
                sender_district : "",
                sender_village : "",
                sender_zipcode : "",
                receiver_name : "",
                receiver_phone_number : "",
                receiver_address : "",
                receiver_country : "",
                receiver_province : "",
                receiver_city : "",
                receiver_district : "",
                receiver_village : "",
                receiver_zipcode : "",
            };
        }

        function setListProductOrder()
        {
            return [
                {
                    product_uuid : "",
                    code_product : "",
                    name_product : "",
                    qty_product : "",
                    price_product : "",
                    from_message_product : "",
                    to_message_product : "",
                    card_message_category : "",
                    card_message_subcategory : "",
                    card_message_message : "",
                    remarks_product : "",
                }
            ];
        }

        function setDeliverySchedule()
        {
            return {
                time_slot_name : "",
                time_slot_id : "",
                delivery_remarks : "",
                time_slot_charge : 0,
                delivery_charge : 0,
                delivery_date : "",
            };
        }

        function setPaymentOrder()
        {
            return {
                data_payment_order : "",
                payment_type_uuid : "",
            };
        }

    </script>
@endpush


