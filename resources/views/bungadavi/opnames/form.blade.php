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
        {!! Form::open(['route' => 'bungadavi.opnames.store', 'method' => 'POST']) !!}
    @else
        {!! Form::model($data, ['route' => ['bungadavi.opnames.update', ['opname' => $data->uuid]], 'method' => 'PUT']) !!}
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
                                <label>Stock Name <span class="text-danger">*</span></label>
                                {!! Form::select('stocks_uuid', $stocks, null, ["class" => "form-control select2", 'required' => true]) !!}
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

                <div class="card-footer">
                    <div class="form-group">
                        <a href="{{ route('bungadavi.opnames.index') }}" class="btn btn-secondary">Back</a>
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
