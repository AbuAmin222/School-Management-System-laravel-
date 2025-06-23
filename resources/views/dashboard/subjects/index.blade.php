@extends('dashboard.light.master')

@section('title')
    Learn School|The root page for Subjects
@endsection

@section('content')
    <!--start content-->
    <main class="page-content">

        <!--Start Update Subject Modal-->
        <div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="stagesModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="stagesModalLabel">Editting Subjects</h5>
                        <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                    </div>
                    <div class="modal-body">

                        <div class="container">
                            <form method="post" action="{{ route('school.dashboard.subject.update') }}" id="update-form"
                                class="update-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" id = "id" value="">
                                <div class="mb-4 form-group">
                                    <label>Title: </label>
                                    <input class="form-control" name = "title">
                                </div>
                                <div class="mb-4 form-group">
                                    <div class="mb-3">
                                        <label for="book">Current Book:</label><br>
                                        <a id="current-book-link" href="#" target="_blank"
                                            class="btn btn-outline-primary btn-sm">View Current Book</a>
                                    </div>
                                    <label>Book: </label>
                                    <input type="file" class="form-control" name="book" id="book"
                                        accept=".pdf,.doc,.docx,.epub,.mobi,.txt">
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Teacher: </label>
                                    <select class="form-control" name="teacher_id" id="teacher_id">
                                        <option value="" selected disabled>Select teacher</option>
                                        @foreach ($TData as $TName)
                                            <option value="{{ $TName->id }}">{{ $TName->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Grade: </label>
                                    <select class="form-control" name="grade_id" id="grade_id">
                                        <option value="" selected disabled>Select grade</option>
                                        @foreach ($GData as $GName)
                                            <option value="{{ $GName->id }}">{{ $GName->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <button class="btn btn-outline-success col-12" type="submit">Update</button>

                            </form>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary col-12" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--End Update Subject Modal-->

        <!--Start Adding Subject Modal-->
        <div class="modal fade" id="add-modal" tabindex="-1" aria-labelledby="stagesModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="stagesModalLabel">Adding Subjects</h5>
                        <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                    </div>
                    <div class="modal-body">

                        <div class="container">
                            <form method="post" action="{{ route('school.dashboard.subject.add') }}" id="add-form"
                                class="add-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="mb-4 form-group">
                                    <label>Title: </label>
                                    <input class="form-control" name = "title">
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Book: </label>
                                    <input type="file" class="form-control" name="book" id="book"
                                        accept=".pdf,.doc,.docx,.epub,.mobi,.txt">
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Teacher: </label>
                                    <select class="form-control" name="teacher_id" id="teacher_id">
                                        <option value="" selected disabled>Select teacher</option>
                                        @foreach ($TData as $TName)
                                            <option value="{{ $TName->id }}">{{ $TName->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Grade: </label>
                                    <select class="form-control" name="grade_id" id="grade_id">
                                        <option value="" selected disabled>Select grade</option>
                                        @foreach ($GData as $GName)
                                            <option value="{{ $GName->id }}">{{ $GName->name }}</option>
                                        @endforeach
                                    </select>

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
        <!--End Adding Subject Modal-->

        <!--start Adding scroll row-->
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header bg-transparent text-center">
                        <div class="row g-3 align-items-center justify-content-center">
                            <div class="col-auto">
                                <h5 class="mb-0">Add Subjects</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary col-12" data-bs-toggle="modal" data-bs-target="#add-modal">
                            Adding new subject
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->

        <!--start showing table row-->
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header bg-transparent text-center">
                        <div class="row g-3 align-items-center justify-content-center">
                            <div class="col-auto">
                                <h5 class="mb-0">View All Subjects</h5>
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
                                        <th>Book</th>
                                        <th>Teacher</th>
                                        <th>Grade</th>
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
                url: '{{ route('school.dashboard.subject.getdata') }}',
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
                    data: 'book',
                    name: 'book',
                    title: 'Book',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'teacher_id',
                    name: 'teacher_id',
                    title: 'Teacher',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'grade_id',
                    name: 'grade_id',
                    title: 'Grade',
                    orderable: true,
                    searchable: true,
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
        $(document).on('click', '.edit-btn', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            let title = $(this).data('title');
            let book = $(this).data('book');
            let teacher_id = $(this).data('teacher_id');
            let grade_id = $(this).data('grade_id');

            $('#update-form [name="id"]').val(id);
            $('#update-form [name="title"]').val(title);
            $('#teacher_id').val(teacher_id);
            $('#grade_id').val(grade_id);

            // عرض رابط الكتاب الحالي
            let bookUrl = '/uploads/books/' + book;
            $('#current-book-link').attr('href', bookUrl).text(book).show();

            // إظهار المودال
            $('#update-modal').modal('show');
        });
    </script>
@endsection
