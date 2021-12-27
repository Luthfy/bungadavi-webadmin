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
        {!! Form::open(['route' => 'bungadavi.stocks.store', 'method' => 'POST', 'files' => true]) !!}
    @else
        {!! Form::model($data, ['route' => ['bungadavi.stocks.update', ['stock' => $data->uuid]], 'method' => 'PUT', 'files' => true]) !!}
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <h4 class="card-title mb-0">{{ $subtitle ?? '' }}</h4>
                        <hr>
                    </div>
                    <div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Stock Name <span class="text-danger">*</span></label>
                                {!! Form::text("name_stock", null, ["class"=>"form-control", "placeholder"=>"e.g., white rose","required"=>true]) !!}
                            </div>
                            <div class="col-lg-6">
                                <label>Qty <span class="text-danger">*</span></label>
                                {!! Form::number('qty_stock', null, ["class"=>"form-control", "placeholder"=>"e.g., 5","required"=>true]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Type <span class="text-danger">*</span></label>
                                {!! Form::select('type_stock', ['0' => 'Product', '1' => 'Etc'], null, ['class' => 'form-control select2', 'required' => true]) !!}
                            </div>
                            <div class="col-lg-6">
                                <label>Unit <span class="text-danger">*</span></label>
                                {!! Form::select('unit_id', $units, null, ['class' => 'form-control select2', 'required' => true]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label for="image-stock" class="form-label">Image Stock</label>
                                {!! Form::file('image_stock', ['class' => 'form-control', 'id' => 'image-stock', 'accept' => 'images/*']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="form-group">
                        <a href="{{ route('bungadavi.stocks.index') }}" class="btn btn-secondary">Back</a>
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

@endpush
