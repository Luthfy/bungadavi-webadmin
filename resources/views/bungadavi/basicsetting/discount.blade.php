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
        {!! Form::open(['route' => 'bungadavi.discount.store', 'method' => 'POST']) !!}
    @else
        {!! Form::model($data, ['route' => ['bungadavi.discount.update', ['discount' => $data->uuid]], 'method' => 'PUT']) !!}
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
                        <label class="col-form-label col-sm-12 col-md-2">Promotion <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('promo_uuid',$promotion, null,['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Title <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Title English <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('title_en', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Description <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Description English <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::textarea('description_en', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Voucher Code <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('voucher_code', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    @if ($data == null)
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Voucher Start Date<span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::input('date','voucher_start_date', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Voucher Start Time <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::input('time','voucher_start_time', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Voucher End Date <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::input('date','voucher_end_date', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Voucher End Time <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::input('time','voucher_end_time', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    @else
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Voucher Start Date <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            <input type="text" class="form-control" id="datepicker" name="voucher_start_date"  value="<?= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->voucher_start_date)->format('m/d/Y') ?>"/>
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Voucher Start Time <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            <input type="time" class="form-control" name="voucher_start_time"  value="<?= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->voucher_start_date)->format('H:i:s') ?>"/>
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Voucher End Date <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            <input type="text" class="form-control" id="datepicker" name="voucher_end_date"  value="<?= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->voucher_end_date)->format('m/d/Y') ?>"/>
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Voucher End Time <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            <input type="time" class="form-control" name="voucher_end_time"  value="<?= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->voucher_end_date)->format('H:i:s') ?>"/>
                        </div>
                    </div>
                    @endif
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Discount Type <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('discount_type', array('1' => 'Percent', '0' => 'Cashback'),null,['class' => 'form-control'] );!!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Discount Value <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::number('discount_value', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Discount Max <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::number('discount_max', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Minimal Bill <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::number('minbill', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Action By Guest <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('action_by_guest', array('1' => 'Yes', '0' => 'No'),null,['class' => 'form-control'] );!!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Quota <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::number('quota', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Payment Category <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('payment_category', array('0' => 'Bank Transfer','1' => 'Virtual Account','2' => 'Internet Banking','3' => 'Credit Card/Virtual Card','4' => 'Another/Gerai'),null,['class' => 'form-control'] );!!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">Payment Type <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('payment_type_id', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">TNC<span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::textarea('tnc', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-form-label col-sm-12 col-md-2">TNC English <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::textarea('tnc_en', null, ['class' => 'form-control']) !!}
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
                        <a href="{{ route('bungadavi.discount.index') }}" class="btn btn-secondary">Back</a>
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

@endpush
