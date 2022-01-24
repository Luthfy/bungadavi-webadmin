<!-- Modal -->
<div class="modal fade" id="addClientSender" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Client List</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-6">
                    <div class="col-12 mb-2">
                        <h5 class="mb-2 ml-1 mb-3">Client Type</h5>
                        <div class="row">
                            <div class="form-check ml-0">
                                <input type="radio" id="radioButtonClientType" name="radioButtonClientType" class ="radioButtonClientType" value="personal">
                                <label class="form-check-label" for="exampleRadios1">
                                    Personal
                                </label>
                            </div>
                            <div class="form-check ml-0">
                                <input type="radio" id="radioButtonClientType" name="radioButtonClientType" class="radioButtonClientType" value="corporate">
                                <label class="form-check-label" for="exampleRadios2">
                                    Corporate
                                </label>
                            </div>
                            <div class="form-check ml-0">
                                <input type="radio" id="radioButtonClientType" name="radioButtonClientType" class="radioButtonClientType" value="affiliate">
                                <label class="form-check-label" for="exampleRadios3">
                                    Affiliate
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="col-12">
                        <div class="row">
                            <h5 class="mb-2">Client Name <span class="text-danger">*</span></h5>
                            <div class="col-sm-12 col-md-12">
                                {!! Form::select('client_uuid', [], null, ['class' => 'form-control', 'required' => true, 'id' => 'client_id']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-2">
                    <div class="col-12">
                        <div class="row">
                            <h5 class="mb-2 ml-3">PO Reference <span class="text-danger">*</span></h5>
                            <div class="col-sm-12 col-md-12">
                                {!! Form::text('po_reference', null, ['class' => 'form-control', 'required' => true, 'id' => 'poReference']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-2 d-none" id="formSenderName">
                    <div class="col-12">
                        <div class="row">
                            <h5 class="mb-2 ml-3">Sender Name <span class="text-danger">*</span></h5>
                            <div class="col-sm-12 col-md-12">
                                {!! Form::text('sender_name', null, ['class' => 'form-control', 'required' => true, 'id' => 'senderName']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-2 d-none" id="formPICName">
                    <div class="col-12">
                        <div class="row">
                            <h5 class="mb-2 ml-3">PIC Name <span class="text-danger">*</span></h5>
                            <div class="col-sm-12 col-md-12">
                                {!! Form::select('pic_name', [], null, ['class' => 'form-control', 'required' => true, 'id' => 'PicName']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="btnClientType">Select</button>
        </div>
      </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addClientRecipient" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Recipient List</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="col-12">
                <div class="row my-4">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="inputDeliveryDate">Recipient Name</label>
                            {!! Form::select('recipient_id', [], null, ['class' => 'form-control', 'required' => true, 'id' => 'recipient_id']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row my-4">
                    <div class="col-12">
                        <div class="form-group">
                            {!! Form::checkbox('is_new', null, false, ['id' => 'create_new_recipient']) !!} Create New Recipient
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 d-none" id="form-new-recipient">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="inputDeliveryDate">Recipient Name</label>
                            {!! Form::text('recipient_name', null, [ "class" => "form-control", "id" => "recipientName", "aria-describedby" => "recipientNameHelp"]) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="inputDeliveryDate">Recipient Email</label>
                            {!! Form::text('recipient_email', null, [ "class" => "form-control", "id" => "recipientEmail", "aria-describedby" => "recipientEmailHelp"]) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="inputDeliveryDate">Recipient Phone</label>
                            {!! Form::text('recipient_phone', null, [ "class" => "form-control", "id" => "recipientPhone", "aria-describedby" => "recipientPhoneHelp"]) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="inputDeliveryDate">Address Info</label>
                            {!! Form::textarea('recipient_address_info', null, [ "class" => "form-control", "id" => "recipientAddressInfo", "aria-describedby" => "recipientAddressInfoHelp", 'rows' => '4']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="inputDeliveryDate">Recipient Address</label>
                            {!! Form::textarea('recipient_address', null, [ "class" => "form-control", "id" => "recipientAddress", "aria-describedby" => "recipientAddressHelp", 'rows' => '4']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="inputDeliveryDate">Country</label>
                            {!! Form::select('country', [], null, ['class' => 'form-control', 'id' => 'country-id']) !!}
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="inputDeliveryDate">Province</label>
                            {!! Form::select('province', [], null, ['class' => 'form-control', 'id' => 'province-id']) !!}
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="inputDeliveryDate">City</label>
                            {!! Form::select('city', [], null, ['class' => 'form-control', 'id' => 'city-id']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="inputDeliveryDate">District</label>
                            {!! Form::select('district', [], null, ['class' => 'form-control', 'id' => 'district-id']) !!}
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="inputDeliveryDate">Village</label>
                            {!! Form::select('village', [], null, ['class' => 'form-control', 'id' => 'village-id']) !!}
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="inputDeliveryDate">Zipcode</label>
                            {!! Form::select('zipcode', [], null, ['class' => 'form-control', 'id' => 'zipcode-id']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="btnRecipientAdd">Select</button>
        </div>
      </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addProductDetail" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Product List</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {!! $products->table(['style' => 'width:100%']) !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="btnAddProduct">Select</button>
        </div>
      </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addStock" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Form Stock</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="col-12">
                <div class="row my-4">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="inputDeliveryDate">Stock Name</label>
                            {!! Form::select('stocks_uuid', [], null, ['class' => 'form-control', 'id' => 'socks-uuid']) !!}
                            {!! Form::hidden('product_uuid', null, ['class' => 'form-control', 'id' => 'product-uuid']) !!}
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="inputDeliveryDate">Qty</label>
                            {!! Form::number('qty', null, ['class' => 'form-control', 'id' => 'qty']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="btnAddCustomStock">Add Custom Stock</button>
        </div>
      </div>
    </div>
</div>
