@extends('layouts.admin')

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
        {!! Form::open(['route' => 'bungadavi.ourbank.store', 'method' => 'POST', 'files' => true]) !!}
    @else
        {!! Form::model($data, ['route' => ['bungadavi.ourbank.update', ['ourbank' => $data->id]], 'method' => 'PUT','files' => true]) !!}
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <h4 class="card-title mb-0">{{ $subtitle ?? '' }}</h4>
                        <hr>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Type<span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('type', array('1' => 'PT', '0' => 'CV'),null,['class' => 'form-control'] );!!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Bank Name <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('bank_name', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Bank Account Number <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::number('bank_account_number', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Bank Beneficiary Name <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('bank_beneficiary_name', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Bank Code <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::number('bank_code', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    @if ($data==null)
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Bank Logo <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::file('bank_logo', ["accept" => "image/*"]) !!}
                        </div>
                    </div>
                    @else
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Bank Logo <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            <img src="{{ asset('storage/'.$data->bank_logo) }}" height="200px" width="250" style="margin-bottom: 2rem">
                            <br>
                            {!! Form::file('bank_logo', ["accept" => "image/*"]) !!}
                        </div>
                    </div>
                    @endif

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Bank Branch <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('bank_branch', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <a href="{{ route('bungadavi.ourbank.index') }}" class="btn btn-secondary">Back</a>
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
