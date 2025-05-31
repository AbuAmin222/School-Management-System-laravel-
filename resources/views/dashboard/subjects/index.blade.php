@extends('dashboard.light.master')

@section('title')
    Learn School | The root page for level`s
@endsection

@section('content')
    <!--start content-->
    <main class="page-content">

        <!--Start Grade Modal-->
        <div class="modal fade" id="add-modal" tabindex="-1" aria-labelledby="stagesModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="stagesModalLabel">Sections</h5>
                        <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                    </div>
                    <div class="modal-body">

                        <div class="container">
                            <form method="post" action="{{ route('school.dashboard.teatcher.add') }}" id="add-form"
                                class="add-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="mb-4">
                                    <label>Number of sections: </label>
                                    <input class="form-control" name = "count_section">
                                </div>
                                <button class="btn btn-outline-success col-12" type="submit">Insert</button>

                            </form>


                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary col-12" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--End Grade Modal-->

        <!--start row-->
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header bg-transparent text-center">
                        <div class="row g-3 align-items-center justify-content-center">
                            <div class="col-auto">
                                <h5 class="mb-0">All Sections</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary col-12" data-bs-toggle="modal" data-bs-target="#add-modal">
                            View the acadimec levels
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->

        <!--start row-->
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header bg-transparent text-center">
                        <div class="row g-3 align-items-center justify-content-center">
                            <div class="col-auto">
                                <h5 class="mb-0">All Sections</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>#ID</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->

    </main>
    <!--end page main-->

@stop

@section('js')
    <script>
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,

            ajax: {
                url: '{{ route('school.dashboard.section.getdata') }}',
            },

            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'name',
                    name: 'name',
                    title: 'Name',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'status',
                    name: 'status',
                    title: 'Status',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'action',
                    name: 'action',
                    title: 'Actions',
                    orderable: false,
                    searchable: false,
                },
            ],
            // Arabic language
            // language:{
            //     url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json',
            // },
            //
        });
    </script>
@endsection
