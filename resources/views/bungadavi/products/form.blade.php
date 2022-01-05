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

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('info'))
        <div class="alert alert-info">
            {{ session('info') }}
        </div>
    @endif

    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif

    @if (session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif

    <!-- /Page Header -->
    @if ($data == null)
    {!! Form::open(['route' => 'bungadavi.products.store', 'method' => 'POST', 'id' => 'form-product', 'files' => true, ]) !!}
    @else
    {!! Form::model($data, ['route' => ['bungadavi.products.update', ['opname' => $data->uuid]], 'method' => 'PUT', 'files' => true, 'id' => 'form-product']) !!}
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <h4 class="card-title mb-0">{{ $subtitle ?? '' }}</h4>
                        <hr>
                    </div>
                    <div class="card" id="detail-product">
                        <div class="card-header">
                            <h4 class="h4">Product Detail Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row pb-4">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Florist <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-12">
                                            {!! Form::select('florist_uuid', $florist, 'Bungadavi', ['class' => 'form-control', 'required' => true, 'id' => 'florist_uuid']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Print Card Message Mode</label>
                                        <div class="col-sm-12 col-md-12">
                                            {!! Form::select('printcmmode_product', $printModeType, null, ["class" => "form-control", 'required' => true, 'id' => 'printcm_mode']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pb-4">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Product Name <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-12">
                                            {!! Form::text('name_product', null, ["class" => "form-control", "placeholder" => "e.g., Rise and Shine", 'required' => true, 'id' => 'name_product']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pb-4">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Category <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-12">
                                            {!! Form::select('categories_uuid[]', [], null, ['class' => 'form-control', 'required' => true, 'multiple' => true, 'id' => 'categories-id']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Subcategory <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-12">
                                            {!! Form::select('subcategories_uuid[]', [], null, ['class' => 'form-control', 'required' => true, 'multiple' => true, 'id' => 'subcategories-id']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pb-4">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Color</label>
                                        <div class="col-sm-12 col-md-12">
                                            {!! Form::select('color_id[]', $colors, null, ["class" => "form-control", "required" => true, 'id' => 'color-id', 'multiple' => true]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">City <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-12">
                                            {!! Form::select('cities_uuid[]', $cities, null, ["class" => "form-control", "required" => true, 'id' => 'cities-id', 'multiple' => true]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Short Description</label>
                                        <div class="col-sm-12 col-md-12">
                                            {!! Form::text('short_description_product', null, ["class" => "form-control", "placeholder" => "Short Description", "required" => true, 'id' => 'short_description_product']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Short Description (en)</label>
                                        <div class="col-sm-12 col-md-12">
                                            {!! Form::text('short_description_en_product', null, ["class" => "form-control", "placeholder" => "Short Description", "required" => true, 'id' => 'short_description_en_product']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pb-4">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Description</label>
                                        <div class="col-sm-12 col-md-12">
                                            {!! Form::textarea("description_product", null, ["class" => "form-control summernote", "placeholder" => "Description", "required" => true, 'id' => 'description_product']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <label class="col-form-label col-sm-12 col-md-12">Description (en)</label>
                                        <div class="col-sm-12 col-md-12">
                                            {!! Form::textarea("description_en_product", null, ["class" => "form-control summernote", "placeholder" => "Description", "required" => true, 'id' => 'description_en_product']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pb-4">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Status Product *</label>
                                    {!! Form::select('status_product', ['0' => 'Reguler', '1' => 'New'], null, ["class" => "form-control select2", "required" => true, 'id' => 'status-product']) !!}
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <label>Add on</label>
                                    <div class="form-check pl-0 radio-inline">
                                        <label class="radio radio-outline">
                                            {!! Form::radio('as_addon_product', "1", null) !!}
                                            <span></span>Yes
                                        </label>
                                        <label class="radio radio-outline radio-danger">
                                            {!! Form::radio('as_addon_product', "0", true) !!}
                                            <span></span>No
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <label>Is Active *</label>
                                    <div class="form-check pl-0 radio-inline">
                                        <label class="radio radio-outline">
                                            {!! Form::radio('is_active', '1', true) !!}
                                            <span></span>Active
                                        </label>
                                        <label class="radio radio-outline radio-danger">
                                            {!! Form::radio('is_active', '0', null) !!}
                                            <span></span>Inactive
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Product Cost --}}
                    <div class="card">
                        <div class="card-header">
                            <h4 class="h4">Product Cost Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row pb-4">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="row form-group" id="product-material">
                                        <div class="col-6">
                                            <label>Currency</label>
                                            {!! Form::select('currency_uuid', $currencies, null, ["class" => "form-control select2", "required" => true, 'id' => 'currency-uuid']) !!}
                                        </div>
                                        <div class="col-6">
                                            <label>Minimum Order</label>
                                            {!! Form::number("product_minimumorder", null, ["class" => "form-control", "placeholder" => "e.g., 1000", "required" => true, 'id' => 'product_minimumorder']) !!}
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-6">
                                            <label>Cost Price</label>
                                            {!! Form::number('cost_product', null, ["class" => "form-control", "placeholder" => "e.g., 1000", "required" => true, 'id' => 'cost_product']) !!}
                                        </div>
                                        <div class="col-6">
                                            <label>Selling Price</label>
                                            {!! Form::number('selling_price_product', null, ["class" => "form-control", "placeholder" => "e.g., 1000", "required" => true, 'id' => 'selling_price_product']) !!}
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-6">
                                            <label>Florist Cost Price</label>
                                            {!! Form::number('florist_cost_product', null, ["class" => "form-control", "placeholder" => "e.g., 1000", "required" => true, 'id' => 'florist_cost_product']) !!}
                                        </div>
                                        <div class="col-6">
                                            <label>Florist Selling Price</label>
                                            {!! Form::number('selling_florist_price_product', null, ["class" => "form-control", "placeholder" => "e.g., 1000", "required" => true, 'id' => 'selling_florist_price_product']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Product Material --}}
                    <div class="card">
                        <div class="card-header">
                            <h4 class="h4">Product Material Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row pb-4">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="row form-group" id="product-material">
                                        <div class="col-12 mb-2">
                                            <h4 class="h4">Product Materials</h4>
                                        </div>
                                        <div class="col-12" id="field-product-materials">
                                            <div class="row pb-4">
                                                <div class="col-12" id="list-product-material">
                                                    <table class="table" id="row-product-materials">
                                                        <tr colspan="3"><td class="text-center">- Stock Belum Dipilih</td></tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row pb-4" id="form-product-materials">
                                                <div class="col-lg-9">
                                                    <label>Stock Name *</label>
                                                    {!! Form::select('stocks_uuid[]', $stocks, null, ["class" => "form-control", "required" => true, "id" => "stocks-uuid"]) !!}
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Qty *</label>
                                                    {!! Form::number('qty_material_uuid[]', null, ["class" => "form-control", "placeholder" => "e.g 1", "id" => "qty-material", 'min' => 0]) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <a class="btn btn-outline-success btn-block" id="button-add-product-materials">Simpan Material</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Product Images --}}
                    <div class="card">
                        <div class="card-header">
                            <h4 class="h4">Product Material Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row pb-4">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="row form-group" id="product-material">
                                        <div class="col-12">
                                            <h4 class="h4">Product Images</h4>
                                        </div>
                                        <div class="col-12" id="field-product-materials">
                                            <div class="row" id="form-product-materials">
                                                <div class="col-lg-12">
                                                    <img src="" alt="" id="product_main_image_preview" class="img-thumbnail mb-3" style="max-width:100%">
                                                    <div><label>Main Image</label></div>
                                                    <div class="custom-file">
                                                        {!! Form::file('product_main_image', ["class" => "custom-file-input", "accept" => "image/*", 'id' => 'product_main_image']) !!}
                                                        <label class="custom-file-label" for="customFile" id="product-main-image">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="row" id="form-product-materials">
                                                <div class="col-lg-4 p-4">
                                                    <img src="" alt="" id="product_image_1_preview" class="img-thumbnail mb-3" style="max-width:100%">
                                                    <div><label>Image 1</label></div>
                                                    <div class="custom-file">
                                                        {!! Form::file('product_images[]', ["class" => "custom-file-input product_images", "id" => "product_image_1", "accept" => "image/*"]) !!}
                                                        <label class="custom-file-label" for="customFile" id="product_image_label_1">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 p-4">
                                                    <img src="" alt="" id="product_image_2_preview" class="img-thumbnail mb-3" style="max-width:100%">
                                                    <div><label>Image 2</label></div>
                                                    <div class="custom-file">
                                                        {!! Form::file('product_images[]', ["class" => "custom-file-input product_images", "id" => "product_image_2", "accept" => "image/*"]) !!}
                                                        <label class="custom-file-label" for="customFile" id="product_image_label_2">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 p-4">
                                                    <img src="" alt="" id="product_image_3_preview" class="img-thumbnail mb-3" style="max-width:100%">
                                                    <div><label>Image 3</label></div>
                                                    <div class="custom-file">
                                                        {!! Form::file('product_images[]', ["class" => "custom-file-input product_images", "id" => "product_image_3", "accept" => "image/*"]) !!}
                                                        <label class="custom-file-label" for="customFile" id="product_image_label_3">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 p-4">
                                                    <img src="" alt="" id="product_image_4_preview" class="img-thumbnail mb-3" style="max-width:100%">
                                                    <div><label>Image 4</label></div>
                                                    <div class="custom-file">
                                                        {!! Form::file('product_images[]', ["class" => "custom-file-input product_images", "id" => "product_image_4", "accept" => "image/*"]) !!}
                                                        <label class="custom-file-label" for="customFile" id="product_image_label_4">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 p-4">
                                                    <img src="" alt="" id="product_image_5_preview" class="img-thumbnail mb-3" style="max-width:100%">
                                                    <div><label>Image 5</label></div>
                                                    <div class="custom-file">
                                                        {!! Form::file('product_images[]', ["class" => "custom-file-input product_images", "id" => "product_image_5", "accept" => "image/*"]) !!}
                                                        <label class="custom-file-label" for="customFile" id="product_image_label_5">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 p-4">
                                                    <img src="" alt="" id="product_image_6_preview" class="img-thumbnail mb-3" style="max-width:100%">
                                                    <div><label>Image 6</label></div>
                                                    <div class="custom-file">
                                                        {!! Form::file('product_images[]', ["class" => "custom-file-input product_images", "id" => "product_image_6", "accept" => "image/*"]) !!}
                                                        <label class="custom-file-label" for="customFile" id="product_image_label_6">Choose file</label>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <div class="form-group">
                        <a href="{{ route('bungadavi.products.index') }}" class="btn btn-secondary">Back</a>
                        {!! Form::reset('Reset', ['class' => 'btn btn-danger']) !!}
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
    <!-- /Page Header -->

</div>
@endsection

@push('js')

<!-- summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script>
    var product_materials = [];
    var form_data = [];
    var formData = new FormData();


    function getCategoriesAjaxProduct(urlAbsolute)
    {
        $.ajax({
            url : urlAbsolute,
            type : 'GET',
            success: (result) => {
                console.log(result)

                let html = "";
                result.forEach((res) => {
                    html += "<option value='"+res.id+"'>"+res.name+"</option>";
                })
                $("#categories-id").html(html);
            }
        })
    }

    function getSubCategoriesAjaxProduct(urlAbsolute)
    {
        $.ajax({
            url : urlAbsolute,
            type : 'GET',
            success: (result) => {
                console.log(result)
                let html = "";
                result.forEach((res) => {
                    html += "<option value='"+res.id+"'>"+res.name+"</option>";
                })
                $("#subcategories-id").html(html);
            }
        })
    }

    function initSelect2()
    {
        $("#categories-id").select2();
        $("#subcategories-id").select2();
        $("#currency-id").select2();
        $("#color-id").select2();
        $("#cities-id").select2();
        $("#florist_uuid").select2();
        $("#printcm_mode").select2();
        $("#stocks-uuid").select2();
    }

    function removeList(id)
    {
        product_materials.splice(product_materials.findIndex(item => item.stocks_uuid === id), 1)

        let table_row = $("#row-product-materials");
        let html = "";
            product_materials.forEach((arr) => {
                html += "<tr><td class='text-center'><a href='#' onclick='removeList(\""+arr.stocks_uuid+"\")'><span class='btn btn-danger fas fa-close'></span></a></td><td>"+ arr.stocks_name +"</td><td>"+ arr.qty +"</td></tr>";
            })

            table_row.html(html);
    }

    function uploadFiles()
    {
        var mainImage = $("#product_main_image")[0].files[0];

        formData.append("product_main_image", mainImage);

        var data = {
            florist_uuid                    : $("#florist_uuid").val(),
            printcmmode_product             : $("#printcm_mode").val(),
            name_product                    : $("#name_product").val(),
            categories_id                   : $("#categories-id").val(),
            subcategories_uuid              : $("#subcategories-id").val(),
            color_id                        : $("#color-id").val(),
            city_id                         : $("#city-id").val(),
            short_description_product       : $("#short_description_product").val(),
            short_description_en_product    : $("#short_description_en_product").val(),
            description_product             : $("#description_product").val(),
            description_en_product          : $("#description_en_product").val(),
            currency_id                     : $("#currency-uuid").val(),
            cost_product                    : $("#cost_product").val(),
            florist_cost_product            : $("#florist_cost_product").val(),
            selling_price_product           : $("#selling_price_product").val(),
            selling_florist_price_product   : $("#selling_florist_price_product").val(),
            status_product                  : $("#status-product").val(),
            as_addon_product                : $("input[name=as_addon_product]:checked").val(),
            is_active_product               : $("input[name=is_active_product]:checked").val(),
            minimum_order_product           : $("#product_minimumorder").val(),
            product_material                : JSON.stringify(product_materials),
            _token                          : $("input[name=_token]").val().trim()
        };

        for (let key in data) {
            Array.isArray(data[key])
                ? data[key].forEach(value => formData.append(key + '[]', value))
                : formData.append(key, data[key]) ;
        }

        $.ajax({
            url: "{{ route('bungadavi.products.store') }}",
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            success: function (res) {
                console.log(res);
                if (res.status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Congratulation',
                        text: 'Data has been added!',
                        timerProgressBar: true,
                    })

                    window.location.href = "{{ route('bungadavi.products.index') }}"
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                }
            },
        });
    }

    $("#form-product").submit((e) => {

        e.preventDefault();
        uploadFiles();
        // Swal.fire({
        //     title: 'Auto close alert!',
        //     html: 'I will close in <b></b> milliseconds.',
        //     // timer: 2000,
        //     timerProgressBar: true,
        //     didOpen: () => {
        //         Swal.showLoading()
        //         const b = Swal.getHtmlContainer().querySelector('b')
        //         timerInterval = setInterval(() => {
        //         b.textContent = Swal.getTimerLeft()
        //         }, 100)
        //     },
        //     willClose: () => {
        //         clearInterval(timerInterval)
        //     }
        //     }).then((result) => {
        //     /* Read more about handling dismissals below */
        //     if (result.dismiss === Swal.DismissReason.timer) {
        //         console.log('I was closed by the timer')
        //     }
        // })

        // var form_data       = new FormData($("#form-product")[0]);
        // var main_image      = $("#product_main_image")[0].files[0];
        // var feature_images  = [];
        // var materials       = product_materials;

        // $('.product_images').each((index, file) => {
        //     if (file.files.length > 0) {
        //         feature_images[index] = file.files[0]
        //     }
        // })



        // console.log(form_data)



        // $.ajax({
        //     url: "{{ route('bungadavi.products.store') }}",
        //     type: "POST",
        //     data: form_data,
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        //         // 'Content-Type': 'multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW'
        //     },
        //     cache: false,
        //     contentType: false,
        //     processData: false,
        //     success: function (response) {

        //     },
        //     error: function (xhr, message, status) {

        //     }
        // })
    })

    $("#button-add-product-materials").click(function (e) {

        product_materials.push({stocks_uuid: $("#stocks-uuid").val(), stocks_name: $("#stocks-uuid option:selected").text(), qty: ($("#qty-material").val() == "" ? 0 : $("#qty-material").val())})

        let table_row = $("#row-product-materials");
        let html = "";
            product_materials.forEach((arr) => {
                html += "<tr><td class='text-center'><a onclick='removeList(\""+arr.stocks_uuid+"\")'><i class='fa fa-times' aria-hidden='true'></i></a></td><td>"+ arr.stocks_name +"</td><td>"+ arr.qty +"</td></tr>";
            })

            table_row.html(html);
        console.log(product_materials)
    });

    $("#product_main_image").on('change', (e) => {
        let fileData = e.target.files[0];
        $("#product-main-image").text(fileData.name);

        var oFReader = new FileReader();
            oFReader.readAsDataURL(fileData);

        oFReader.onload = function(oFREvent) {
            document.getElementById("product_main_image_preview").src = oFREvent.target.result;
        };
    })

    $("#product_image_1").on('change', (e) => {
        let fileData = e.target.files[0];
        $("#product_image_label_1").text(fileData.name);

        var oFReader = new FileReader();
            oFReader.readAsDataURL(fileData);

        oFReader.onload = function(oFREvent) {
            document.getElementById("product_image_1_preview").src = oFREvent.target.result;
        };
    })

    $("#product_image_2").on('change', (e) => {
        let fileData = e.target.files[0];
        $("#product_image_label_2").text(fileData.name);

        var oFReader = new FileReader();
            oFReader.readAsDataURL(fileData);

        oFReader.onload = function(oFREvent) {
            document.getElementById("product_image_2_preview").src = oFREvent.target.result;
        };
    })

    $("#product_image_3").on('change', (e) => {
        let fileData = e.target.files[0];
        $("#product_image_label_3").text(fileData.name);

        var oFReader = new FileReader();
            oFReader.readAsDataURL(fileData);

        oFReader.onload = function(oFREvent) {
            document.getElementById("product_image_3_preview").src = oFREvent.target.result;
        };
    })

    $("#product_image_4").on('change', (e) => {
        let fileData = e.target.files[0];
        $("#product_image_label_4").text(fileData.name);

        var oFReader = new FileReader();
            oFReader.readAsDataURL(fileData);

        oFReader.onload = function(oFREvent) {
            document.getElementById("product_image_4_preview").src = oFREvent.target.result;
        };
    })

    $("#product_image_5").on('change', (e) => {
        let fileData = e.target.files[0];
        $("#product_image_label_5").text(fileData.name);

        var oFReader = new FileReader();
            oFReader.readAsDataURL(fileData);

        oFReader.onload = function(oFREvent) {
            document.getElementById("product_image_5_preview").src = oFREvent.target.result;
        };
    })

    $("#product_image_6").on('change', (e) => {
        let fileData = e.target.files[0];
        $("#product_image_label_6").text(fileData.name);

        var oFReader = new FileReader();
            oFReader.readAsDataURL(fileData);

        oFReader.onload = function(oFREvent) {
            document.getElementById("product_image_6_preview").src = oFREvent.target.result;
        };
    })

    $("#categories-id").change(function (e) {
        let categories_selected = $("#categories-id").val();
        let params = "?categoryId=" + categories_selected.toString();

        let urlSubCategories = "{{route('bungadavi.subcategories.ajax.list')}}" + params;
        getSubCategoriesAjaxProduct(urlSubCategories)
    });


    $(document).ready(function (e) {
        let urlStocks = "{{route('bungadavi.stocks.ajax.list')}}";
        getStocksAjax(urlStocks)

        let urlCategories = "{{ route('bungadavi.categories.ajax.list')}}";
        getCategoriesAjaxProduct(urlCategories)

        $('.summernote').summernote({
            height: 400
        });

        initSelect2()

    });
</script>
@endpush
