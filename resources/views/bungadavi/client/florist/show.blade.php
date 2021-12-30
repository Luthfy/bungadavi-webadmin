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
        {!! Form::open(['route' => 'bungadavi.florist.store', 'method' => 'POST']) !!}
    @else
        {!! Form::model($data, ['route' => ['bungadavi.florist.update', ['florist' => $data->uuid]], 'method' => 'PUT']) !!}
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <h4 class="card-title mb-0">{{ $subtitle ?? '' }}</h4>
                        <hr>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="h4">Florist Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row pb-4">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Fullname <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-12">
                                            {{$data->fullname}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Owner <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-12">
                                            {{$data->owner}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Email <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-12">
                                            {{$data->email}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Website</label>
                                        <div class="col-sm-12 col-md-12">
                                            {{$data->website}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Phone <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-12">
                                            {{$data->phone}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Mobile</label>
                                        <div class="col-sm-12 col-md-12">
                                            {{$data->mobile}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Country <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-12">
                                            @foreach ($country as $item)
                                                {{$item->country->name}}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Province <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-12">
                                            @foreach ($province as $item)
                                                {{$item->province->name}}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">City <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-12">
                                            @foreach ($city as $item)
                                                {{$item->city->name}}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">District <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-12">
                                            @foreach ($district as $item)
                                                {{$item->district->name}}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Village <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-12">
                                            @foreach ($village as $item)
                                                {{$item->village->name}}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Zip Code <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-12">
                                            @foreach ($zipcode as $item)
                                                {{$item->zipcode->postal_code}}
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pb-4">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Address <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-12">
                                            {{$data->address}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pb-4">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Latitude</label>
                                        <div class="col-sm-12 col-md-12">
                                            {{$data->latitude}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Longitude</label>
                                        <div class="col-sm-12 col-md-12">
                                            {{$data->longitude}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pb-4">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Affiliate</label>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-check">
                                                {{$data->is_affiliate == 1 ? "Yes":"No"}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Spesial Feature</label>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-check">
                                                {{$data->is_special_feature_active == 1 ? "Yes":"No"}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">User Activated</label>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-check">
                                                {{$data->is_active == 1 ? "Yes":"No"}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Poin</label>
                                        <div class="col-sm-12 col-md-12">
                                            {{$data->point}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="h4">Legal Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row pb-4">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Legal Type <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-12">
                                            {{$data->legal_type}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">NPWP</label>
                                        <div class="col-sm-12 col-md-12">
                                            {{$data->npwp}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">NPWP</label>
                                        <div class="col-sm-12 col-md-12">
                                            <img src="{{ asset('storage/'.$data->npwp_image) }}" height="200px" width="250" style="margin-bottom: 2rem">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="h4">Bank Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row pb-4">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Bank Name <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-12">
                                            {{$florist_bank->bank_name}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Bank Account Number</label>
                                        <div class="col-sm-12 col-md-12">
                                            {{$florist_bank->bank_account_number}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Bank Beneficiary <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-12">
                                            {{$florist_bank->bank_beneficiary}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Bank Branch</label>
                                        <div class="col-sm-12 col-md-12">
                                            {{$florist_bank->bank_branch}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <a href="{{ route('bungadavi.florist.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>

<!-- Modal -->
<div class="modal fade" id="open-maps-dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Dialog Maps</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
              <div id="map" style="height: 80vh"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
<script>

    $(document).ready(function (e) {
        let url = "{{ url('/admin/location/ajax/country')}}";
        getCountriesAjax(url)

        var map;
        var zoom = 13;
        var location = {"lat" : "-6.2054303", "lng" : "106.7014453"};

        map = L.map('map').setView([-6.2087634, 106.845599], zoom);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors Luthfy E. Permana'
        }).addTo(map);

        L.marker(location, {
            title: 'Florist',
            draggable: true
        }).addTo(map);

        map.on('mouseup', function (event) {
            console.log("lat : " + event.latlng.lat + " lng : "+ event.latlng.lng)

            L.marker([event.latlng.lat, event.latlng.lng], {
                title: 'Florist',
                draggable: true
            }).setLatLng(map);

            $("#latitude").val(event.latlng.lat);
            $("#longitude").val(event.latlng.lng);
        })
    });

    $("#btn-open-location").click(function (e) {
        e.preventDefault();
        $("#open-maps-dialog").modal();
    })

    $("#manual-input-zipcode").click(function (e) {
        e.preventDefault();
        if ($("#zipcode-id").is("select")) {
            alert('zipcode updated to manual input');
            $('#zipcode-id').replaceWith('<input type="text" name="zipcode_id" id="zipcode-id" class="form-control mb-2" />');
        } else {
            alert('zipcode updated to select box');
            $('#zipcode-id').replaceWith('<select name="zipcode_id" id="zipcode-id" class="form-control select2 mb-2"></select>');
        }
    })

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
