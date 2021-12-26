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
        {!! Form::open(['route' => 'bungadavi.timeslot.store', 'method' => 'POST']) !!}
    @else
        {!! Form::model($data, ['route' => ['bungadavi.timeslot.update', ['timeslot' => $data->id]], 'method' => 'PUT']) !!}
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
                        <label class="col-form-label col-sm-12 col-md-2">Time Slot Name <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('time_slot_name', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    @if ($data == null)
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Date From<span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::input('date','date_from', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Time From <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::input('time','time_from', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Date To <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::input('date','date_to', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Time To <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::input('time','time_to', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    @else
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Date From <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            <input type="text" class="form-control" id="datepicker" name="date_from"  value="<?= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->time_from)->format('m/d/Y') ?>"/>
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Time From <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            <input type="time" class="form-control" name="time_from"  value="<?= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->time_from)->format('H:i:s') ?>"/>
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Date To <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            <input type="text" class="form-control" id="datepicker" name="date_to"  value="<?= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->time_to)->format('m/d/Y') ?>"/>
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Time To <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            <input type="time" class="form-control" name="time_to"  value="<?= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->time_to)->format('H:i:s') ?>"/>
                        </div>
                    </div>
                    @endif

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Price <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::number('price', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Description <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">City Available <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">

                            @if ($data == null)
                                {!! Form::select('city_available[]', $city, null, ["class" => "form-control", "required" => true,'id' => 'cities-id', 'multiple' => true]) !!}
                            @else
                                {!! Form::select('city_available[]', $city,json_decode($data->city_available), ["class" => "form-control", "required" => true,'id' => 'cities-id', 'multiple' => true]) !!}
                            @endif
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Is Priority <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('is_priority', array('1' => 'Yes', '0' => 'No'),null,['class' => 'form-control'] );!!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Is Active <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('is_active', array('1' => 'Yes', '0' => 'No'),null,['class' => 'form-control'] );!!}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <a href="{{ route('bungadavi.timeslot.index') }}" class="btn btn-secondary">Back</a>
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
    $("#cities-id").select2();
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  <script>

  $( function() {
    $( "#datepicker" ).datepicker();
  } );

  </script>

@endpush
