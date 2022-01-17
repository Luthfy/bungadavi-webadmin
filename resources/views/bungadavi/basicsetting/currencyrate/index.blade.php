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
                @if ($button['link'] != null)
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

                    <div class="table-responsive">
                        {!! $dataTable->table(['class' => 'datatable table table-stripped mb-0'], true) !!}
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

    <script>
        function updateCurrencyStatus(id, status)
        {
            Swal.fire({
                title: 'Are you sure?',
                text: "You will "+ (status == 0 ? "Unactivated" : "Activated" ) +" this currency rate!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Change it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('bungadavi/basicsetting/currencyrate/status') }}" + "/" + id,
                        type: 'POST',
                        dataType: 'json',
                        data : JSON.stringify({"id" : id, "status" : status}),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        contentType: 'application/json',
                        success: function (result) {
                            Swal.fire(
                                'Success!',
                                'Your Currency Rate has been changed.',
                                'success'
                            );

                            if ($('#datatablesserverside').length > 0) {
                                $('#datatablesserverside').DataTable().ajax.reload();
                            } else {
                                window.location.reload()
                            }
                        },
                    });

                }
            })
        }
    </script>

@endpush
