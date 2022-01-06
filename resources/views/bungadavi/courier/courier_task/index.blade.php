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

                    {{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link" id="home-tab" data-toggle="tab" href="#newOrder" role="tab" aria-controls="newOrder" aria-selected="true">New Order</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#progressOrder" role="tab" aria-controls="progressOrder" aria-selected="false">Progress Order</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#cancelOrder" role="tab" aria-controls="cancelOrder" aria-selected="false">Cancel Order</a>
                        </li>
                    </ul> --}}
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
    <div class="modal fade" id="addModalAssignCourier" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Courier Task List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Order Number</label>
                    {!! Form::text('order_number', null, ['class' => 'form-control', 'id' => 'do_number', 'disabled' => true]) !!}
                    {!! Form::hidden('uuid_product', null, ['id' => 'uuid']) !!}
                </div>

                <div class="form-group">
                    <label for="">Courier</label>
                    {!! Form::select('courier_uuid', [], null, ['class' => 'form-control', 'id' => 'courier_uuid']) !!}
                </div>

                <div class="form-group">
                    <label for="">Browse Image</label>
                    {!! Form::select('browse_image', ["1" => "Izinkan Browse Image", "0" => "Tidak Izinkan Browse Image"], null, ['class' => 'form-control', 'id' => 'browse_image']) !!}
                </div>

                <div class="form-group">
                    <label for="">Notes Assignment</label>
                    {!! Form::textarea('notes_assignment', null, ['class' => 'form-control', 'id' => 'notes']) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnAssignCourier">Select</button>
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
            getCourierAjax("{{ route('bungadavi.courier.ajax.list') }}" + "/" + "{{auth()->user()->customer_uuid ?? ''}}");
        });

        $("#btnAssignCourier").click(function (e) {
            let scheduleId = $("#uuid").val();

            $.ajax({
                url: "{{ url('bungadavi/couriertask/assigned') }}" + "/" + scheduleId,
                type: 'POST',
                dataType: 'json',
                data: JSON.stringify({
                    "_token" : "{{ csrf_token() }}",
                    "courier_uuid" : $("#courier_uuid option:selected").val(),
                    "status" : "ASSIGNED",
                    "notes" : $("#notes").val(),
                    "browse_image" : $("#browse_image option:selected").val()
                }),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                contentType: 'application/json',
                success: function (result) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Order Assign To Florist',
                        text: 'New Order Has Been Assign To Florist!',
                    });

                    $('#addModalAssignFlorist').modal('hide')

                    if ($('#datatablesserverside').length > 0) {
                        $('#datatablesserverside').DataTable().ajax.reload();
                    } else {
                        window.location.reload()
                    }
                },
            });
        })

        $('#addModalAssignCourier').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var uuid = button.data('uuid')
            var codeProduct = button.data('donumber')

            var modal = $(this)

            modal.find('.modal-body #uuid').val(uuid)
            modal.find('.modal-body #do_number').val(codeProduct)
        })

        function getCourierAjax(url)
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
                        html += "<option value='"+res.uuid+"'>"+res.username+"</option>";
                    })
                    $("#courier_uuid").html(html);
                },
            });
        }
    </script>

@endpush
