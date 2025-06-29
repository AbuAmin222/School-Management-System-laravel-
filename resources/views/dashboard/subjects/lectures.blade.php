@extends('dashboard.light.master')

@section('title')
    Learn School|The root page for Course-Lectures
@endsection

@section('content')
    <!--start content-->
    <main class="page-content">

        {{-- <!--Start Update Subject Modal-->
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
        <!--End Adding Subject Modal--> --}}

        <!-- Start Filter Modal -->
        <div class="modal fade" id="filter-modal" tabindex="-1" aria-labelledby="teachersModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="col-12 col-lg-12 col-xl-12 d-flex">
                        <div class="card radius-10 w-100">
                            <div class="card-header bg-transparent">
                                <div class="row g-3 align-items-center">
                                    <div class="w-100 d-flex justify-content-between align-items-center">
                                        <div class="col-auto text-center w-100">
                                            <h5 class="modal-title mb-0">
                                                Lectures filtering for
                                                <i>
                                                    <span class="text-danger">
                                                        {{ $subject_data->title }}
                                                    </span>
                                                </i>
                                                course.
                                            </h5>
                                        </div>
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

                                    <!-- Teacher Name -->
                                    <div class="col-md-4 mb-3">
                                        <select name="teacher" id="search-teacher_name" class="form-control search-input">
                                            <option value="" selected disabled> Select Teacher </option>
                                            @foreach ($teacher_data as $teacher)
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
                        <div class="row">
                            <div class="col-12 mb-3">
                                <button class="btn btn-outline-primary w-100 btn-filter" data-bs-toggle="modal"
                                    data-bs-target="#filter-modal">
                                    Filter Subject
                                </button>
                            </div>
                        </div>
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
                                <h5 class="mb-0">
                                    View all lectures for
                                    <b><i><span class="text-success">{{ $subject_data->title }}</span></i></b>
                                </h5>
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
                                        <th>Lecture link</th>
                                        <th>Teacher</th>
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
                url: '{{ route('school.dashboard.subject.getdata.lectures') }}',
                data: function(d) {
                    d.id = {{ $subject_data->id }};
                    d.title = $('#search-title').val();
                    d.describtion = $('#search-describtion').val();
                    d.teacher_name = $('#search-teacher_name').val();
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
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'lecture_link',
                    name: 'lecture_link',
                    title: 'Lecture link',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'teacher',
                    name: 'teacher',
                    title: 'Teacher',
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
