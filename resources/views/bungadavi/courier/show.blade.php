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
        {!! Form::open(['route' => 'bungadavi.courier.store', 'method' => 'POST', 'files'=> true]) !!}
    @else
        {!! Form::model($data, ['route' => ['bungadavi.courier.update', ['courier' => $data->uuid]], 'method' => 'PUT','files'=> true]) !!}
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
                        <label class="col-form-label col-sm-12 col-md-2">Client Florist <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            @foreach ($florist as $item)
                                {{$item}}
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Username <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->username}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Email <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->email}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Full Name <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->fullname}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Mobile <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->mobile}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Gender <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->gender}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">DOB <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->DOB}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Marital Status <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->marital_status}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Point <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->point}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">KTP <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->ktp}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">KTP Image <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            <img src="{{ asset('storage/'.$data->ktp_images) }}" height="200px" width="250" style="margin-bottom: 2rem">
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">NPWP <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->npwp}}
                        </div>
                    </div>


                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">NPWP Image <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            <img src="{{ asset('storage/'.$data->npwp_images) }}" height="200px" width="250" style="margin-bottom: 2rem">
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">License Type <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->license_type}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">License Number <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->license_number}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">License Image <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            <img src="{{ asset('storage/'.$data->license_image) }}" height="200px" width="250" style="margin-bottom: 2rem">
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">License Expired Date <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->license_expired_date}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Address <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->address}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Country <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$country->name}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Province <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$province->name}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">City <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$city->name}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">District <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$district->name}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Village <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$village->name}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Zip Code <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$zipcode->postal_code}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Join Date <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->join_date}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">End Date <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->end_date}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Contract Number <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->contract_number}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Terminate Date <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->terminate_date}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Terminate Description <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->terminate_description}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Bank Name <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->bank_name}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Bank Beneficiary Name <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->bank_beneficiary_name}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Bank Account Number <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->bank_account_number}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Bank Branch <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->bank_branch}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Photo <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            <img src="{{ asset('storage/'.$data->photo) }}" height="200px" width="250" style="margin-bottom: 2rem">
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">FCM <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->fcm}}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Is Active <span class="text-danger">*</span></label>
                        <div class="col-form-label col-md-1">
                            <span>:</span>
                        </div>
                        <div class="col-form-label col-sm-12 col-md-9">
                            {{$data->is_active == 1 ? "Yes":"No"}}
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <a href="{{ route('bungadavi.courier.index') }}" class="btn btn-secondary">Back</a>
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
