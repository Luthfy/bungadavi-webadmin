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

    <!-- /Page Header -->
    @if ($data == null)
        {!! Form::open(['route' => 'bungadavi.floristadmin.store', 'method' => 'POST','files' => true]) !!}
    @else
        {!! Form::model($data, ['route' => ['bungadavi.floristadmin.update', ['floristadmin' => $data->uuid]], 'method' => 'PUT','files' => true]) !!}
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="h4">Florist Information</h4>
                </div>
                <div class="card-body">
                    <div class="row pb-4">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <label class="col-form-label col-sm-12 col-md-12">Florist Name <span class="text-danger">*</span></label>
                                <div class="col-sm-12 col-md-12">
                                    {!! Form::select('customer_uuid', [], null, ['class' => 'form-control', 'required' => true, 'id' => 'florist_uuid']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <label class="col-form-label col-sm-12 col-md-12">Name <span class="text-danger">*</span></label>
                                <div class="col-sm-12 col-md-12">
                                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <label class="col-form-label col-sm-12 col-md-12">Username <span class="text-danger">*</span></label>
                                <div class="col-sm-12 col-md-12">
                                    {!! Form::text('username', null, ['class' => 'form-control', 'required' => true]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <label class="col-form-label col-sm-12 col-md-12">Email <span class="text-danger">*</span></label>
                                <div class="col-sm-12 col-md-12">
                                    {!! Form::email('email', null, ['class' => 'form-control', 'required' => true]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <label class="col-form-label col-sm-12 col-md-12">Password <span class="text-danger">*</span></label>
                                <div class="col-sm-12 col-md-12">
                                    {!! Form::password('password', ['class' => 'form-control', 'required' => true]) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row pb-4">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <label class="col-form-label col-sm-12 col-md-12">Phone <span class="text-danger">*</span></label>
                                <div class="col-sm-12 col-md-12">
                                    {!! Form::number('phone', null, ['class' => 'form-control', 'required' => true]) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row pb-4">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <label class="col-form-label col-sm-12 col-md-12">Address <span class="text-danger">*</span></label>
                                <div class="col-sm-12 col-md-12">
                                    {!! Form::textarea('address', null, ['class' => 'form-control', 'required' => true]) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row pb-4">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <label class="col-form-label col-sm-12 col-md-12">Address <span class="text-danger">*</span></label>
                                <div class="col-sm-12 col-md-12">
                                    {!! Form::select('address', ['admin' => 'Admin', 'staff' => 'Staff'],null, ['class' => 'form-control', 'required' => true]) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <a href="{{ route('bungadavi.floristadmin.index') }}" class="btn btn-secondary">Back</a>
                        {!! Form::reset('Reset', ['class' => 'btn btn-danger']) !!}
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>

@endsection

@push('js')
<script>

    $(document).ready(function (e) {
        getFloristAjax("{{ route('bungadavi.affiliate.ajax.list') }}");
    });

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
                },
            });
    }


</script>
@endpush
