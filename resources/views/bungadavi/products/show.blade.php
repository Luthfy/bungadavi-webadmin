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

    <div class="row">
        <div class="col-lg-12 col-xl-12">

            <div class="card">
                <div class="card-body">
                    <div class="col-12 mb-1">
                        <div class="row">
                            <div class="col-3">
                                <img src="{{ asset('storage') . '/' . $data->image_main_product }}" alt="{{ $data->code_product }}" class="img-thumbnails" style="max-width: 100%;">
                            </div>
                            <div class="col-9">
                                <h5 class="h3">{{ ucfirst($data->name_product) }} {{ $data->code_product != null ? "(" . Str::upper($data->code_product) . ")" : "" }}</h5>
                                <div class="col-12 row">
                                    <span class="badge bg-primary text-white m-1">Size Varian {{ $data->size_product }}</span>
                                    <span class="badge bg-secondary text-white m-1">Color Varian {{ $data->size_product }}</span>
                                </div>
                                <div class="col-12 row">
                                    @foreach ($data->hasCategory()->get() as $item)
                                        <span class="badge bg-secondary text-white m-1">Category {{ $item->category()->first()->name }}</span>
                                    @endforeach
                                    @foreach ($data->hasSubCategory()->get() as $item)
                                        <span class="badge bg-secondary text-white m-1">Sub Category {{ $item->subcategories()->first()->name }}</span>
                                    @endforeach
                                    {{-- <span class="badge bg-secondary text-white m-1">Category {{ $data->category()->first()->name }}</span>
                                    <span class="badge bg-secondary text-white m-1">Sub Category {{ $data->subcategory()->first()->name }}</span>
                                    <span class="badge bg-secondary text-white m-1">{{ $data->status_product }}</span> --}}
                                    {{-- <span class="badge bg-secondary text-white m-1">Card Message {{ $data->printcmmode_product }}</span>  --}}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row pt-2">
                            <div class="col-12 pb-2">
                                <h3 class="h3">Short Description Product</h3>
                            </div>
                            <div class="col-12">
                                <blockquote>{!! $data->short_description_product !!}</blockquote>
                                <blockquote><i>{!! $data->short_description_en_product !!}</i></blockquote>
                            </div>
                            <div class="col-12 pb-2">
                                <h3 class="h3">Description Product</h3>
                            </div>
                            <div class="col-12">
                                <blockquote>{!! $data->description_product !!}</blockquote>
                                <blockquote><i>{!! $data->description_en_product !!}</i></blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-b-20">Image Product</h5>
                    <div class="row">
                        @forelse (json_decode($data->images_product) as $key => $item)
                        <div class="col-md-3 col-sm-4 col-lg-4 col-xl-3">
                            <div class="uploaded-box">
                                <div class="uploaded-img">
                                    <img src="{{ asset('storage') . '/' . $item }}" class="img-fluid" alt="{{$data->name_product}}">
                                </div>
                                <div class="uploaded-img-name">
                                        {{ $data->name_product . ' ' .'(' . ++$key . ')' }}
                                </div>
                            </div>
                        </div>
                        @empty

                        @endforelse

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-b-20">Product Material</h5>
                    <ul class="files-list">
                    @forelse ($data->materials as $item)
                        <li>
                            <div class="files-cont">
                                <div class="file-type">
                                    <img src="{{ asset('storage').'/'.$item->stock()->first()->image_stock ?? 'products_main/default.jpg' }}" alt="{{ $item->stock()->first()->name_stock ?? '-' }}" style="max-height: 80px">
                                </div>
                                <div class="files-info">
                                    <span class="file-name text-ellipsis"><a href="#">{{ $item->stock()->first()->name_stock }}</a></span>
                                    <div class="file-size">Stock Used : {{ $item->qty_used_products_material ?? '-' }} </div>
                                </div>
                                <ul class="files-action">
                                    <li class="dropdown dropdown-action">
                                        <a href="" class="dropdown-toggle btn btn-link" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_horiz</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="javascript:void(0)">Delete</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @empty
                        <li>
                            <div class="files-cont">

                            </div>
                        </li>
                    @endforelse
                    </ul>
                </div>
            </div>

            <div class="project-task">
                <ul class="nav nav-tabs nav-tabs-top nav-justified mb-1">
                    <li class="nav-item"><a class="nav-link active" href="#all_reference" data-toggle="tab" aria-expanded="true">All Varian Reference</a></li>
                    <li class="nav-item"><a class="nav-link" href="#all_colors" data-toggle="tab" aria-expanded="false">Color Reference</a></li>
                    <li class="nav-item"><a class="nav-link" href="#all_size" data-toggle="tab" aria-expanded="false">Size References</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="all_reference">
                        <div class="row justify-content-end mb-4 mx-2">
                            <a href="javascript:void(0)" class="btn add-btn" id="btn-add-all-reference">Add Product Link Reference</a>
                        </div>
                        <div class="reference_wrapper">
                            <div class="card">
                                <div class="card-body">
                                    a
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="all_colors">
                        <div class="reference_wrapper">
                            <div class="card">
                                <div class="card-body">
                                    b
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="all_size">
                        <div class="reference_wrapper">
                            <div class="card">
                                <div class="card-body">
                                    c
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

</div>

<!-- Modal -->
<div class="modal fade" id="product-link-reference" tabindex="-1"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product Reference</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-12">
                <div class="form-group">
                    <input type="search" name="" id="input-search-product-reference" class="form-control">
                    <hr>
                </div>
                <div class="table-responsive" id="list-products">

                </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>

<!-- Assign Leader Modal -->
{{-- <div id="product-link-reference" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assign Leader to this project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group m-b-30">
                    <input placeholder="Search to add a leader" class="form-control search-input" type="text">
                    <span class="input-group-append">
                        <button class="btn btn-primary">Search</button>
                    </span>
                </div>
                <div>
                    <ul class="chat-user-list">
                        <li>
                            <a href="#">
                                <div class="media">
                                    <span class="avatar"><img alt="" src="assets/img/profiles/avatar-09.jpg"></span>
                                    <div class="media-body align-self-center text-nowrap">
                                        <div class="user-name">Richard Miles</div>
                                        <span class="designation">Web Developer</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <span class="avatar"><img alt="" src="assets/img/profiles/avatar-10.jpg"></span>
                                    <div class="media-body align-self-center text-nowrap">
                                        <div class="user-name">John Smith</div>
                                        <span class="designation">Android Developer</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <span class="avatar">
                                        <img alt="" src="assets/img/profiles/avatar-16.jpg">
                                    </span>
                                    <div class="media-body align-self-center text-nowrap">
                                        <div class="user-name">Jeffery Lalor</div>
                                        <span class="designation">Team Leader</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="submit-section">
                    <button class="btn btn-primary submit-btn">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- /Assign Leader Modal -->

{{--
<!-- Assign User Modal -->
<div id="assign_user" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assign the user to this project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group m-b-30">
                    <input placeholder="Search a user to assign" class="form-control search-input" type="text">
                    <span class="input-group-append">
                        <button class="btn btn-primary">Search</button>
                    </span>
                </div>
                <div>
                    <ul class="chat-user-list">
                        <li>
                            <a href="#">
                                <div class="media">
                                    <span class="avatar"><img alt="" src="assets/img/profiles/avatar-09.jpg"></span>
                                    <div class="media-body align-self-center text-nowrap">
                                        <div class="user-name">Richard Miles</div>
                                        <span class="designation">Web Developer</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <span class="avatar"><img alt="" src="assets/img/profiles/avatar-10.jpg"></span>
                                    <div class="media-body align-self-center text-nowrap">
                                        <div class="user-name">John Smith</div>
                                        <span class="designation">Android Developer</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <span class="avatar">
                                        <img alt="" src="assets/img/profiles/avatar-16.jpg">
                                    </span>
                                    <div class="media-body align-self-center text-nowrap">
                                        <div class="user-name">Jeffery Lalor</div>
                                        <span class="designation">Team Leader</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="submit-section">
                    <button class="btn btn-primary submit-btn">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Assign User Modal -->

<!-- Edit Project Modal -->
<div id="edit_project" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Project Name</label>
                                <input class="form-control" value="Project Management" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Client</label>
                                <select class="select">
                                    <option>Global Technologies</option>
                                    <option>Delta Infotech</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Start Date</label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>End Date</label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Rate</label>
                                <input placeholder="$50" class="form-control" value="$5000" type="text">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <select class="select">
                                    <option>Hourly</option>
                                    <option selected>Fixed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Priority</label>
                                <select class="select">
                                    <option selected>High</option>
                                    <option>Medium</option>
                                    <option>Low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Add Project Leader</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Team Leader</label>
                                <div class="project-members">
                                    <a class="avatar" href="#" data-toggle="tooltip" title="Jeffery Lalor">
                                        <img alt="" src="assets/img/profiles/avatar-16.jpg">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Add Team</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Team Members</label>
                                <div class="project-members">
                                    <a class="avatar" href="#" data-toggle="tooltip" title="John Doe">
                                        <img alt="" src="assets/img/profiles/avatar-02.jpg">
                                    </a>
                                    <a class="avatar" href="#" data-toggle="tooltip" title="Richard Miles">
                                        <img alt="" src="assets/img/profiles/avatar-09.jpg">
                                    </a>
                                    <a class="avatar" href="#" data-toggle="tooltip" title="John Smith">
                                        <img alt="" src="assets/img/profiles/avatar-10.jpg">
                                    </a>
                                    <a class="avatar" href="#" data-toggle="tooltip" title="Mike Litorus">
                                        <img alt="" src="assets/img/profiles/avatar-05.jpg">
                                    </a>
                                    <span class="all-team">+2</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="4" class="form-control" placeholder="Enter your message here"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Upload Files</label>
                        <input class="form-control" type="file">
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Project Modal --> --}}
@endsection

@push('js')
<script>
    $("#btn-add-all-reference").click(function (e) {
        $("#product-link-reference").modal()
    });

    $("#button-add-product-materials").click(function (e) {
        let html = $("#field-product-materials").html();
        $("#field-product-materials").append(html)
    });

    $("#categories-id").change(function (e) {
        let urlSubCategories = "{{url('admin/basicsetting/subcategory/ajax')}}" + "?category-id=" + $("#categories-id").val();
        getSubCategoriesAjax(urlSubCategories)
    });

    $(document).ready(function (e) {
        let urlStocks = "{{url('admin/stocks/ajax')}}";
        getStocksAjax(urlStocks)

        let urlCategories = "{{url('admin/basicsetting/category/ajax')}}";
        getCategoriesAjax(urlCategories)
    });
</script>
@endpush
