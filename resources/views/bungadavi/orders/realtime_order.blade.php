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
                <a href="{{ route($button['link']) }}" class="btn add-btn"><i class="fa fa-plus"></i> {{ $button['name'] ?? 'Add' }}</a>
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
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-12">
                                        @foreach ($data['orderToday'] as $item)
                                            <h2 class="h4">Order ID : {{$item->order()->code_order_transaction}}</h2>
                                            @foreach ($item->order()->products()->get() as $product)
                                                {{ $product->name_product }}
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-12">
                                        @foreach ($data['ordertomorrow'] as $item)
                                            <h2 class="h4">Order ID : {{$item->order()->code_order_transaction}}</h2>
                                            @foreach ($item->order()->products()->get() as $product)
                                                {{ $product->name_product }}
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
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
