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

                        {{-- PRODUCT ORDER --}}
                        <div class="row pb-4 mb-4">
                            <div class="col-12">
                                <h4 class="h5">PRODUCT LIST</h4>
                                <hr>
                                <div id="productData">

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addProductDetail">Add Product Order</button>
                                    </div>
                                </div>
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
                                            <label for="inputCardMessageCategory">Card Message Category</label>
                                            {!! Form::select('card_message_category', [], null, [ "class" => "form-control", "id" => "cardMessageCategory", "aria-describedby" => "cardMessageCategoryHelp"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputCardMessageSubCategory">Card Message Sub Category</label>
                                            {!! Form::select('card_message_subcategory', [], null, [ "class" => "form-control", "id" => "cardMessageSubCategory", "aria-describedby" => "cardMessageSubCategoryHelp"]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="inputDeliveryDate">Card Message</label>
                                            {!! Form::textarea('card_message', null, [ "class" => "form-control", "id" => "cardMessage", "aria-describedby" => "cardMessageHelp", 'rows' => '4']) !!}
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
                                            {!! Form::date('delivery_date', null, [ "class" => "form-control", "id" => "deliveryDate", "aria-describedby" => "deliveryDateHelp"]) !!}
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
                                            {!! Form::number('delivery_charge', null, [ "class" => "form-control", "id" => "deliveryCharge", "aria-describedby" => "deliveryChargeHelp"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputDeliveryDate">Delivery Charge Timeslot</label>
                                            {!! Form::number('delivery_charge_timeslot', null, [ "class" => "form-control", "id" => "deliveryChargeTimeslot", "aria-describedby" => "deliveryChargeTimeslotHelp"]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
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
                                            {!! Form::textarea('custom_delivery_remaks', null, ['class' => 'form-control' ,'rows' => '4', 'id' => 'custom_delivery_remark']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="inputDeliveryDate">Internal Notes</label>
                                            {!! Form::textarea('internal_notes', null, [ "class" => "form-control", "id" => "internalNotes", "aria-describedby" => "internalNotesHelp", 'rows' => '4']) !!}
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
        var listProductOrder        = [];
        var deliverySchedule        = null;
        var paymentOrder            = null;

        var client_result;
        var recipient_result;
        var product_result;
        var timeslot_result;
        var card_message_sub_result;

        $(document).ready(function (e) {
            getCardMessageCategoryAjax("{{route('bungadavi.cardmessagecategory.ajax.list')}}")
        })

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

            if ($('input[type=radio][name=radioButtonClientType]:checked').val() == 'personal') {
                getRecipientAjax("{{ url('bungadavi/personalrecipient/ajax-list') }}"+ "/" + client_selected.uuid);
            } else {
                getFloristRecipientAjax("{{ url('bungadavi/floristrecipient/ajax-list') }}"+ "/" + client_selected.uuid);
            }

            $("#btnOpenModalAddSender").html('Change Sender');
            $("#addClientSender").modal('hide');
        });

        // cliek set Click Recipient Data
        $("#btnRecipientAdd").click(function (e) {
            if ($("#create_new_recipient:checked").val() == "on") {
                Object.assign(senderRecipientOrder, {
                    is_create_new: true,
                    is_secret: false,
                    receiver_name           : $("#recipientName").val(),
                    receiver_phone_number   : $("#recipientPhone").val(),
                    receiver_email      : $("#recipientEmail").val(),
                    receiver_address    : $("#recipientPhone").val(),
                    receiver_country    : $("#country-id option:checked").text(),
                    receiver_province   : $("#province-id option:checked").text(),
                    receiver_city       : $("#city-id option:checked").text(),
                    receiver_district   : $("#district-id option:checked").text(),
                    receiver_village    : $("#village-id option:checked").text(),
                    receiver_zipcode    : $("#zipcode-id option:checked").text(),
                });

                setRecipientData(senderRecipientOrder)
            } else {
                let recipient_selected = recipient_result.find(x => x.uuid === $("#recipient_id").val());

                Object.assign(senderRecipientOrder, {
                    is_create_new: false,
                    is_secret: false,
                    receiver_name : ( $('input[type=radio][name=radioButtonClientType]:checked').val() == "personal" ? recipient_selected.firstname + " " + recipient_selected.lastname : recipient_selected.fullname),
                    receiver_phone_number : recipient_selected.phone,
                    receiver_email      : recipient_selected.email,
                    receiver_address : recipient_selected.address,
                    receiver_country : recipient_selected.country_id,
                    receiver_province : recipient_selected.province_id,
                    receiver_city : recipient_selected.city_id,
                    receiver_district : recipient_selected.district_id,
                    receiver_village : recipient_selected.village_id,
                    receiver_zipcode : recipient_selected.zipcode_id,
                });

                setRecipientData(senderRecipientOrder)
            }


            $("#btnOpenModalAddRecipient").html('Change Recipient');
            $("#addClientRecipient").modal('hide');

        });

        // click set product list data
        $("#btnAddProduct").click(function (e) {
            let product_selected = [];
            $("input[type='checkbox'][id='product_uuid']:checked").each(function(i){
                product_selected[i] = $(this).val();
            });

            setProductData(product_selected)

            $("#addProductDetail").modal('hide');
        })

        // set html data sender
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

        // set html data recipient
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

        // set html data product
        function setProductData(productData)
        {
            getProductAjax("{{ url('bungadavi/products/ajax-list?data=') }}" + productData);
        }

        $("#create_new_recipient").change(function() {
            if(this.checked) {
                getCountriesAjax("{{ url('bungadavi/location/ajax/country')}}")
                $("#form-new-recipient").removeClass('d-none');
            } else {
                $("#form-new-recipient").addClass('d-none');
            }
        });

        $('input[type=radio][name=radioButtonClientType]').change(function() {
            if (this.value == 'personal') {
                getClientAjax("{{ route('bungadavi.personals.ajax.list') }}");
                $("#formPICName").addClass("d-none");
                $("#formSenderName").addClass("d-none");
            } else if (this.value == 'corporate') {
                getClientAjax("{{ route('bungadavi.corporate.ajax.list') }}");
                $("#formPICName").removeClass("d-none");
                $("#formSenderName").addClass("d-none");
            } else if (this.value == 'affiliate') {
                getClientAjax("{{ route('bungadavi.affiliate.ajax.list') }}");
                $("#formPICName").removeClass("d-none");
                $("#formSenderName").removeClass("d-none");
            }
        });

        // click set recipient data
        $("#recipient_id").change(function (e) {
        });

        // card message
        $("#cardMessageCategory").change(function (e) {
            getCardMessageSubCategoryAjax("{{url('bungadavi/cardmessagesubcategory/ajax-list')}}/" + $('#cardMessageCategory option:selected').val())
        });

        $("#cardMessageSubCategory").change(function (e) {
            let message_selected = card_message_sub_result.find(x => x.id === $("#cardMessageSubCategory option:selected").val());

            $("#cardMessage").val(message_selected.description);
        });

        // delivery date for timeslot
        $("#deliveryDate").change(function (e) {
            getTimeSlotAjax("{{url('bungadavi/timeslots/ajax-list/')}}/"+this.value);
        })

        $("#selectTimeSlot").change(function (e) {
            let timeslot_selected = timeslot_result.find(x => x.id === $("#selectTimeSlot option:selected").val());
            $("#deliveryChargeTimeslot").val(timeslot_result.price);
        })

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

        function getFloristRecipientAjax(url)
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
                        html += "<option value='"+res.uuid+"'>"+res.fullname+"</option>";
                    })
                    $("#recipient_id").html(html);
                },
            });
        }

        function getProductAjax(url)
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
                    let html_product = "";
                    product_result = result;
                    result.forEach( (x, i) => {
                        let image_url = "{{ url('storage') }}" + "/" + x.image_main_product;
                        html_product += "<div class='row'>";
                        html_product += "<div class='col-6'>";
                        html_product += "<img src='"+image_url+"' class='img-thumbnail' style='max-width=120px !important;' />";
                        html_product += "</div>";
                        html_product += "<div class='col-6'>";
                        html_product += "<h3 class='h4'>"+ x.code_product +"</h3>";
                        html_product += "<h3 class='h3'>"+ x.name_product +"</h3>";
                        html_product += "<div class='form-group'>";
                        html_product += "<label>Qty</label>";
                        html_product += "<input type='number' class='form-control' id='qtyProduct' value='1' />";
                        html_product += "</div>";
                        html_product += "<div class='form-group'>";
                        html_product += "<label>Message From</label>";
                        html_product += "<input type='text' class='form-control' id='fromMessageProduct' value='' />";
                        html_product += "</div>";
                        html_product += "<div class='form-group'>";
                        html_product += "<label>Message To</label>";
                        html_product += "<input type='text' class='form-control' id='toMessageProduct' value='' />";
                        html_product += "</div>";
                        html_product += "<div class='form-group'>";
                        html_product += "<label>Product Remarks</label>";
                        html_product += "<textarea id='remarkProduct' class='form-control' rows='4'></textarea>";
                        html_product += "</div>";
                        html_product += "</div>";
                        html_product += "</div>";

                        // listProductOrder[i] = {
                        //     product_uuid : x.uuid,
                        //     code_product : x.code_product,
                        //     name_product : x.name_product,
                        //     qty_product : ($("#qtyProduct").val() == (null || undefined || "")? "1" : $("#qtyProduct").val()) ,
                        //     price_product : x.cost_product,
                        //     from_message_product : $("#fromMessageProduct").val(),
                        //     to_message_product : $("#romMessageProduct").val(),
                        //     remarks_product : $("#remarkProduct").val(),
                        //     custom_product: null
                        // };

                    })

                    $("#productData").html(html_product);


                },
            });
        }

        function getCardMessageCategoryAjax(url)
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
                        html += "<option value='"+res.id+"'>"+res.name+"</option>";
                    })
                    $("#cardMessageCategory").html(html);
                },
            });
        }

        function getCardMessageSubCategoryAjax(url)
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
                        html += "<option value='"+res.id+"'>"+res.name+"</option>";
                    })
                    $("#cardMessageSubCategory").html(html);
                },
            });
        }

        function getTimeSlotAjax(url)
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
                    timeslot_result = result;
                    let html = "";
                    result.forEach((res) => {
                        html += "<option value='"+res.id+"'>"+res.time_slot_name+"</option>";
                    })
                    $("#selectTimeSlot").html(html);
                },
            });
        }

        function postOrder()
        {
            let total_order = 0;
            product_result.forEach((x, i) => {
                total_order += x.cost_product * ($("#qtyProduct").val() == (null || undefined || "")? 1 : $("#qtyProduct").val());

                listProductOrder[i] = {
                    product_uuid : x.uuid,
                    code_product : x.code_product,
                    name_product : x.name_product,
                    qty_product : ($("#qtyProduct").val() == (null || undefined || "")? "1" : $("#qtyProduct").val()) ,
                    price_product : x.cost_product,
                    from_message_product : $("#fromMessageProduct").val(),
                    to_message_product : $("#romMessageProduct").val(),
                    remarks_product : $("#remarkProduct").val(),
                    custom_product: null
                };
            });

            let data = {
                "_token"                : "{{ csrf_token() }}",
                "order_transaction"     : {
                                            type_order_transaction : "backoffice_bungadavi",
                                            total_order_transaction : "1000000",
                                            shipping_price_order_transaction : $("#deliveryCharge").val() + $("#deliveryChargeTimeslot").val(),
                                            status_order_transaction : "New Order",
                                            currency_id : "Rp",
                                            card_message_category : $('#cardMessageCategory option:selected').text(),
                                            card_message_subcategory : $('#cardMessageSubCategory option:selected').text(),
                                            card_message_message : $("#cardMessage").val(),
                                            is_guest : false,
                                        },
                "sender_recipient"      : senderRecipientOrder,
                "list_product_order"    : listProductOrder,
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

        // function setOrderTransaction()
        // {
        //     return {
        //         type_order_transaction : "backoffice_bungadavi",
        //         total_order_transaction : "1000000",
        //         shipping_price_order_transaction : "50000",
        //         status_order_transaction : "New Order",
        //         currency_id : "Rp",
        //         card_message_category : $('#cardMessageCategory option:selected').text(),
        //         card_message_subcategory : $('#cardMessageSubCategory option:selected').text(),
        //         card_message_message : $("#cardMessage").val(),
        //         is_guest : false,
        //     };
        // }

        // // done
        // function setSenderRecipientOrder()
        // {
        //     return {
        //         is_secret : false,
        //         client_type : "personal",
        //         client_uuid : "testing-uuid",
        //         pic_name : ($("#PicName").val() == "") ? "{{ auth()->user()->name }}" :  $("#PicName").val(),
        //         sender_name : "testing sender name",
        //         po_referrence : "testing po reference",
        //         sender_phone_number : "1234",
        //         sender_address : "Jl. Pasar Kamis",
        //         sender_country : "Indonesia",
        //         sender_province : "Kalimantan Selatan",
        //         sender_city : "Banjarmasin",
        //         sender_district : "Banjarmasin Utara",
        //         sender_village : "Kuin Selatan",
        //         sender_zipcode : "70122",
        //         receiver_name : "Luthfy Testing",
        //         receiver_phone_number : "1234",
        //         receiver_address : "Jl. Putri Jaleha",
        //         receiver_country : "Indonesia",
        //         receiver_province : "Kalimantan Selatan",
        //         receiver_city : "Banjarmasin",
        //         receiver_district : "Banjarmasin Utara",
        //         receiver_village : "Banua Anyar",
        //         receiver_zipcode : "70111",
        //     };
        // }

        // function setListProductOrder()
        // {
        //     return [
        //         {
        //             product_uuid : "testing-product-uuid",
        //             code_product : "SBDO1234",
        //             name_product : "Testing Product",
        //             qty_product : "1",
        //             price_product : "1000000",
        //             from_message_product : "Luthfy",
        //             to_message_product : "Luthfy To",
        //             remarks_product : "product remark",
        //             custom_product: null
        //         }
        //     ];
        // }

        function setDeliverySchedule()
        {
            var deliveryRemark = "";

            return {
                time_slot_name : $("#selectTimeSlot option:selected").text(),
                time_slot_id : $("#selectTimeSlot option:selected").val(),
                delivery_remarks : deliveryRemark,
                internal_notes: $("#internalNotes").val(),
                time_slot_charge : $("#deliveryChargeTimeslot").val(),
                delivery_charge : $("#deliveryCharge").val(),
                delivery_date : ($("#deliveryDate").val() == (null || undefined || "") ? null : $("#deliveryDate").val()),
            };
        }

        function setPaymentOrder()
        {
            return {
                data_payment_order : "BCA 0000000 \na.n Testing Rekening",
                payment_type_uuid : "Manual-UUID",
            };
        }

        $("#village-id").change(function (e) {
        let url = "{{url('bungadavi/location/ajax/zipcode')}}" + "?country-id=" + $("#country-id").val() + "&province-id=" + $("#province-id").val() + "&city-id=" + $("#city-id").val() + "&district-id=" + $("#district-id").val() + "&village-id=" + $("#village-id").val();
        getZipCodesAjax(url)
    });

    $("#district-id").change(function (e) {
        let url = "{{url('bungadavi/location/ajax/village')}}" + "?country-id=" + $("#country-id").val() + "&province-id=" + $("#province-id").val() + "&city-id=" + $("#city-id").val() + "&district-id=" + $("#district-id").val();
        getVillagesAjax(url)
    });

    $("#city-id").change(function (e) {
        let url = "{{url('bungadavi/location/ajax/district')}}" + "?country-id=" + $("#country-id").val() + "&province-id=" + $("#province-id").val() + "&city-id=" + $("#city-id").val();
        getDistrictsAjax(url)
    });

    $("#province-id").change(function (e) {
        let url = "{{url('bungadavi/location/ajax/city')}}" + "?country-id=" + $("#country-id").val() + "&province-id=" + $("#province-id").val();
        getCitiesAjax(url)
    });

    $("#country-id").change(function (e) {
        let url = "{{url('bungadavi/location/ajax/province')}}" + "?country-id=" + $("#country-id").val();
        getProvincesAjax(url)
    });

    </script>
@endpush


