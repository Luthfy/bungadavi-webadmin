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
        {!! Form::open(['route' => 'bungadavi.city.store', 'method' => 'POST']) !!}
    @else
        {!! Form::model($data, ['route' => ['bungadavi.city.update', ['city' => $data->id]], 'method' => 'PUT']) !!}
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
                        <label class="col-form-label col-sm-12 col-md-2">Country <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('country_id', [], null,['class' => 'form-control', 'id' => 'country-id']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Province <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('province_id', [], null,['class' => 'form-control', 'id' => 'province-id']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Alias <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('alias', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Name <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Code <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('code', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <a href="{{ route('bungadavi.city.index') }}" class="btn btn-secondary">Back</a>
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
    $("#country-id").select2();
    $("#province-id").select2();

    $("#country-id").change(function (e) {
        let url = "{{url('bungadavi/location/ajax/province')}}" + "?country-id=" + $("#country-id").val();
        getProvincesAjax(url)
    });

    $(document).ready(function (e) {
        let url = "{{ url('/bungadavi/location/ajax/country')}}";
        getCountriesAjax(url)
    });

</script>
@endpush
