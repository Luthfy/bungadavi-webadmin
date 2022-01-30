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
                    <div class="row">
                        <div class="col-6">
                            <h4 class="h2">Today</h4>
                            @forelse ($data['orderToday'] as $today)
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="{{ asset('storage' . '/' . ($today['product'] == null ? "" : $today['product']['image_main_product']) ) }}" alt="{{ $today['code_product'] }}" class="img-thumbnail" style="width: 80px">
                                        </div>
                                        <div class="col-9">
                                            <h4 class="h4">{{ $today['name_product'] }}</h4>
                                            <h4 class="h6">{{ $today['code_product'] }}</h4>
                                            <h4 class="h6">Delivery Date : <span class="text-danger" style="font-style: weight">{{ $today['order']['delivery_schedule'][0]['delivery_date'] }}</span></h4>
                                            <h4 class="h6">Timeslot : <span class="text-danger" style="font-style: weight">{{ $today['order']['delivery_schedule'][0]['time_slot_name'] }}</span></h4>
                                            <h4 class="h6">QTY :  <span class="text-danger" style="font-style: weight">{{ $today['qty_product'] }} Product </span></h4>
                                            <h4 class="h6">Cost Product : <span style="font-style: weight">{{ $today['product']['cost_product'] }}</span></h4>
                                            <hr>
                                            <h4>Material</h4>
                                            <ul class="pl-4">
                                                @forelse ($today['materials'] as $material)
                                                <li class="{{ $material['stock']['qty_stock'] > ($today['qty_product'] * $material['qty_stock']) ? 'text-success' : 'text-danger'  }}">{{ $material['name_stock'] }} - {{ $today['qty_product'] }} x {{ $material['qty_stock'] }} ({{ $material['stock']['qty_stock'] }})</li>
                                                @empty
                                                <li> <i>Stock Belum Diatur</i></li>
                                                @endforelse
                                            </ul>
                                            <h4>Product Description</h4>
                                            <div class="table-bordered p-2 mb-2" style="background: #FFE0E3; border-radius: 4px; width=100%">{{ $today['description_product'] }}</div>
                                            <h4>Product Remarks</h4>
                                            <div class="table-bordered p-2 mb-2" style="background: #FFE0E3; border-radius: 4px; width=100%">{{ $today['remarks_product'] }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    @if ($today['status_progress_product'] != 'done')
                                        <button class="btn btn-success btn-sm" data-uuid="{{ $today['uuid'] }}" data-toggle="modal" data-target="#updateStatusOrder" data-codeproduct="{{ $today['code_product'] . ' - ' . $today['name_product'] }}">Done</button>
                                    @endif
                                </div>
                            </div>
                            @empty
                            <div class="card">
                                <div class="card-body">
                                    <i>nothig order today</i>
                                </div>
                            </div>
                            @endforelse
                        </div>
                        <div class="col-6">
                            <h4 class="h2">Tomorrow</h4>
                            @forelse ($data['orderTomorrow'] as $key => $tomorrow)
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="{{ asset('storage' . $tomorrow['product']['image_main_product']) }}" alt="{{ $tomorrow['code_product'] }}" class="img-thumbnail" style="width: 80px">
                                        </div>
                                        <div class="col-9">
                                            <h4 class="h4">{{ $tomorrow['name_product'] }}</h4>
                                            <h4 class="h6">{{ $tomorrow['code_product'] }}</h4>
                                            <h4 class="h6">Delivery Date : <span class="text-danger" style="font-style: weight">{{ $tomorrow['order']['delivery_schedule'][0]['delivery_date'] }}</span></h4>
                                            <h4 class="h6">Timeslot : <span class="text-danger" style="font-style: weight">{{ $tomorrow['order']['delivery_schedule'][0]['time_slot_name'] }}</span></h4>
                                            <h4 class="h6">QTY :  <span class="text-danger" style="font-style: weight">{{ $tomorrow['qty_product'] }} Product </span></h4>
                                            <h4 class="h6">Cost Product : <span style="font-style: weight">{{ $tomorrow['product']['cost_product'] }}</span></h4>
                                            <hr>
                                            <h4>Material</h4>
                                            <ul class="pl-4">
                                                @forelse ($tomorrow['materials'] as $material)
                                                <li class="{{ $material['stock']['qty_stock'] > ($tomorrow['qty_product'] * $material['qty_stock']) ? 'text-success' : 'text-danger'  }}">{{ $material['name_stock'] }} - {{ $tomorrow['qty_product'] }} x {{ $material['qty_stock'] }} ({{ $material['stock']['qty_stock'] }})</li>
                                                @empty
                                                <li> <i>Stock Belum Diatur</i></li>
                                                @endforelse
                                            </ul>
                                            <h4>Product Description</h4>
                                            <div class="table-bordered p-2 mb-2" style="background: #FFE0E3; border-radius: 4px; width=100%">{{ $tomorrow['description_product'] }}</div>
                                            <h4>Product Remarks</h4>
                                            <div class="table-bordered p-2 mb-2" style="background: #FFE0E3; border-radius: 4px; width=100%">{{ $tomorrow['remarks_product'] }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                @if ($tomorrow['status_progress_product'] != 'done')
                                    <button class="btn btn-success btn-sm" data-uuid="{{ $tomorrow['uuid'] }}" data-toggle="modal" data-target="#updateStatusOrder" data-codeproduct="{{ $tomorrow['code_product'] . ' - ' . $tomorrow['name_product'] }}">Done</button>
                                @endif
                                </div>
                            </div>
                            @if ($key == 8)
                                @break
                            @endif
                            @empty
                            <div class="card">
                                <div class="card-body">
                                    <i>nothig order tomorrow</i>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
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
                    {!! Form::hidden('id', null, ['id' => 'uuid']) !!}
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    {!! Form::select('status_progress_product', ["done" => "Done", "on process" => "On Process"], null, ['class' => 'form-control', 'id' => 'status_progress_product']) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnUpdateStatus">Select</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

<script>
$('#updateStatusOrder').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var uuid = button.data('uuid')
    var codeProduct = button.data('codeproduct')

    var modal = $(this)
    console.log(codeProduct)
    modal.find('.modal-body #uuid').val(uuid)
    modal.find('.modal-body #code_product').val(codeProduct)
})

$("#btnUpdateStatus").click(function (e) {
    $.ajax({
        url: "{{ $data['link'] }}",
        type: 'POST',
        dataType: 'json',
        data: JSON.stringify({
            "_token" : "{{ csrf_token() }}",
            "id" : $("#uuid").val(),
            'status_product': $("#status_progress_product option:selected").val(),
        }),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        contentType: 'application/json',
        success: function (result) {
            Swal.fire({
                icon: 'success',
                title: 'Status Changed',
                text: 'Product Status Has Been Updated!',
            });

            $('#updateStatusOrder').modal('hide');

            if ($('#datatablesserverside').length > 0) {
                $('#datatablesserverside').DataTable().ajax.reload();
            } else {
                window.location.reload()
            }
        },
    });
})
</script>

@endpush
