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
                                <input type="radio" id="radioButtonClientType" name="radioButtonClientType" class="radioButtonClientType" value="affilaite">
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
                                {!! Form::text('pic_name', null, ['class' => 'form-control', 'required' => true, 'id' => 'PicName']) !!}
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
            {!! Form::select('recipient_id', [], null, ['class' => 'form-control', 'required' => true, 'id' => 'recipient_id']) !!}

            <div class="col-12">
                <div class="row my-4">
                    <div class="col-12">
                        <div class="form-group">
                            {!! Form::checkbox('is_new', null, false, ['id' => 'create_new_recipient']) !!} Create New Recipient
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="inputDeliveryDate">Receiver Name</label>
                            {!! Form::text('delivery_charge_timeslot', null, [ "class" => "form-control", "id" => "inputDeliveryChargeTimeslot", "aria-describedby" => "deliveryChargeTimeslotHelp"]) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="inputDeliveryDate">Receiver Phone</label>
                            {!! Form::text('delivery_charge_timeslot', null, [ "class" => "form-control", "id" => "inputDeliveryChargeTimeslot", "aria-describedby" => "deliveryChargeTimeslotHelp"]) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="inputDeliveryDate">Receiver Address</label>
                            {!! Form::text('delivery_charge_timeslot', null, [ "class" => "form-control", "id" => "inputDeliveryChargeTimeslot", "aria-describedby" => "deliveryChargeTimeslotHelp"]) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="inputDeliveryDate">Country</label>
                            {!! Form::select('country', [], null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="inputDeliveryDate">Province</label>
                            {!! Form::select('country', [], null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="inputDeliveryDate">City</label>
                            {!! Form::select('country', [], null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="inputDeliveryDate">District</label>
                            {!! Form::select('country', [], null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="inputDeliveryDate">Village</label>
                            {!! Form::select('country', [], null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="inputDeliveryDate">Zipcode</label>
                            {!! Form::select('country', [], null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="btnRecipientAdd">Understood</button>
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
          <table class="table">
            <tr>
                <td></td>
                <td>Image</td>
                <td>Name Product</td>
                <td>Name Product</td>
                <td>Price</td>
            </tr>
            @forelse ($products as $item)
            <tr>
                <td>{!! Form::checkbox('product_checkbox[]', $item->uuid, null, ['class' => 'form-check', 'id' => 'product_uuid']) !!}</td>
                <td><img src="{{ url('storage/'.$item->image_main_product) }}" alt="" srcset="" class="img-thumbnail" style="max-width: 120px"></td>
                <td>{{ $item->code_product }}</td>
                <td>{{ $item->name_product }}</td>
                <td>{{ $item->cost_product }}</td>
            </tr>
            @empty

            @endforelse
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="btnAddProduct">Select</button>
        </div>
      </div>
    </div>
</div>
