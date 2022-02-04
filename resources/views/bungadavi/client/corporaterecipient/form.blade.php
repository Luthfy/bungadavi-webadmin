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
        {!! Form::open(['route' => 'bungadavi.corporaterecipient.store', 'method' => 'POST']) !!}
    @else
        {!! Form::model($data, ['route' => ['bungadavi.corporaterecipient.update', ['corporaterecipient' => $data->uuid]], 'method' => 'PUT']) !!}
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
                        <label class="col-form-label col-sm-12 col-md-2">Client Corporate <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('client_affiliate_uuid',$corporate, null,['class' => 'form-control select2']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Fullname<span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('fullname', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Email <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
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
                        <label class="col-form-label col-sm-12 col-md-2">Latitude <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('latitude', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Longitude <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('longitude', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Info Address <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::textarea('info_address', null, ['class' => 'form-control']) !!}
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
                        <label class="col-form-label col-sm-12 col-md-2">Is Active <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('is_active', array('1' => 'Yes', '0' => 'No'),null,['class' => 'form-control'] );!!}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <a href="{{ route('bungadavi.corporaterecipient.index') }}" class="btn btn-secondary">Back</a>
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
