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

                        {{-- SENDER RECIPIENT SECTION --}}
                        <div class="row pb-4 mb-4">
                            <div class="col-6">
                                <h4 class="h5">SENDER</h4>
                                <hr>
                                <div id="senderData">

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-sm" class="btn btn-primary" data-toggle="modal" data-target="#addClientSender" id="btnOpenModalAddSender">Add Sender</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <h4 class="h5">RECEIVER</h4>
                                <hr>
                                <div id="recipientData">

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addClientRecipient" id="btnOpenModalAddRecipient">Add Receiver</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- END SENDER RECIPIENT SECTION --}}

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
                                            {!! Form::number('delivery_charge', null, [ "class" => "form-control", "id" => "inputDeliveryCharge", "aria-describedby" => "deliveryChargeHelp"]) !!}
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
                                        @foreach ($deliveryRemarks as $item)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="radioButtonsDeliveryRemarks" id="radioButtonsDeliveryRemarks" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                              {{ $item->description }}
                                            </label>
                                        </div>
                                        @endforeach
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="radioButtonsDeliveryRemarks" id="radioButtonsDeliveryRemarks" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                              Custom Remarks
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::textarea('custom_delivery_remaks', null, ['class' => 'form-control' ,'rows' => '4']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="inputDeliveryDate">Internal Notes</label>
                                            {!! Form::textarea('delivery_charge_timeslot', null, [ "class" => "form-control", "id" => "inputDeliveryChargeTimeslot", "aria-describedby" => "deliveryChargeTimeslotHelp", 'rows' => '4']) !!}
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
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h4 class="mb-0">Select Payment</h4>
                                @foreach ($ourBank as $item)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        <p>{{ $item->bank_name }} <br>
                                        {{ $item->bank_account_number }} ({{ $item->bank_code }}) <br>
                                        {{ $item->bank_beneficiary_name }} </p>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('bungadavi.orders.index') }}" class="btn btn-secondary">Back</a>
                        {!! Form::reset('Reset', ['class' => 'btn btn-danger']) !!}
                        {!! Form::submit('Create Order', ['class' => 'btn btn-primary', 'id' => 'createNewOrder']) !!}
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
        var orderTransaction        = {};
        var senderRecipientOrder    = {};
        var listProductOrder        = null;
        var deliverySchedule        = null;
        var paymentOrder            = null;

        var client_result;
        var recipient_result;

        // click process order
        $("#createNewOrder").click(function (e) {
            postOrder();
        });

        // click set client sender data
        $("#btnClientType").click(function (e) {
            let client_selected = client_result.find(x => x.uuid === $("#client_id").val());

            senderRecipientOrder = {
                client_type : ($('input[type=radio][name=radioButtonClientType]:checked').val() == (null || undefined || "") ? "undefined" :  $('input[type=radio][name=radioButtonClientType]:checked').val()),
                client_uuid : client_selected.uuid,
                pic_name : ($("#PicName").val() == (null || undefined || "")) ? "{{ auth()->user()->name }}" :  $("#PicName").val(),
                sender_name : ($("#senderName").val() == (null || undefined || "") ? client_selected.fullname : $("#senderName").val()),
                po_referrence : ($("#poReference").val() == (null || undefined || "") ? "" :  $("#poReference").val()),
                sender_phone_number : client_selected.phone,
                sender_address : client_selected.address,
                sender_country : client_selected.country_id,
                sender_province : client_selected.province_id,
                sender_city : client_selected.city_id,
                sender_district : client_selected.district_id,
                sender_village : client_selected.village_id,
                sender_zipcode : client_selected.zipcode_id,
            }

            setSenderData(senderRecipientOrder)
            getRecipientAjax("{{ url('bungadavi/personalrecipient/ajax-list') }}"+ "/" + client_selected.uuid);

            $("#btnOpenModalAddSender").html('Change Sender');
            $("#addClientSender").modal('hide');
        });

        $("#btnRecipientAdd").click(function (e) {
            let recipient_selected = recipient_result.find(x => x.uuid === $("#recipient_id").val());

            Object.assign(senderRecipientOrder, {
                receiver_name : recipient_selected.firstname + " " + recipient_selected.lastname,
                receiver_phone_number : recipient_selected.phone,
                receiver_address : recipient_selected.address,
                receiver_country : recipient_selected.country_id,
                receiver_province : recipient_selected.province_id,
                receiver_city : recipient_selected.city_id,
                receiver_district : recipient_selected.district_id,
                receiver_village : recipient_selected.village_id,
                receiver_zipcode : recipient_selected.zipcode_id,
            });

            setRecipientData(senderRecipientOrder)

            $("#btnOpenModalAddRecipient").html('Change Recipient');
            $("#addClientRecipient").modal('hide');

        });

        function setSenderData(senderData)
        {
            let html_sender = "<table class='table'>";
                html_sender += "<tr>";
                html_sender += "<td>Sender Name</td>";
                html_sender += "<td>:</td>";
                html_sender += "<td>"+senderData.sender_name+"</td>";
                html_sender += "</tr>";
                html_sender += "<tr>";
                html_sender += "<td>Sender Address</td>";
                html_sender += "<td>:</td>";
                html_sender += "<td>"+senderData.sender_address+"</td>";
                html_sender += "</tr>";
                html_sender += "<tr>";
                html_sender += "<td>Sender Phone</td>";
                html_sender += "<td>:</td>";
                html_sender += "<td>"+senderData.sender_phone_number+"</td>";
                html_sender += "</tr>";
                html_sender += "</table>";
            $("#senderData").html(html_sender);
        }

        function setRecipientData(receiverData)
        {
            let html_recipient = "<table class='table'>";
                html_recipient += "<tr>";
                html_recipient += "<td>Sender Name</td>";
                html_recipient += "<td>:</td>";
                html_recipient += "<td>"+receiverData.receiver_name+"</td>";
                html_recipient += "</tr>";
                html_recipient += "<tr>";
                html_recipient += "<td>Sender Address</td>";
                html_recipient += "<td>:</td>";
                html_recipient += "<td>"+receiverData.receiver_address+"</td>";
                html_recipient += "</tr>";
                html_recipient += "<tr>";
                html_recipient += "<td>Sender Phone</td>";
                html_recipient += "<td>:</td>";
                html_recipient += "<td>"+receiverData.receiver_phone_number+"</td>";
                html_recipient += "</tr>";
                html_recipient += "</table>";
            $("#recipientData").html(html_recipient);
        }

        $('input[type=radio][name=radioButtonClientType]').change(function() {
            if (this.value == 'personal') {
                getClientAjax("{{ route('bungadavi.personals.ajax.list') }}");
                $("#formPICName").addClass("d-none");
                $("#formSenderName").addClass("d-none");
            } else if (this.value == 'corporate') {
                getClientAjax("{{ route('bungadavi.corporate.ajax.list') }}");
                $("#formPICName").removeClass("d-none");
                $("#formSenderName").addClass("d-none");
            } else if (this.value == 'affilaite') {
                getClientAjax("{{ route('bungadavi.affiliate.ajax.list') }}");
                $("#formPICName").removeClass("d-none");
                $("#formSenderName").removeClass("d-none");
            }
        });

        // click set recipient data
        $("#recipient_id").change(function (e) {
        });

        function getClientAjax(url)
        {
            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                contentType: 'application/json',
                success: function (result) {
                    client_result = result;
                    let html = "";
                    result.forEach((res) => {
                        html += "<option value='"+res.uuid+"'>"+res.fullname+"</option>";
                    })
                    $("#client_id").html(html);
                },
            });
        }

        function getRecipientAjax(url)
        {
            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                contentType: 'application/json',
                success: function (result) {
                    recipient_result = result;
                    let html = "";
                    result.forEach((res) => {
                        html += "<option value='"+res.uuid+"'>"+res.firstname+"</option>";
                    })
                    $("#recipient_id").html(html);
                },
            });
        }

        function postOrder()
        {
            let data = {
                "_token"                : "{{ csrf_token() }}",
                "order_transaction"     : setOrderTransaction(),
                "sender_recipient"      : setSenderRecipientOrder(),
                "list_product_order"    : setListProductOrder(),
                "delivery_schedule"     : setDeliverySchedule(),
                "payment_order"         : setPaymentOrder(),
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
                    Swal.fire({
                        icon: 'success',
                        title: 'New Order Created',
                        text: 'New Order Has Been Created!',
                    })
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
                total_order_transaction : "1000000",
                shipping_price_order_transaction : "50000",
                status_order_transaction : "New Order",
                currency_id : "Rp",
                card_message_category : "Happy New Year",
                card_message_subcategory : "Message Happy New Year",
                card_message_message : "message in here",
                is_guest : false,
            };
        }

        function setSenderRecipientOrder()
        {
            return {
                is_secret : false,
                client_type : "personal",
                client_uuid : "testing-uuid",
                pic_name : ($("#PicName").val() == "") ? "{{ auth()->user()->name }}" :  $("#PicName").val(),
                sender_name : "testing sender name",
                po_referrence : "testing po reference",
                sender_phone_number : "1234",
                sender_address : "Jl. Pasar Kamis",
                sender_country : "Indonesia",
                sender_province : "Kalimantan Selatan",
                sender_city : "Banjarmasin",
                sender_district : "Banjarmasin Utara",
                sender_village : "Kuin Selatan",
                sender_zipcode : "70122",
                receiver_name : "Luthfy Testing",
                receiver_phone_number : "1234",
                receiver_address : "Jl. Putri Jaleha",
                receiver_country : "Indonesia",
                receiver_province : "Kalimantan Selatan",
                receiver_city : "Banjarmasin",
                receiver_district : "Banjarmasin Utara",
                receiver_village : "Banua Anyar",
                receiver_zipcode : "70111",
            };
        }

        function setListProductOrder()
        {
            return [
                {
                    product_uuid : "testing-product-uuid",
                    code_product : "SBDO1234",
                    name_product : "Testing Product",
                    qty_product : "1",
                    price_product : "1000000",
                    from_message_product : "Luthfy",
                    to_message_product : "Luthfy To",
                    remarks_product : "product remark",
                    custom_product: null
                }
            ];
        }

        function setDeliverySchedule()
        {
            var deliveryRemark = "";

            return {
                time_slot_name : "NEW YEAR",
                time_slot_id : "1",
                delivery_remarks : "tes",
                time_slot_charge : 0,
                delivery_charge : 0,
                delivery_date : "2021-12-20",
            };
        }

        function setPaymentOrder()
        {
            return {
                data_payment_order : "BCA 0000000 \na.n Testing Rekening",
                payment_type_uuid : "Manual-UUID",
            };
        }

    </script>
@endpush


