@extends('layouts.bungadavi')

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
                    <div class="row">
                        <div class="col-6">
                            @foreach ($data['orderToday'] as $item)
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-12">
                                        <h3 class="h5">{{ $item->order()->first()->code_order_transaction }}</h3>
                                        @foreach($item->order()->first()->products()->get() as $prod)
                                        <div class="row mt-4">
                                            <div class="col-4">
                                                <img src="{{ url('storage/'.$prod->product()->first()->image_main_product) }}" alt="">
                                            </div>
                                            <div class="col-8">
                                                <h5 class="h5">{{ $prod->name_product }}</h5>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-6">
                            <div class="card">
                                @foreach ($data['orderTomorrow'] as $item)
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-12">
                                        <h3 class="h5">{{ $item->order()->first()->code_order_transaction }}</h3>
                                        @foreach($item->order()->first()->products()->get() as $prod)
                                        <div class="row mt-4">
                                            <div class="col-4">
                                                <img src="{{ url('storage/'.$prod->product()->first()->image_main_product) }}" alt="" style="max-width:100px;">
                                            </div>
                                            <div class="col-8">
                                                <h5 class="h5">{{ $prod->name_product }}</h5>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('js')


@endpush
