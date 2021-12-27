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
        {!! Form::open(['route' => 'bungadavi.personal.store', 'method' => 'POST']) !!}
    @else
        {!! Form::model($data, ['route' => ['bungadavi.personal.update', ['personal' => $data->uuid]], 'method' => 'PUT']) !!}
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
                        <label class="col-form-label col-sm-12 col-md-2">Full Name <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('fullname', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">First Name <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Lastname <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Phone <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Mobile <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Gender <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('gender', ['L' => 'Laki-Laki', 'P' => 'Perempuan'], null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Birthday <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::date('birthday', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Address <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Country <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('country_id', [], null,['class' => 'form-control select2', 'id' => 'country-id']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Province <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('province_id', [], null, ['class' => 'form-control select2', 'id' => 'province-id']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">City <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('city_id', [], null, ['class' => 'form-control select2', 'id' => 'city-id']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">District <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('district_id', [],null, ['class' => 'form-control select2', 'id' => 'district-id']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Village <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('village_id', [],null, ['class' => 'form-control select2', 'id' => 'village-id']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Zip Code <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('zipcode_id', [], null, ['class' => 'form-control select2', 'id' => 'zipcode-id']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Refferal <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('refferal', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Sharelink <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('sharelink', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Email <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">User Name <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('username', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Password <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <a href="{{ route('bungadavi.personal.index') }}" class="btn btn-secondary">Back</a>
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

    $("#village-id").change(function (e) {
        let url = "{{url('bungadavi/location/ajax/zipcode')}}" + "?country-id=" + $("#country-id").val() + "&province-id=" + $("#province-id").val() + "&city-id=" + $("#city-id").val() + "&district-id=" + $("#district-id").val() + "&village-id=" + $("#village-id").val();
        getZipCodesAjax(url)
    });

    $("#district-id").change(function (e) {
        let url = "{{url('bungadavi/location/ajax/village')}}" + "?country-id=" + $("#country-id").val() + "&province-id=" + $("#province-id").val() + "&city-id=" + $("#city-id").val() + "&district-id=" + $("#district-id").val();
        getVillagesAjax(url)
    });

    $("#city-id").change(function (e) {
        let url = "{{url('bungadavi/location/ajax/district')}}" + "?country-id=" + $("#country-id").val() + "&province-id=" + $("#province-id").val() + "&city-id=" + $("#city-id").val();
        getDistrictsAjax(url)
    });

    $("#province-id").change(function (e) {
        let url = "{{url('bungadavi/location/ajax/city')}}" + "?country-id=" + $("#country-id").val() + "&province-id=" + $("#province-id").val();
        getCitiesAjax(url)
    });

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
