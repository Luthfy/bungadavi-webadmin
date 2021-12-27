@extends('layouts.bungadavi')

@section('body')
<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
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
        <div class="col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-12 mb-1">
                        <div class="row">
                            <div class="col-3">
                                <img src="{{ asset('storage') . '/' . $data->image_stock }}" alt="{{ $data->name_stock }}" class="img-thumbnails" style="max-width: 100%;">
                            </div>
                            <div class="col-9">
                                <h5 class="h3">Stock Name {{ ucfirst($data->name_stock) }} {{ $data->code_stock != null ? "(" . Str::upper($data->code_stock) . ")" : "" }}</h5>
                                <div class="col-12 row mb-1">
                                    <span class="badge bg-primary text-white m-1">{{ $data->type }}</span>
                                </div>
                                <div class="col-12 row">
                                    <p class="mb-1">Unit Quantity : <strong>{{ $data->unit()->first()->name }}</strong></p>
                                </div>
                                <div class="col-12 row">
                                    <p class="mb-1">Stock Quantity : <strong>{{ $data->qty_stock ?? '0' }} {{ $data->unit()->first()->name }}</strong></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row pt-2 mb-4" id="history-of-shop">
                            <div class="col-12">
                                <div class="row mx-1 mb-4 justify-content-between">
                                    <h3 class="h4">History Of Shop</h3>
                                    <button class="btn add-btn btn-sm" id="btn-shop">Add Shop</button>
                                </div>
                            </div>
                            <div class="col-12 pb-2">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr class="text-center">
                                                <td>No</td>
                                                <td>User Shop</td>
                                                <td>Qty Buying</td>
                                                <td>Qty Rejected</td>
                                                <td>Notes</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($shops = $data->shops()->simplePaginate(3) as $key => $item)
                                            <tr class="text-center">
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $item->user()->first()->fullname }}</td>
                                                <td>{{ $item->qty_stock_shop }}</td>
                                                <td>{{ $item->reject_stock_shop }}</td>
                                                <td>{{ $item->notes_stock_shop }}</td>
                                                <td>
                                                    <a href="{{ route('shops.edit', ['shop' => $item->uuid]) }}" class='text-success m-1'><span class='fa fa-edit'></span></a>
                                                    <a class='text-danger m-1' id="btn-delete-shop" aria-id="{{$item->uuid}}"><span class='fa fa-trash'></span></a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6">Data not found</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12">
                                    {{ $shops->links() }}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row pt-2 mb-4" id="history-of-opname">
                            <div class="col-12">
                                <div class="row mx-1 mb-4 justify-content-between">
                                    <h3 class="h4">History Of Opname</h3>
                                    <button class="btn add-btn btn-sm" id="btn-opname">Add Opname</button>
                                </div>
                            </div>
                            <div class="col-12 pb-2">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr class="text-center">
                                                <td>No</td>
                                                <td>User Opname</td>
                                                <td>Qty Opname</td>
                                                <td>Notes</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($opnames = $data->opnames()->simplePaginate(3) as $key => $item)
                                            <tr class="text-center">
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $item->user()->first()->fullname }}</td>
                                                <td>{{ $item->qty_stock_opname }}</td>
                                                <td>{{ $item->notes_stock_shop }}</td>
                                                <td>
                                                    <a href="{{ route('opnames.edit', ['opname' => $item->uuid]) }}" class='text-success m-1'><span class='fa fa-edit'></span></a>
                                                    <a class='text-danger m-1' id="btn-delete-opname" aria-id="{{$item->uuid}}"><span class='fa fa-trash'></span></a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6">Data not found</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12">
                                    {{ $opnames->links() }}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row pt-2 mb-4" id="history-of-split">
                            <div class="col-12">
                                <div class="row mx-1 mb-4 justify-content-between">
                                    <h3 class="h4">History Of Split</h3>
                                    <button class="btn add-btn btn-sm" id="btn-split">Add Split</button>
                                </div>
                            </div>
                            <div class="col-12 pb-2">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr class="text-center">
                                                <td>No</td>
                                                <td>User Split</td>
                                                <td>Stock Name Split</td>
                                                <td>Unit</td>
                                                <td>Multplier</td>
                                                <td>Notes</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($split = $data->splitByOriginal()->simplePaginate(3) as $key => $item)
                                            <tr class="text-center">
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $item->user()->first()->fullname }}</td>
                                                <td>{{ $item->stocks('stock_fraction_uuid')->first()->name_stock }}</td>
                                                <td>{{ $item->unit()->first()->name }}</td>
                                                <td>{{ $item->qty_stock_split }}</td>
                                                <td>{{ $item->notes_stock_split }}</td>
                                                <td>
                                                    <a href="{{ route('splits.edit', ['split' => $item->uuid]) }}" class='text-success m-1'><span class='fa fa-edit'></span></a>
                                                    <a class='text-danger m-1' id="btn-delete-split" aria-id="{{$item->uuid}}"><span class='fa fa-trash'></span></a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="7">Data not found</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12">
                                    {{ $split->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

</div>

<!-- Modal -->
<div class="modal fade" id="modal-add-shop" tabindex="-1"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        {{-- {!! Form::open(['route' => 'shops.store', 'method' => 'POST', 'id' => 'form-submit-shop']) !!} --}}
        <form id='form-submit-shop'>
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Stock Shop</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Stock Name <span class="text-danger">*</span></label>
                                            {!! Form::select('stocks_uuid', [$data->uuid => $data->name_stock], [$data->uuid => $data->name_stock], ['class' => 'form-control select2', "id" => "socks-uuid", "required" => true]) !!}
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Total Price <span class="text-danger">*</span></label>
                                            {!! Form::number('total_price_stock_shop', null, ['class'=>"form-control", 'required' => true, 'placeholder'=>"e.g., 5000"]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Qty <span class="text-danger">*</span></label>
                                            {!! Form::number('qty_stock_shop', null, ["class" => "form-control", "placeholder" => "e.g., 2", "required" => true]) !!}
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Qty Rejected <span class="text-danger">*</span></label>
                                            {!! Form::number('reject_stock_shop', null, ["class" => "form-control", "placeholder" => "e.g., 2", "required" => true]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label>Notes</label>
                                            {!! Form::textarea('notes_stock_shop', null, ["class" => "form-control", "cols" => "2", "rows" => "2", "id" => "notes_stock_shop"]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-add-opname" tabindex="-1"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        {{-- {!! Form::open(['route' => 'shops.store', 'method' => 'POST', 'id' => 'form-submit-shop']) !!} --}}
        <form id='form-submit-opname'>
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Stock Opname</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label>Stock Name <span class="text-danger">*</span></label>
                                            {!! Form::select('stocks_uuid', [$data->uuid => $data->name_stock], [$data->uuid => $data->name_stock], ['class' => 'form-control select2', "id" => "socks-uuid", "required" => true]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label>Qty <span class="text-danger">*</span></label>
                                            {!! Form::number('qty_stock_opname', null, ["class" => "form-control", "placeholder" => "e.g., 2", "required" => true]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label>Notes</label>
                                            {!! Form::textarea('notes_stock_opname', null, ["id" => "notes_stock_opname", "cols" => "2", "rows" => "2", "class" => "form-control", "required" => true]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-add-split" tabindex="-1"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id='form-submit-split'>
            <div class="modal-content">
                {{-- {!! Form::open(['route' => 'shops.store', 'method' => 'POST', 'id' => 'form-submit-shop']) !!} --}}
                <form id='form-submit-split'>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Stock Split</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <label>Stock Original Name <span class="text-danger">*</span></label>
                                                    {!! Form::select('stock_original_uuid', [$data->uuid => $data->name_stock], [$data->uuid => $data->name_stock], ['class' => 'form-control select2', "id" => "select-stock-original-uuid", "required" => true]) !!}
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <label>Stock Fraction Name <span class="text-danger">*</span></label>
                                                    {!! Form::text('stock_fraction_name', null, ['class' => 'form-control', "id" => "stock-fraction-name", "required" => true]) !!}
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>Multiplier <span class="text-danger">*</span></label>
                                                    {!! Form::number('qty_stock_split', null, ['class'=>"form-control", 'required' => true, 'placeholder'=>"e.g., 1"]) !!}
                                                </div>

                                                <div class="col-lg-6">
                                                    <label>Unit <span class="text-danger">*</span></label>
                                                    {!! Form::select('unit_id', $units, null, ['class'=>"form-control select2", 'required' => true]) !!}
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <label>Notes Split</label>
                                                    {!! Form::textarea('notes_stock_split', null, ['class'=>"form-control", 'rows' => '2']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </form>
    </div>
</div>

@endsection

@push('js')
<script>

    $("#form-submit-split").submit(function (e) {
        e.preventDefault();

        var form   = $(this);
        var serializedData = form.serialize();

        $.ajax({
            url: "{{ url('admin/splits') }}",
            type: 'post',
            data: serializedData,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: (result) => {
                if (result.status) {
                    Swal.fire(
                        'Success!',
                        'Your data has been added.',
                        'success'
                    )

                    window.location.reload()
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(textStatus);
            }

        })
    })

    $("#form-submit-shop").submit(function (e) {
        e.preventDefault();

        var form   = $(this);
        var serializedData = form.serialize();

        $.ajax({
            url: "{{ url('admin/shops') }}",
            type: 'post',
            data: serializedData,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: (result) => {
                if (result.status) {
                    Swal.fire(
                        'Success!',
                        'Your data has been added.',
                        'success'
                    )

                    window.location.reload()
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(textStatus);
            }

        })
    })

    $("#form-submit-opname").submit(function (e) {
        e.preventDefault();

        var form   = $(this);
        var serializedData = form.serialize();

        $.ajax({
            url: "{{ url('admin/opnames') }}",
            type: 'post',
            data: serializedData,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: (result) => {
                if (result.status) {
                    Swal.fire(
                        'Success!',
                        'Your data has been added.',
                        'success'
                    )

                    window.location.reload()
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(textStatus);
            }

        })
    })

    $("#btn-split").click(function (e) {
        $("#modal-add-split").modal()
    });

    $('#modal-add-split').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    })

    $("#btn-shop").click(function (e) {
        $("#modal-add-shop").modal()
    });

    $('#modal-add-shop').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    })

    $("#btn-opname").click(function (e) {
        $("#modal-add-opname").modal()
    });

    $('#modal-add-opname').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    })

    $("#btn-delete-shop").click(function (e) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            var id = $("#btn-delete-shop").attr('aria-id')
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url('admin/shops') }}" + "/" + id ,
                    type: 'delete',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: (result) => {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )

                        window.location.reload()
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                })
            }
        })
    })

    $("#btn-delete-opname").click(function (e) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            var id = $("#btn-delete-opname").attr('aria-id')
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url('admin/opnames') }}" + "/" + id ,
                    type: 'delete',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: (result) => {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )

                        window.location.reload()
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                })
            }
        })
    })

    $("#btn-delete-split").click(function (e) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            var id = $("#btn-delete-split").attr('aria-id')
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url('admin/splits') }}" + "/" + id ,
                    type: 'delete',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: (result) => {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )

                        window.location.reload()
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                })
            }
        })
    })

</script>
@endpush
