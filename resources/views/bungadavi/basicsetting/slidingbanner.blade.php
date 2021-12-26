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
        {!! Form::open(['route' => 'bungadavi.slidingbanner.store', 'method' => 'POST', 'files' => true]) !!}
    @else
        {!! Form::model($data, ['route' => ['bungadavi.slidingbanner.update', ['slidingbanner' => $data->id]], 'method' => 'PUT','files' => true]) !!}
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <h4 class="card-title mb-0">{{ $subtitle ?? '' }}</h4>
                        <hr>
                    </div>
                    @if ($data == null)
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Banner <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::file('banner', ["accept" => "image/*"]) !!}
                        </div>
                    </div>
                    @else
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Banner <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            <img src="{{ asset('storage/'.$data->banner) }}" height="200px" width="250" style="margin-bottom: 2rem">
                            <br>
                            {!! Form::file('banner', ["accept" => "image/*"]) !!}
                        </div>
                    </div>
                    @endif
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Type<span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('type', array('1' => 'Right', '0' => 'Left'),null,['class' => 'form-control'] );!!}
                        </div>
                    </div>
                    @if ($data == null)
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Banner Start Date<span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::input('date','banner_start_date', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Banner Start Time <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::input('time','banner_start_time', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Banner End Date <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::input('date','banner_end_date', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Banner End Time <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::input('time','banner_end_time', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    @else
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Banner Start Date <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            <input type="text" class="form-control" id="datepicker" name="banner_start_date"  value="<?= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->banner_start_date)->format('m/d/Y') ?>"/>
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Banner Start Time <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            <input type="time" class="form-control" name="banner_start_time"  value="<?= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->banner_start_date)->format('H:i:s') ?>"/>
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Banner End Date <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            <input type="text" class="form-control" id="datepicker" name="banner_end_date"  value="<?= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->banner_end_date)->format('m/d/Y') ?>"/>
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Banner End Time <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            <input type="time" class="form-control" name="banner_end_time"  value="<?= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->banner_end_date)->format('H:i:s') ?>"/>
                        </div>
                    </div>
                    @endif

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
                        <label class="col-form-label col-sm-12 col-md-2">Is Active <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('is_active', array('1' => 'Yes', '0' => 'No'),null,['class' => 'form-control'] );!!}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <a href="{{ route('bungadavi.slidingbanner.index') }}" class="btn btn-secondary">Back</a>
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
