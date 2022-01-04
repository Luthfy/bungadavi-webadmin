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
        {!! Form::open(['route' => 'bungadavi.promotion.store', 'method' => 'POST', 'files' => true]) !!}
    @else
        {!! Form::model($data, ['route' => ['bungadavi.promotion.update', ['promotion' => $data->uuid]], 'method' => 'PUT','files' => true]) !!}
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
                        <label class="col-form-label col-sm-12 col-md-2">Title <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Title English <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('title_en', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    @if ($data==null)
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Image <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::file('image', ["accept" => "image/*"],null,['class' => 'form-control']) !!}
                        </div>
                    </div>
                    @else
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Image <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            <img src="{{ asset('storage/'.$data->image) }}" height="200px" width="250" style="margin-bottom: 2rem">
                            <br>
                            {!! Form::file('image', ["accept" => "image/*"],null,['class' => 'form-control']) !!}
                        </div>
                    </div>
                    @endif

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Description <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Description English <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::textarea('description_en', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">TNC<span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::textarea('tnc', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">TNC English <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::textarea('tnc_en', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Promotion Code <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('promotion_code', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    @if ($data == null)
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Promo Start Date<span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::input('date','promo_start_date', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Promo Start Time <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::input('time','promo_start_time', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Promo End Date <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::input('date','promo_end_date', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Promo End Date <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::input('time','promo_end_time', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    @else
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Promo Start Date <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            <input type="text" class="form-control" id="datepicker" name="promo_start_date"  value="<?= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->promo_start_date)->format('m/d/Y') ?>"/>
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Promo Start Time <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            <input type="time" class="form-control" name="promo_start_time"  value="<?= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->promo_start_date)->format('H:i:s') ?>"/>
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Promo End Date <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            <input type="text" class="form-control" id="datepicker" name="promo_end_date"  value="<?= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->promo_end_date)->format('m/d/Y') ?>"/>
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Promo End Time <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            <input type="time" class="form-control" name="promo_end_time"  value="<?= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->promo_end_date)->format('H:i:s') ?>"/>
                        </div>
                    </div>
                    @endif

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Is Active <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('is_active', array('1' => 'Yes', '0' => 'No'),null,['class' => 'form-control'] );!!}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <a href="{{ route('bungadavi.promotion.index') }}" class="btn btn-secondary">Back</a>
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
