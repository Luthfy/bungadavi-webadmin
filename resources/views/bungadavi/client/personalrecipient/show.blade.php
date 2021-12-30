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
        {!! Form::open(['route' => 'bungadavi.personalrecipient.store', 'method' => 'POST']) !!}
    @else
        {!! Form::model($data, ['route' => ['bungadavi.personalrecipient.update', ['personalrecipient' => $data->uuid]], 'method' => 'PUT']) !!}
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
                        <label class="col-form-label col-sm-12 col-md-2">Personal ID </label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            @foreach ($personal as $item)
                                {{$item->clientPersonal->fullname}}
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">First Name</label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->firstname}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Lastname </label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->lastname}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Email</label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->email}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Phone </label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->phone}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Mobile</label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->mobile}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Gender</label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->gender}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Birthday </label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->birthday}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Latitude</label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->latitude}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Longitude</label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->longitude}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Address</label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->address}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Country </label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$country->name}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Province</label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$province->name}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">City</label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$city->name}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">District</label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$district->name}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Village</label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$village->name}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Zip Code </label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$zipcode->postal_code}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Is Active</label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->is_active}}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <a href="{{ route('bungadavi.personalrecipient.index') }}" class="btn btn-secondary">Back</a>
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
