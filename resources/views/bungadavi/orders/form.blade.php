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
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="mb-0">Detail Transaction</h4>
                                </div>
                                <div class="col-6 text-right">
                                    <h4 class="mb-2">
                                        Currency Mode
                                        <select name="code_currency" id="currencyCode">
                                            <option value="">IDR - IDR</option>
                                        </select>
                                    </h4>
                                    <span id="currencyRates">Rp. 1</span>
                                </div>
                            </div>
                            <hr>
                        </div>

                        {{-- SENDER RECIPIENT SECTION --}}
                        <div class="row pb-4 mb-4">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h4 class="h5">SENDER</h4>
                                <hr>
                                <div id="senderData">

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addClientSender" id="btnOpenModalAddSender">Add Sender</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pb-4 mb-4">
                            <div class="col-lg-12 col-md-12 co-sm-12">
                                <h4 class="h5">RECIPIENT</h4>
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

                        {{-- PRODUCT LIST NEW --}}
                        {{-- <div class="row pb-4 mb-4">
                            <div class="col-lg-12 col-md-12">
                                <h4 class="h5">PRODUCT LIST</h4>
                                <hr>
                            </div>
                            <div class="col-lg-12 col-md-12" id="productData">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <h3 class='h4'>Produk Kode</h3>
                                        <h3 class='h3'>Produk Name</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <img src='' class='img-thumbnail' style='width=80px;' />
                                        <div class="custom-file mb-3">
                                            <input type="file" class="custom-file-input" id="validatedCustomFile">
                                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="mb-3">
                                            <label for="validationTextarea">Cost Selling</label>
                                            <div class="input-group is-invalid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text currency-symbol" id="costSellingSymbol">Rp</span>
                                                </div>
                                                <input type="text" class="form-control" id="costSellingPrice" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="validationTextarea">Cost Selling Florist</label>
                                            <div class="input-group is-invalid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text currency-symbol" id="costSellingFloristSymbol">Rp</span>
                                                </div>
                                                <input type="text" class="form-control" id="costSellingFloristPrice" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="mb-3">
                                            <label for="validationTextarea">Product Remarks</label>
                                            <textarea class="form-control" id="validationTextarea" rows="5"></textarea>
                                          </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <table class="table" id="row-product-materials">
                                            <tr colspan="3"><td class="text-center">- Stock Belum Ada</td></tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> --}}



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
                                            <label>From</label>
                                            <input type='text' class='form-control' id='fromMessageOrder' value='' name="from_message_order" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>To</label>
                                            <input type='text' class='form-control' id='toMessageOrder' value='' name="to_message_order" />
                                        </div>
                                    </div>
                                </div>
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
                                            <div class="input-group is-invalid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text currency-symbol" id="deliveryChargeSymbol">Rp</span>
                                                </div>
                                                <input name="delivery_charge" type="text" class="form-control" aria-describedby="validatedInputGroupPrepend" id="deliveryCharge" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputDeliveryDate">Delivery Charge Timeslot</label>
                                            <div class="input-group is-invalid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text currency-symbol" id="deliveryChargeTimeslotSymbol">Rp</span>
                                                </div>
                                                <input name="delivery_charge_timeslot" type="text" class="form-control" id="deliveryChargeTimeslot" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-12">
                                        <label>Delivery Remarks</label>
                                        @foreach ($deliveryRemarks as $item)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="radioButtonsDeliveryRemarks" id="radioButtonsDeliveryRemarks" value="{{ $item->description }}" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                              {{ $item->description }}
                                            </label>
                                        </div>
                                        @endforeach
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="radioButtonsDeliveryRemarks" id="radioButtonsDeliveryRemarks" value="Custom Remarks" checked>
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
                                    <div id="productList">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <strong>Delivery Charge</strong>
                                    <div id="deliveryChargeSummary">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <strong>Timeslot Charge</strong>
                                    <div id="deliveryTimeslotSummary">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <strong>Total Price</strong>
                                    <div id="totalPriceSummary">

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
                        <h4 class="mb-0">Payment Type</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="mb-0">Manual Payment</h4>
                                <div col="row">
                                @foreach ($ourBank as $item)
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="bankOption" id="exampleRadios1" value="{{ $item->bank_name ."<br/>". $item->bank_account_number ."<br/>". $item->bank_code ."<br/>". $item->bank_beneficiary_name }}" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                <p>{{ $item->bank_name }} <br>
                                                {{ $item->bank_account_number }} ({{ $item->bank_code }}) <br>
                                                {{ $item->bank_beneficiary_name }} </p>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <a href="{{ route('bungadavi.orders.index') }}" class="btn btn-secondary">Back</a>
            {!! Form::reset('Reset', ['class' => 'btn btn-danger']) !!}
            {!! Form::submit('Create Order', ['class' => 'btn btn-primary', 'id' => 'createNewOrder']) !!}

        </div>

        @include('bungadavi.orders.modal')

@endsection
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@push('js')

    <script>
        var orderTransaction        = {};
        var senderRecipientOrder    = {};
        var listProductOrder        = [];
        var customProductStock      = [];
        var deliverySchedule        = null;
        var paymentOrder            = null;

        var client_result;
        var recipient_result;
        var product_result;
        var timeslot_result;
        var card_message_sub_result;
        var currency_result;
        var deliveryRemark = "";
        var stock_result;

        $(document).ready(function (e) {
            getCardMessageCategoryAjax("{{route('bungadavi.cardmessagecategory.ajax.list')}}")
            getCurrencyActive("{{route('bungadavi.currency.ajax')}}")

            let urlStocks = "{{route('bungadavi.stocks.ajax.list')}}";
            getStockProduct(urlStocks)
        })

        // click process order
        $("#createNewOrder").click(function (e) {
            $("#createNewOrder").val("Process Download");
            $("#createNewOrder").addClass("disabled");
            postOrder();
        });

        // click set client sender data
        $("#btnClientType").click(function (e) {
            let client_selected = client_result.find(x => x.uuid === $("#client_id").val());
            senderRecipientOrder = {
                client_type     : ($('input[type=radio][name=radioButtonClientType]:checked').val() == (null || undefined || "") ? "undefined" :  $('input[type=radio][name=radioButtonClientType]:checked').val()),
                client_uuid     : client_selected.uuid,
                pic_name        : ($("#PicName option:selected").val() == (null || undefined || "")) ? "{{ auth()->user()->name }}" :  $("#PicName option:selected").text(),
                sender_name     : ($("#senderName").val() == (null || undefined || "") ? client_selected.fullname : $("#senderName").val()),
                po_referrence   : ($("#poReference").val() == (null || undefined || "") ? "" :  $("#poReference").val()),
                sender_phone_number : client_selected.phone,
                sender_address  : client_selected.address,
                sender_country  : client_selected.country.name,
                sender_province : client_selected.province.name,
                sender_city     : client_selected.city.name,
                sender_district : client_selected.district.name,
                sender_village  : client_selected.village.name,
                sender_zipcode  : client_selected.zipcode.postal_code,
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

        $("#client_id").change(function (e) {
            getPICAjax("{{ url('bungadavi/florist/pic') }}" + "/" + $("#client_id option:selected").val())
        })

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
                    receiver_name : ( $('input[type=radio][name=radioButtonClientType]:checked').val() == "personal" ? recipient_selected.firstname + " " + (recipient_selected.lastname == (null || undefined || "") ? recipient_selected.lastname : "") : recipient_selected.fullname),
                    receiver_phone_number   : recipient_selected.phone,
                    receiver_email          : recipient_selected.email,
                    receiver_address        : recipient_selected.address,
                    receiver_country        : recipient_selected.country.name,
                    receiver_province       : recipient_selected.province.name,
                    receiver_city           : recipient_selected.city.name,
                    receiver_district       : recipient_selected.district.name,
                    receiver_village        : recipient_selected.village.name,
                    receiver_zipcode        : recipient_selected.zipcode.postal_code,
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
                html_sender += "<td>Sender Country</td>";
                html_sender += "<td>:</td>";
                html_sender += "<td>"+senderData.sender_country+"</td>";
                html_sender += "</tr>";
                html_sender += "<tr>";
                html_sender += "<td>Sender Address</td>";
                html_sender += "<td>:</td>";
                html_sender += "<td>"+senderData.sender_address+"</td>";
                html_sender += "<td>Sender Province</td>";
                html_sender += "<td>:</td>";
                html_sender += "<td>"+senderData.sender_province+"</td>";
                html_sender += "</tr>";
                html_sender += "<tr>";
                html_sender += "<td>Sender Phone</td>";
                html_sender += "<td>:</td>";
                html_sender += "<td>"+senderData.sender_phone_number+"</td>";
                html_sender += "<td>Sender City</td>";
                html_sender += "<td>:</td>";
                html_sender += "<td>"+senderData.sender_city+"</td>";
                html_sender += "</tr>";
                html_sender += "<tr>";
                html_sender += "<td>Sender PIC</td>";
                html_sender += "<td>:</td>";
                html_sender += "<td>"+senderData.pic_name+"</td>";
                html_sender += "<td>Sender District</td>";
                html_sender += "<td>:</td>";
                html_sender += "<td>"+senderData.sender_district+"</td>";
                html_sender += "</tr>";
                html_sender += "<tr>";
                html_sender += "<td>PO Reference</td>";
                html_sender += "<td>:</td>";
                html_sender += "<td>"+senderData.po_referrence+"</td>";
                html_sender += "<td>Sender Village</td>";
                html_sender += "<td>:</td>";
                html_sender += "<td>"+senderData.sender_village+"</td>";
                html_sender += "</tr>";
                html_sender += "<tr>";
                html_sender += "<td></td>";
                html_sender += "<td></td>";
                html_sender += "<td></td>";
                html_sender += "<td>Sender Zipcode</td>";
                html_sender += "<td>:</td>";
                html_sender += "<td>"+senderData.sender_zipcode+"</td>";
                html_sender += "</tr>";
                html_sender += "</table>";
            $("#senderData").html(html_sender);
        }

        // set html data recipient
        function setRecipientData(receiverData)
        {
            let html_recipient = "<table class='table'>";
                html_recipient += "<tr>";
                html_recipient += "<td>Recipient Name</td>";
                html_recipient += "<td>:</td>";
                html_recipient += "<td>"+receiverData.receiver_name+"</td>";
                html_recipient += "<td>Recipient Country</td>";
                html_recipient += "<td>:</td>";
                html_recipient += "<td>"+receiverData.receiver_country+"</td>";
                html_recipient += "</tr>";
                html_recipient += "<tr>";
                html_recipient += "<td>Recipient Address</td>";
                html_recipient += "<td>:</td>";
                html_recipient += "<td>"+receiverData.receiver_address+"</td>";
                html_recipient += "<td>Recipient Province</td>";
                html_recipient += "<td>:</td>";
                html_recipient += "<td>"+receiverData.receiver_province+"</td>";
                html_recipient += "</tr>";
                html_recipient += "<tr>";
                html_recipient += "<td>Recipient Phone</td>";
                html_recipient += "<td>:</td>";
                html_recipient += "<td>"+receiverData.receiver_phone_number+"</td>";
                html_recipient += "<td>Recipient City</td>";
                html_recipient += "<td>:</td>";
                html_recipient += "<td>"+receiverData.receiver_city+"</td>";
                html_recipient += "</tr>";
                html_recipient += "<tr>";
                html_recipient += "<td></td>";
                html_recipient += "<td></td>";
                html_recipient += "<td></td>";
                html_recipient += "<td>Recipient Village</td>";
                html_recipient += "<td>:</td>";
                html_recipient += "<td>"+receiverData.receiver_village+"</td>";
                html_recipient += "</tr>";
                html_recipient += "<tr>";
                html_recipient += "<td></td>";
                html_recipient += "<td></td>";
                html_recipient += "<td></td>";
                html_recipient += "<td>Recipient Village</td>";
                html_recipient += "<td>:</td>";
                html_recipient += "<td>"+receiverData.receiver_village+"</td>";
                html_recipient += "</tr>";
                html_recipient += "<tr>";
                html_recipient += "<td></td>";
                html_recipient += "<td></td>";
                html_recipient += "<td></td>";
                html_recipient += "<td>Recipient Zipcode</td>";
                html_recipient += "<td>:</td>";
                html_recipient += "<td>"+receiverData.receiver_zipcode+"</td>";
                html_recipient += "</tr>";
                html_recipient += "</table>";
            $("#recipientData").html(html_recipient);

            let text = "Delivery Charge From " + receiverData.sender_village + " To " + receiverData.receiver_village;
            setDeliveryChargeSummaru(text, 0);

        }

        function setTimeSlotSummary(message, price)
        {
            let html  = "<table class='table'>";
                html += "<tr><td>"+message+"</td><td>"+price+"</td></tr>"
                html += "</table>";
            $("#deliveryTimeslotSummary").append(html);
        }

        function setDeliveryChargeSummaru(message, price)
        {
            let html  = "<table class='table'>";
                html += "<tr><td>"+message+"</td><td>"+price+"</td></tr>"
                html += "</table>";
            $("#deliveryChargeSummary").append(html);
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

        $('input[type=radio][name=radioButtonsDeliveryRemarks]').change(function (e) {
            console.log(this.value)
            if (this.value != "Custom Remarks") {
                $("#custom_delivery_remark").val(this.value);
            }
        })

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
            var cms = card_message_sub_result.find(x => x.id === Number($("#cardMessageSubCategory").val()));
            $("#cardMessage").val(cms.description);
        });

        // delivery date for timeslot
        $("#deliveryDate").change(function (e) {
            getTimeSlotAjax("{{url('bungadavi/timeslots/ajax-list/')}}/"+this.value);
            $("#deliveryCharge").val(Number(0));
        })

        $("#selectTimeSlot").change(function (e) {
            var timeslot_selected = timeslot_result.find(x => x.id === Number($("#selectTimeSlot option:selected").val()));
            $("#deliveryChargeTimeslot").val(timeslot_selected.price);

            setTimeSlotSummary(timeslot_selected.time_slot_name, timeslot_selected.price)
        });

        $("#currencyCode").change(function (e) {
            let currencyFrom = $("#currencyCode option:selected").data("from");
            let currencyTo   = $("#currencyCode option:selected").data("to");

            let currency_selected = currency_result.find(x => (x.currency_code_to_id == currencyTo) && (x.currency_code_from_id == currencyFrom));

            console.log(currency_selected);

            $("#currencyRates").text("1 "+currency_selected.currency_code_from_id+" -> " + currency_selected.value + " " + currency_selected.currency_code_to_id);

            $(".currency-symbol").text(currency_selected.currency_code_to_id)
            $(".currency-symbol").text(currency_selected.currency_code_to_id)
            $("#deliveryChargeSymbol").text(currency_selected.currency_code_to_id)
            $("#deliveryChargeTimeslotSymbol").text(currency_selected.currency_code_to_id)

            $("#costSellingPrice").val(konversiMataUang(numberDefaultZero($("#costSellingPrice").val()), currency_selected))
            $("#costSellingFloristPrice").val(konversiMataUang(numberDefaultZero($("#costSellingFloristPrice").val()), currency_selected))
            $("#deliveryCharge").val(konversiMataUang(numberDefaultZero($("#deliveryCharge").val()), currency_selected))
            $("#deliveryChargeTimeslot").val(konversiMataUang(numberDefaultZero($("#deliveryChargeTimeslot").val()), currency_selected))
        });

        $('#addStock').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)

            var uuid = button.data('key')

            var modal = $(this)

            modal.find('.modal-body #product-uuid').val(uuid)
        })

        function konversiMataUang(nilaiAwal, currency)
        {
            return (currency.value * nilaiAwal / 1).toFixed(2)
        }

        function numberDefaultZero(value)
        {
            return (value == (null || undefined || "")) ? 0 : value
        }

        function getPICAjax(url)
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
                    let html = "";
                    html += "<option value='' disabled readonly selected>- Select PIC Name -</option>";
                    result.forEach((res) => {
                        html += "<option value='"+res.uuid+"'>"+res.name+"</option>";
                    })
                    $("#PicName").html(html);
                },
            });
        }

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
                    html += "<option value='' disabled readonly selected>- Select Client -</option>";
                    result.forEach((res) => {
                        html += "<option value='"+res.uuid+"'>"+res.fullname+"</option>";
                    })
                    $("#client_id").html(html);
                },
            });
        }

        function getCurrencyActive(url)
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
                    currency_result = result;
                    let html = "";
                    html += "<option value='' disabled readonly selected>- Currency -</option>";
                    result.forEach((res) => {
                        html += "<option value='"+res.currency_code_to_id+"' data-from='"+res.currency_code_from_id+"' data-to='"+res.currency_code_to_id+"'>"+res.currency_code_from_id+" - "+res.currency_code_to_id+"</option>";
                    })
                    $("#currencyCode").html(html);
                },
            });
        }

        function getStockProduct(urlAbsolute)
        {
            $.ajax({
                url : urlAbsolute,
                type : 'get',
                success: (result) => {
                    stock_result = result;
                    let html = "";
                        html += "<option value='' disabled readonly selected>- Select Stocks -</option>";
                    result.forEach((res) => {
                        html += "<option value='"+res.uuid+"'>"+res.name_stock+"</option>";
                    })
                    $("#socks-uuid").append(html);
                }
            })
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
                    html += "<option value='' disabled readonly selected>- Select Recipient -</option>";
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
                    html += "<option value='' disabled readonly selected>- Select Florist Recipient -</option>";
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
                    product_result = result;
                    writeProductHTML(result);
                },
            });
        }

        $("#btnAddCustomStock").click(function (e) {
            let product_uuid = $('.modal-body #product-uuid').val(); // as key
            let stock_uuid   = $('.modal-body #socks-uuid option:selected').val(); // as value
            let qty_stocks   = $('.modal-body #qty').val(); // as value

            let stock_selected = stock_result.find(x => x.uuid === stock_uuid);

            let stock_material = {
                'stocks_uuid' : stock_uuid,
                'products_uuid' : product_uuid,
                'qty_used_products_material' : qty_stocks,
                'stock' : stock_selected
            }


            product_result.find(x => x.uuid === product_uuid).materials.push(stock_material);
            writeProductHTML(product_result)

            $("#addStock").modal('hide')
        });

        function writeProductHTML(result)
        {
            let html = "";
            result.forEach( (x, i) => {
                console.log(x)
                let image_url = "{{ url('storage') }}" + "/" + x.image_main_product;

                html += '<div class="col-lg-12 col-md-12" id="productData">';
                html += '<div class="row">';
                html += '<div class="col-lg-12 col-md-12">';
                html += '<h3 class="h4">'+x.code_product+'</h3>';
                html += '<h3 class="h3">'+x.name_product+'</h3>';
                html += '</div>';
                html += '</div>';

                html += '<div class="row">';
                html += '<div class="col-lg-4 col-md-4 col-sm-12">';
                html += '<img src="'+image_url+'" class="img-thumbnail" style="width=80px;" />';
                html += '<div class="custom-file mb-3 mt-2">';
                html += '<input type="file" class="custom-file-input" id="validatedCustomFile">';
                html += '<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>';
                html += '</div>';
                html += '</div>';
                html += '<div class="col-lg-4 col-md-4 col-sm-12">';
                html += '<div class="mb-3">';
                html += '<label for="validationTextarea">Cost Selling</label>';
                html += '<div class="input-group is-invalid">';
                html += '<div class="input-group-prepend">';
                html += '<span class="input-group-text currency-symbol" id="costSellingSymbol">Rp</span>';
                html += '</div>';
                html += '<input type="text" class="form-control" id="costSellingPrice" value="'+x.cost_product+'" required>';
                html += '</div>';
                html += '</div>';
                html += '<div class="mb-3">';
                html += '<label for="validationTextarea">Cost Selling Florist</label>';
                html += '<div class="input-group is-invalid">';
                html += '<div class="input-group-prepend">';
                html += '<span class="input-group-text currency-symbol" id="costSellingFloristSymbol">Rp</span>';
                html += '</div>';
                html += '<input type="text" class="form-control" id="costSellingFloristPrice" value="'+x.selling_florist_price_product+'" required>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '<div class="col-lg-4 col-md-4 col-sm-12">';
                html += '<div class="mb-3">';
                html += '<label for="validationTextarea">Product Remarks</label>';
                html += '<textarea class="form-control" id="validationTextarea" rows="5"></textarea>';
                html += '</div>';
                html += '</div>';
                html += '</div>';

                if (x.materials.length == 0) {
                    html += '<div class="row">';
                    html += '<div class="col-lg-12 col-md-12 col-sm-12">';
                    html += '<table class="table" id="row-product-materials">';
                    html += '<tr colspan="3"><td class="text-center">- Stock Belum Ada</td></tr>';
                    html += '</table>';
                    html += '</div>';
                    html += '</div>';
                } else {
                    html += '<div class="row">';
                    html += '<div class="col-lg-12 col-md-12 col-sm-12">';
                    html += '<table class="table" id="row-product-materials">';
                    html += '<tr>';
                    html += '<th>Name Stock</th>';
                    html += '<th class="text-center">Qty</th>';
                    html += '<th class="text-center">Action</th>';
                    html += '</tr>';
                    x.materials.forEach((material, index) => {
                        html += '<tr>';
                        html += '<td>'+material.stock.name_stock+'</td>';
                        html += '<td class="text-center">'+material.qty_used_products_material+'</td>';
                        html += '<td class="text-center"><a href="#">x</a></td>';
                        html += '</tr>';
                    });
                    html += '</table>';
                    html += '</div>';
                    html += '</div>';

                    html += '<div class="row mb-4">';
                    html += '<div class="col-lg-12 col-md-12 col-sm-12">';
                    html += '<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addStock" id="btnOpenModalStock" data-key="'+x.uuid+'">Add Material</button>';
                    html += '</div>';
                    html += '</div>';
                }

                html += '</div>';

            })

            var list_product = "<table class='table'>";

            result.forEach( (x, i) => {
                list_product += "<tr><td>"+ x.name_product +"</td><td>"+ x.cost_product +"</td></tr>";
            })

            list_product += "</table>";

            $("#productData").html(html);
            $("#productList").append(list_product);
        }

        function setCustomProduct()
        {
            // check code product dari product
            product_result.forEach((x) => {

                let prd = document.getElementsByClassName('custom_stock_' + x.code_product);

                for (let x = 0; x < prd.length; x++) {
                    console.log(prd[x].value)

                    customProductStock[x] = {
                        uuid_material : prd[x].getAttribute('data-uuidmaterial'),
                        qty_stock     : prd[x].value,
                    }
                }

            })

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
                    html += "<option value='' disabled readonly selected>- Select Card Message Category -</option>";
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
                    card_message_sub_result = result;
                    let html = "";
                    html += "<option value='' disabled readonly selected>- Select Card Message Sub Category -</option>";
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
                    html += "<option value='' disabled readonly selected>- Select Timeslot -</option>";
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
                                            total_order_transaction : total_order,
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

                    Swal.fire({
                        icon: 'success',
                        title: 'New Order Created',
                        text: 'New Order Has Been Created!',
                    });

                    $("#createNewOrder").val("Create New Order");
                    $("#createNewOrder").removeClass("disabled");

                    window.location.href = "{{ route('bungadavi.orders.index') }}";

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $("#createNewOrder").val("Create New Order");
                    $("#createNewOrder").removeClass("disabled");
                    console.log(textStatus, errorThrown);
                }
            })
        }

        function setDeliverySchedule()
        {
            return {
                time_slot_name : $("#selectTimeSlot option:selected").text(),
                time_slot_id : $("#selectTimeSlot option:selected").val(),
                delivery_remarks : $("#custom_delivery_remark").val(),
                internal_notes: $("#internalNotes").val(),
                time_slot_charge : $("#deliveryChargeTimeslot").val(),
                delivery_charge : $("#deliveryCharge").val(),
                delivery_date : ($("#deliveryDate").val() == (null || undefined || "") ? null : $("#deliveryDate").val()),
            };
        }

        function setPaymentOrder()
        {
            return {
                data_payment_order : $('input[type=radio][name=bankOption]:checked').val(),
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


