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
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('florist_uuid',$florist, null,['class' => 'form-control select2']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Username <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('username', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Email <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Full Name <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('fullname', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Password <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::password('password', ['class' => 'form-control']) !!}
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
                        <label class="col-form-label col-sm-12 col-md-2">DOB <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::date('DOB', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Marital Status <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('marital_status', array('1' => 'Single', '2' => 'Married', '3' => 'Divorced'),null,['class' => 'form-control'] );!!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Point <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::number('point', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">KTP <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::number('ktp', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    @if ($data == null)
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">KTP Image <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::file('ktp_images', ["accept" => "image/*"]) !!}
                        </div>
                    </div>
                    @else
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">KTP Image <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            <img src="{{ asset('storage/'.$data->ktp_images) }}" height="200px" width="250" style="margin-bottom: 2rem">
                            <br>
                            {!! Form::file('ktp_images', ["accept" => "image/*"]) !!}
                        </div>
                    </div>
                    @endif

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">NPWP <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::number('npwp', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    @if ($data == null)
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">NPWP Image <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::file('npwp_images', ["accept" => "image/*"]) !!}
                        </div>
                    </div>
                    @else
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">NPWP Image <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            <img src="{{ asset('storage/'.$data->npwp_images) }}" height="200px" width="250" style="margin-bottom: 2rem">
                            <br>
                            {!! Form::file('npwp_images', ["accept" => "image/*"]) !!}
                        </div>
                    </div>
                    @endif

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">License Type <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('license_type', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">License Number <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::number('license_number', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    @if ($data == null)
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">License Image <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::file('license_image', ["accept" => "image/*"]) !!}
                        </div>
                    </div>
                    @else
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">License Image <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            <img src="{{ asset('storage/'.$data->license_image) }}" height="200px" width="250" style="margin-bottom: 2rem">
                            <br>
                            {!! Form::file('license_image', ["accept" => "image/*"]) !!}
                        </div>
                    </div>
                    @endif

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">License Expired Date <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::date('license_expired_date', null, ['class' => 'form-control']) !!}
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
                            {!! Form::select('country', [], null,['class' => 'form-control select2', 'id' => 'country-id']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Province <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('province', [], null, ['class' => 'form-control select2', 'id' => 'province-id']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">City <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('city', [], null, ['class' => 'form-control select2', 'id' => 'city-id']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">District <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('district', [],null, ['class' => 'form-control select2', 'id' => 'district-id']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Village <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('village', [],null, ['class' => 'form-control select2', 'id' => 'village-id']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Zip Code <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('zipcode', [], null, ['class' => 'form-control select2', 'id' => 'zipcode-id']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Join Date <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::date('join_date', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">End Date <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Contract Number <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('contract_number', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Terminate Date <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::date('terminate_date', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Terminate Description <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('terminate_description', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Bank Name <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('bank_name', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Bank Beneficiary Name <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('bank_beneficiary_name', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Bank Account Number <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('bank_account_number', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Bank Branch <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('bank_branch', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    @if ($data == null)
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Photo <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::file('photo', ["accept" => "image/*"]) !!}
                        </div>
                    </div>
                    @else
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Photo <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            <img src="{{ asset('storage/'.$data->photo) }}" height="200px" width="250" style="margin-bottom: 2rem">
                            <br>
                            {!! Form::file('photo', ["accept" => "image/*"]) !!}
                        </div>
                    </div>
                    @endif

                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">FCM <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('fcm', null, ['class' => 'form-control']) !!}
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
                        <a href="{{ route('bungadavi.courier.index') }}" class="btn btn-secondary">Back</a>
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
