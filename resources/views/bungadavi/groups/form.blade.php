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
    <!-- /Page Header -->
    @if ($data == null)
        {!! Form::open(['route' => 'bungadavi.groups.store', 'method' => 'POST']) !!}
    @else
        {!! Form::model($data, ['route' => ['bungadavi.groups.update', ['group' => $data->id]], 'method' => 'PUT']) !!}
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
                        <label class="col-form-label col-sm-12 col-md-12">Group Position Name <span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-12">
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <h4 class="mb-0">Access for this Group</h4>
                        <hr>
                    </div>

                    @forelse ($menu as $g)
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label>
                                <strong>{{ $g->name_group ?? '' }}</strong>
                            </label>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12">
                            @forelse ($g->hasMenu()->get() as $m)
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <label class="col-form-label col-sm-12 col-md-2">{{ $m->name_menu ?? '' }}</label>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="row ml-lg-3 ml-md-3">
                                        @forelse ($m->hasSubmenu()->get() as $sm)
                                        <div class="checkbox mx-3 my-1">
                                            <label>
                                                @if ($data == null)
                                                    {!! Form::checkbox('menus[]', $sm->uuid ?? '', false) !!} {{ $sm->name_submenu ?? '' }}
                                                @else
                                                    @php
                                                        $checked = false;
                                                        foreach ($data->hasRoleMenu()->get() as $key => $value) {
                                                            if ($sm->uuid == $value->submenu_uuid)
                                                            {
                                                                $checked = true;
                                                                break;
                                                            }
                                                        }
                                                    @endphp

                                                    {!! Form::checkbox('menus[]', $sm->uuid ?? '', $checked ?? false) !!} {{ $sm->name_submenu ?? '' }}
                                                @endif

                                            </label>
                                        </div>
                                        @empty

                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                            </div>

                            @empty

                            @endforelse
                        </div>
                    </div>
                    @empty

                    @endforelse

                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <a href="{{ route('bungadavi.groups.index') }}" class="btn btn-secondary">Back</a>
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


</script>
@endpush
