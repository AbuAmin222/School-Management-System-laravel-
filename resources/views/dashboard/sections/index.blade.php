@extends('dashboard.light.master')

@section('title')
    Learn School | The root page for sections
@endsection

@section('content')
    <!--start content-->
    <main class="page-content">

        <!--Start Grade Modal-->
        <div class="modal fade" id="add-modal" tabindex="-1" aria-labelledby="sectionsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="stagesModalLabel">Sections</h5>
                        <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                    </div>
                    <div class="modal-body">

                        <div class="container">
                            <form method="post" action="{{ route('school.dashboard.section.add') }}" id="add-form"
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

        <!-- Start Filter Modal -->
        <div class="modal fade" id="filter-modal" tabindex="-1" aria-labelledby="sectionsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="col-12 col-lg-12 col-xl-12 d-flex">
                        <div class="card radius-10 w-100">
                            <div class="card-header bg-transparent">
                                <div class="row g-3 align-items-center">
                                    <div class="w-100 d-flex justify-content-between align-items-center">
                                        <h5 class="modal-title mb-0">Sections Filter</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">

                                    <!-- Section Name -->
                                    <div class="col-md-4 mb-3">
                                        <select id="search-name" class="form-control search-input">
                                            <option value="" selected disabled>Select Section</option>
                                            @foreach ($data as $section)
                                                <option value="{{ $section->name }}">Section {{ $section->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-4 mb-3">
                                        <select id="search-status" class="form-control search-input">
                                            <option value="" selected disabled>Select Status</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">In-Active</option>
                                        </select>
                                    </div>

                                </div>
                                <!-- Buttons -->
                                <div class="d-flex justify-content-end gap-2 mb-3">
                                    <button type="submit" id="search-btn"
                                        class="btn btn-outline-success col-6">Search</button>
                                    <button type="reset" id="clean-btn"
                                        class="btn btn-outline-secondary col-6">Clean</button>
                                </div>

                                <button type="button" class="btn btn-outline-secondary col-12 btn-add"
                                    data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Filter Modal -->


        <!--start row-->
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header bg-transparent text-center">
                        <div class="row g-3 align-items-center justify-content-center">
                            <div class="col-auto">
                                <h5 class="mb-0">Actions</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <button class="btn btn-outline-primary w-100 btn-filter" data-bs-toggle="modal"
                                    data-bs-target="#filter-modal">
                                    Filter Section
                                </button>
                            </div>
                            <div class="col-12 mb-3">
                                <button class="btn btn-outline-primary w-100 btn-add" data-bs-toggle="modal"
                                    data-bs-target="#add-modal">
                                    Insert Section
                                </button>
                            </div>
                        </div>
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
        var table;
        $(document).ready(function() {
            table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,

                ajax: {
                    url: '{{ route('school.dashboard.section.getdata') }}',
                    data: function(d) {
                        d.name = $('#search-name').val();
                        d.status = $('#search-status').val();
                    }

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

        });

        $(document).ready(function() {
            $(document).on('change', '.active-section-switch', function(e) {
                var id = $(this).data('id');
                var status = $(this).data('status');
                e.preventDefault();
                $.ajax({
                    url: "{{ route('school.dashboard.section.changestatus') }}",
                    type: 'post',
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'id': id,
                        'status': status,
                    },
                    success: function(res) {
                        toastr.success(res.success);
                        table.draw();
                    },
                    error: function(res) {
                        toastr.error(res.error);
                    }
                });
            })
        });
    </script>
@endsection
