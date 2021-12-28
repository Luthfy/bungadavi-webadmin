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
                        <label class="col-form-label col-sm-12 col-md-2">Full Name </label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->fullname}}
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
                            @foreach ($country as $item)
                                {{$item->country->name}}
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Province</label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            @foreach ($province as $item)
                            {{$item->province->name}}
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">City</label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            @foreach ($city as $item)
                            {{$item->city->name}}
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">District</label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            @foreach ($district as $item)
                            {{$item->district->name}}
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Village</label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            @foreach ($village as $item)
                            {{$item->village->name}}
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Zip Code </label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            @foreach ($zipcode as $item)
                            {{$item->zipcode->postal_code}}
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Refferal</label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->refferal}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Sharelink</label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->sharelink}}
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
                        <label class="col-form-label col-sm-12 col-md-2">User Name</label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->username}}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <a href="{{ route('bungadavi.personal.index') }}" class="btn btn-secondary">Back</a>
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
