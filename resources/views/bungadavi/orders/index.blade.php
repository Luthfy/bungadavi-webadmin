@extends('layouts.admin')

@section('body')
<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">{{ $title ?? '' }}</h3>
                <ul class="breadcrumb">
                    @foreach ($breadcrumb as $key => $br)
                        <li class="breadcrumb-item">{{ $br }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                @if (auth()->user()->hasRole('bungadavi'))
                    <a href="{{ route($button['link']) }}" class="btn add-btn"><i class="fa fa-plus"></i> {{ $button['name'] ?? 'Add' }}</a>
                @endif
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    @include('commons.message')

    <div class="row">
        <div class="col-sm-12">
            <div class="card mb-0">
                <div class="card-header">
                    <h4 class="card-title mb-0">{{ $subtitle ?? '' }}</h4>
                    <p class="card-text">
                        {{ $description ?? '' }}
                    </p>
                </div>
                <div class="card-body">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link" id="home-tab" data-toggle="tab" href="#newOrder" role="tab" aria-controls="newOrder" aria-selected="true">New Order</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#progressOrder" role="tab" aria-controls="progressOrder" aria-selected="false">Progress Order</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#cancelOrder" role="tab" aria-controls="cancelOrder" aria-selected="false">Cancel Order</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="newOrder" role="tabpanel" aria-labelledby="newOrder-tab">
                            <div class="table-responsive">
                                {!! $dataTable->table(['class' => 'datatable table table-stripped mb-0'], true) !!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="progressOrder" role="tabpanel" aria-labelledby="progressOrder-tab">

                        </div>
                        <div class="tab-pane fade" id="cancelOrder" role="tabpanel" aria-labelledby="cancelOrder-tab">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('js')
    <!-- Datatable JS -->
    <script src="{{ asset('theme_be/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme_be/js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('/vendor/datatables/buttons.server-side.js') }}"></script>

    {!! $dataTable->scripts() !!}

@endpush
