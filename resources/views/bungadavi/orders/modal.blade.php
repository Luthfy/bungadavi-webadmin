<!-- Modal -->
<div class="modal fade" id="addClientSender" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
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
                                <input type="radio" id="clientPersonal" name="radioButtonClientType" class ="radioButtonClientType" value="clientPersonal">
                                <label class="form-check-label" for="exampleRadios1">
                                    Personal
                                </label>
                            </div>
                            <div class="form-check ml-0">
                                <input type="radio" id="clientCorporate" name="radioButtonClientType" class="radioButtonClientType" value="clientCorporate">
                                <label class="form-check-label" for="exampleRadios2">
                                    Corporate
                                </label>
                            </div>
                            <div class="form-check ml-0">
                                <input type="radio" id="clientAffiliate" name="radioButtonClientType" class="radioButtonClientType" value="clientAffiliate">
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
                            <h5 class="mb-2 ml-3">Sender Name <span class="text-danger">*</span></h5>
                            <div class="col-sm-12 col-md-12">
                                {!! Form::text('sender_name', null, ['class' => 'form-control', 'required' => true, 'id' => 'senderName']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-2">
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
          <button type="button" class="btn btn-primary" id="btnClientType">Understood</button>
        </div>
      </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addClientRecipient" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Recipient List</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {!! Form::select('recipient_id', [], null, ['class' => 'form-control', 'required' => true, 'id', 'recipient_id']) !!}
            <div class="col-12">
                <div class="row">
                    {!! Form::checkbox('is_new', null, false, ['id' => 'create_new_recipient']) !!}
                </div>

            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
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
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
</div>
