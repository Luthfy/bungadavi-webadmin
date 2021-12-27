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
        {!! Form::open(['route' => 'bungadavi.splits.store', 'method' => 'POST']) !!}
    @else
        {!! Form::model($data, ['route' => ['bungadavi.splits.update', ['split' => $data->uuid]], 'method' => 'PUT']) !!}
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
                            <div class="col-lg-12">
                                <label>Stock Original Name <span class="text-danger">*</span></label>
                                {!! Form::select('stock_original_uuid', $stocks, null, ['class' => 'form-control select2', "id" => "select-stock-original-uuid", "required" => true]) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label>Stock Fraction Name <span class="text-danger">*</span></label>
                                {!! Form::text('stock_fraction_name', null, ['class' => 'form-control', "id" => "stock-fraction-name", "required" => true]) !!}
                                {{-- {!! Form::checkbox('edit_name', 'Change Name Stock', false, ["id" => "checkbox-stock-name", "required" => true]) !!}
                                <label>Change Name Stock Split</label> --}}
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

                <div class="card-footer">
                    <div class="form-group">
                        <a href="{{ route('bungadavi.splits.index') }}" class="btn btn-secondary">Back</a>
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
