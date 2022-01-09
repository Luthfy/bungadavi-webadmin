@extends('layouts.bungadavi')

@section('body')
<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">{{ $title ?? '' }}</h3>
                <ul class="breadcrumb">
                    @foreach ($breadcrumb as $key => $br)
                        <li class="breadcrumb-item">{{ $br }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                @if (auth()->user()->hasRole('bungadavi'))
                    <a href="{{ route($button['link']) }}" class="btn add-btn"><i class="fa fa-plus"></i> {{ $button['name'] ?? 'Add' }}</a>
                @endif
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    @include('commons.message')

    <div class="row">
        <div class="col-sm-12">
            <div class="card mb-0">
                <div class="card-header">
                    <h4 class="card-title mb-0">{{ $subtitle ?? '' }}</h4>
                    <p class="card-text">
                        {{ $description ?? '' }}
                    </p>
                </div>
                <div class="card-body">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link" id="home-tab" data-toggle="tab" href="#newOrder" role="tab" aria-controls="newOrder" aria-selected="true">New Order</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#progressOrder" role="tab" aria-controls="progressOrder" aria-selected="false">Progress Order</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#cancelOrder" role="tab" aria-controls="cancelOrder" aria-selected="false">Cancel Order</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="newOrder" role="tabpanel" aria-labelledby="newOrder-tab">
                            <div class="table-responsive">
                                {!! $dataTable->table(['class' => 'datatable table table-stripped mb-0'], true) !!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="progressOrder" role="tabpanel" aria-labelledby="progressOrder-tab">

                        </div>
                        <div class="tab-pane fade" id="cancelOrder" role="tabpanel" aria-labelledby="cancelOrder-tab">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addModalAssignFlorist" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Florist List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Code Product</label>
                    {!! Form::text('code_product', null, ['class' => 'form-control', 'id' => 'code_product', 'disabled' => true]) !!}
                    {!! Form::hidden('uuid_product', null, ['id' => 'uuid']) !!}
                </div>
                <div class="form-group">
                    <label for="">Florist Name</label>
                    {!! Form::select('florist_uuid', [], null, ['class' => 'form-control', 'id' => 'florist_uuid']) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnSelectFloristAssign">Select</button>
            </div>
        </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="updateStatusOrder" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Status Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Code Product</label>
                    {!! Form::text('code_product', null, ['class' => 'form-control', 'id' => 'code_product', 'disabled' => true]) !!}
                    {!! Form::hidden('uuid_product', null, ['id' => 'uuid']) !!}
                </div>
                @if (auth()->user()->hasRole('bungadavi'))
                <div class="form-group">
                    <label for="">Florist Name</label>
                    {!! Form::select('florist_uuid', [], null, ['class' => 'form-control', 'id' => 'florist_uuid']) !!}
                </div>
                @elseif (auth()->user()->hasRole('affiliate'))
                <div class="form-group">
                    {{-- <label for="">Florist Name</label> --}}
                    {!! Form::hidden('florist_uuid', auth()->user()->uuid, ['class' => 'form-control', 'id' => 'florist_uuid']) !!}
                </div>
                @else

                @endif

                <div class="form-group">
                    <label for="">Status</label>
                    {!! Form::select('status_order', ["Accept Florist" => "Accept", "Reject Florist" => "Reject"], null, ['class' => 'form-control', 'id' => 'status_order']) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnUpdateStatus">Select</button>
            </div>
        </div>
        </div>
    </div>

</div>
@endsection

@push('js')
    <!-- Datatable JS -->
    <script src="{{ asset('theme_be/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme_be/js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('/vendor/datatables/buttons.server-side.js') }}"></script>

    {!! $dataTable->scripts() !!}

    <script>
        $(document).ready(function (e) {
            getFloristAjax("{{ route('bungadavi.affiliate.ajax.list') }}");
        });

        $('#addModalAssignFlorist').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var uuid = button.data('uuid')
            var codeProduct = button.data('codeproduct')

            var modal = $(this)

            modal.find('.modal-body #uuid').val(uuid)
            modal.find('.modal-body #code_product').val(codeProduct)
        })

        $('#updateStatusOrder').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var uuid = button.data('uuid')
            var codeProduct = button.data('codeproduct')

            var modal = $(this)

            modal.find('.modal-body #uuid').val(uuid)
            modal.find('.modal-body #code_product').val(codeProduct)
        })

        $("#btnUpdateStatus").click(function (e) {
            let id = $("#updateStatusOrder #uuid").val();
            updateOrderAssignToFlorist("{{ $linkUpdateStatus }}" + "/" + id + "/status");
        });

        $("#btnSelectFloristAssign").click(function (e) {
            let id = $("#uuid").val();
            updateOrderAssignToFlorist("{{ $linkUpdateStatus }}" + "/" + id);
        })

        function updateOrderAssignToFlorist(url)
        {
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: JSON.stringify({
                    "_token" : "{{ csrf_token() }}",
                    'florist_uuid': $("#florist_uuid option:selected").val(),
                    'status': $("#status_order option:selected").val(),
                }),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                contentType: 'application/json',
                success: function (result) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Status Changed',
                        text: 'Order Has Been Updated!',
                    });

                    $('#updateStatusOrder').modal('hide');

                    if ($('#datatablesserverside').length > 0) {
                        $('#datatablesserverside').DataTable().ajax.reload();
                    } else {
                        window.location.reload()
                    }
                },
            });
        }

        function getFloristAjax(url)
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
                    $("#florist_uuid").html(html);
                    $("#updateStatusOrder #florist_uuid").html(html);
                },
            });
        }
    </script>

@endpush
