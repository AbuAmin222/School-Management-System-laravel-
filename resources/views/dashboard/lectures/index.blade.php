@extends('dashboard.light.master')

@section('title')
    Learn School | The root page for lecture`s
@endsection

@section('content')
    <!--start content-->
    <main class="page-content">

        <!--Start update lectures Modal-->
        <div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="lecturesModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lecturesModalLabel">Lectures</h5>
                        <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                    </div>
                    <div class="modal-body">

                        <div class="container">
                            <form method="post" action="{{ route('school.dashboard.lecture.update') }}" id="update-form"
                                class="update-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" id="id" value="">
                                <div class="mb-4 form-group">
                                    <label>Title: </label>
                                    <input class="form-control" type="name" name = "title" id = "title"
                                        placeholder="Enter Title">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Describtion: </label>
                                    <input class="form-control" type="text" name = "describtion" id = "describtion"
                                        placeholder="Enter Describtion">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Link: </label>
                                    <input class="form-control" type="name" name = "link" id = "link"
                                        placeholder="Enter Link">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Subject: </label>
                                    <select class="form-control" name="subject_id" id="subject_id">
                                        <option value="" selected disabled> Select Subject </option>
                                        @foreach ($data as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">
                                    <label>Teacher: </label>
                                    <select class="form-control" name="teacher" id="teacher">
                                        <option value="" selected disabled> Select Teacher </option>
                                        @foreach ($dataTeacher as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback"></div>

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
        <!--End update Lectures Modal-->

        <!--Start add lectures Modal-->
        <div class="modal fade" id="add-modal" tabindex="-1" aria-labelledby="lecturesModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lecturesModalLabel">Lectures</h5>
                        <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                    </div>
                    <div class="modal-body">

                        <div class="container">
                            <form method="post" action="{{ route('school.dashboard.lecture.add') }}" id="add-form"
                                class="add-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" id="id" value="">
                                <div class="mb-4 form-group">
                                    <label>Title: </label>
                                    <input class="form-control" type="name" name = "title" id = "title"
                                        placeholder="Enter Title">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Describtion: </label>
                                    <input class="form-control" type="text" name = "describtion" id = "describtion"
                                        placeholder="Enter Describtion">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Link: </label>
                                    <input class="form-control" type="name" name = "link" id = "link"
                                        placeholder="Enter Link">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Subject: </label>
                                    <select class="form-control" name="subject_id" id="subject_id">
                                        <option value="" selected disabled> Select Subject </option>
                                        @foreach ($data as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">
                                    <label>Teacher: </label>
                                    <select class="form-control" name="teacher" id="teacher">
                                        <option value="" selected disabled> Select Teacher </option>
                                        @foreach ($dataTeacher as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback"></div>

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
        <!--End add Lectures Modal-->

        <!-- Start Filter Modal -->
        <div class="modal fade" id="filter-modal" tabindex="-1" aria-labelledby="lecturesModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="col-12 col-lg-12 col-xl-12 d-flex">
                        <div class="card radius-10 w-100">
                            <div class="card-header bg-transparent">
                                <div class="row g-3 align-items-center">
                                    <div class="w-100 d-flex justify-content-between align-items-center">
                                        <h5 class="modal-title mb-0">Lectures Filter</h5>
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

                                    <!-- Title -->
                                    <div class="col-md-4 mb-3">
                                        <input type="text" id="search-title" class="form-control search-input"
                                            placeholder="Title">
                                    </div>

                                    <!-- Describtion -->
                                    <div class="col-md-4 mb-3">
                                        <input type="text" id="search-describtion" class="form-control search-input"
                                            placeholder="Describtion">
                                    </div>

                                    <!-- Link -->
                                    <div class="col-md-4 mb-3">
                                        <input type="text" id="search-link" class="form-control search-input"
                                            placeholder="Link">
                                    </div>

                                    <!-- Subject -->
                                    <div class="col-md-6 mb-3">
                                        <select id="search-subject_id" class="form-control search-input">
                                            <option value="" selected disabled>Select Subjects</option>
                                            @foreach ($data as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Teachers -->
                                    <div class="col-md-6 mb-3">
                                        <select id="search-teacher" class="form-control search-input">
                                            <option value="" selected disabled>Select Teachers</option>
                                            @foreach ($dataTeacher as $teacher)
                                                <option value="{{ $teacher->name }}">{{ $teacher->name }}</option>
                                            @endforeach
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
                                    Filter Lectures
                                </button>
                            </div>
                            <div class="col-12 mb-3">
                                <button class="btn btn-outline-primary w-100 btn-add" data-bs-toggle="modal"
                                    data-bs-target="#add-modal">
                                    Insert Lectures
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->

        <!--start data-table row-->
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header bg-transparent text-center">
                        <div class="row g-3 align-items-center justify-content-center">
                            <div class="col-auto">
                                <h5 class="mb-0">All Lectures</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>#ID</th>
                                        <th>Title</th>
                                        <th>Describtion</th>
                                        <th>Link</th>
                                        <th>Subject</th>
                                        <th>Teachers</th>
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
        <!--end data-table row-->

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
                    url: '{{ route('school.dashboard.lecture.getdata') }}',
                    data: function(d) {
                        d.title = $('#search-title').val();
                        d.describtion = $('#search-describtion').val();
                        d.link = $('#search-link').val();
                        d.subject_id = $('#search-subject_id').val();
                        d.teacher = $('#search-teacher').val();
                    }

                },

                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'title',
                        name: 'title',
                        title: 'Title',
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: 'describtion',
                        name: 'describtion',
                        title: 'Describtion',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'link',
                        name: 'link',
                        title: 'Link',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'subject_id',
                        name: 'subject_id',
                        title: 'Subject',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'teacher',
                        name: 'teacher',
                        title: 'Teachers',
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
        $(document).on('click', '.edit-btn', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            let title = $(this).data('title');
            let describtion = $(this).data('describtion');
            let link = $(this).data('link');
            let subject_id = $(this).data('subject_id');

            $('#update-form [name="id"]').val(id);
            $('#update-form [name="title"]').val(title);
            $('#update-form [name="describtion"]').val(describtion);
            $('#update-form [name="link"]').val(link);
            $('#update-form [name="subject_id"]').val(subject_id);

            $('#update-modal').modal('show');

        });
    </script>
@endsection
