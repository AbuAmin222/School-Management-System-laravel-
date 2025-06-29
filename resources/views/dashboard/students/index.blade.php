@extends('dashboard.light.master')

@section('title')
    Learn School | The root page for Student`s
@endsection

@section('content')
    <!--start content-->
    <main class="page-content">

        <!--Start edit student Modal-->
        <div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="studentsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="studentsModalLabel">Update Students</h5>
                        <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                    </div>
                    <div class="modal-body">

                        <div class="container">
                            <form method="post" action="{{ route('school.dashboard.student.update') }}" id="update-form"
                                class="update-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" id="id" value="">
                                <div class="mb-4 form-group">
                                    <label>First-Name: </label>
                                    <input class="form-control" type = "name" name = "first_name"
                                        placeholder="Enter First-Name">
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">
                                    <label>Parent-Name: </label>
                                    <input class="form-control" type = "name" name = "parent_name"
                                        placeholder="Enter Parent-Name">
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">
                                    <label>Last-Name: </label>
                                    <input class="form-control" type = "name" name = "last_name"
                                        placeholder="Enter Last-Name">
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">
                                    <label>Parent-Phone: </label>
                                    <input class="form-control" type = "phone" name = "parent_phone"
                                        placeholder="Enter Parent-Phone">
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">
                                    <label>Date-of-Birth: </label>
                                    <input class="form-control" type="date" name = "date_of_birth"
                                        placeholder="Enter Date-of-Birth">
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">
                                    <label>Email: </label>
                                    <input class="form-control" type = "email" name = "email" placeholder="Enter Email">
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">
                                    <label>New Password: </label>
                                    <input class="form-control" type = "password" name = "new_password"
                                        placeholder="Enter New Password">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Confirm New Password: </label>
                                    <input class="form-control" type = "password" name = "confirm_password"
                                        placeholder="Confirm New Password">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Section: </label>
                                    <select class="form-control" name="section" id="section">
                                        <option value="" selected disabled>Select section</option>
                                        @foreach ($sections as $section)
                                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">
                                    <label>Grade: </label>
                                    <select class="form-control" name="grade" id="grade">
                                        <option value="" selected disabled>Select Grade</option>
                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">
                                    <label>Gender: </label>
                                    <select class="form-control" name="gender" id="gender">
                                        <option value="" selected disabled>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <div class="invalid-feedback"></div>

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
        <!--End edit student Modal-->

        <!--Start add student Modal-->
        <div class="modal fade" id="add-modal" tabindex="-1" aria-labelledby="studentsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="studentsModalLabel">Students</h5>
                        <button type="button" class="btn-close ms-0" data-bs-dismiss="modal"
                            aria-label="إغلاق"></button>
                    </div>
                    <div class="modal-body">

                        <div class="container">
                            <form method="post" action="{{ route('school.dashboard.student.add') }}" id="add-form"
                                class="add-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" id="id" value="">
                                <div class="mb-4 form-group">
                                    <label>First-Name: </label>
                                    <input class="form-control" type = "name" name = "first_name"
                                        placeholder="Enter First-Name">
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">
                                    <label>Parent-Name: </label>
                                    <input class="form-control" type = "name" name = "parent_name"
                                        placeholder="Enter Parent-Name">
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">
                                    <label>Last-Name: </label>
                                    <input class="form-control" type = "name" name = "last_name"
                                        placeholder="Enter Last-Name">
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">
                                    <label>Parent-Phone: </label>
                                    <input class="form-control" type = "phone" name = "parent_phone"
                                        placeholder="Enter Parent-Phone">
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">
                                    <label>Date-of-Birth: </label>
                                    <input class="form-control" type="date" name = "date_of_birth"
                                        placeholder="Enter Date-of-Birth">
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">
                                    <label>Email: </label>
                                    <input class="form-control" type = "email" name = "email" placeholder="Enter Email">
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">
                                    <label>Password: </label>
                                    <input class="form-control" type = "password" name = "password"
                                        placeholder="Enter Password">
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">
                                    <label>Section: </label>
                                    <select class="form-control" name="section" id="section">
                                        <option value="" selected disabled>Select section</option>
                                        @foreach ($sections as $section)
                                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">
                                    <label>Grade: </label>
                                    <select class="form-control" name="grade" id="grade">
                                        <option value="" selected disabled>Select Grade</option>
                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">
                                    <label>Gender: </label>
                                    <select class="form-control" name="gender" id="gender">
                                        <option value="" selected disabled>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
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
        <!--End add student Modal-->

        <!--Start add student by excel Modal-->
        <div class="modal fade" id="import-modal" tabindex="-1" aria-labelledby="studentsModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="studentsModalLabel">Import Students excel source file</h5>
                        <button type="button" class="btn-close ms-0" data-bs-dismiss="modal"
                            aria-label="إغلاق"></button>
                    </div>
                    <div class="modal-body">

                        <div class="container">
                            <form method="post" action="{{ route('school.dashboard.student.import') }}"
                                id="import-form" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="mb-4 form-group">
                                    <label>Excel file: </label>
                                    <input type="file" class="form-control" name = "excel-data" id = "excel-data"
                                        placeholder="Enter Excel file source">
                                    <div class="invalid-feedback"></div>

                                </div>
                                <button class="btn btn-outline-success col-12" type="submit">Import</button>
                            </form>


                        </div>

                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary col-12" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--End add student by excel Modal-->

        <!-- Start Filter Modal -->
        <div class="modal fade" id="filter-modal" tabindex="-1" aria-labelledby="studentsModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="col-12 col-lg-12 col-xl-12 d-flex">
                        <div class="card radius-10 w-100">
                            <div class="card-header bg-transparent">
                                <div class="row g-3 align-items-center">
                                    <div class="w-100 d-flex justify-content-between align-items-center">
                                        <h5 class="modal-title mb-0">Stident Filters</h5>
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

                                    <!-- First Name -->
                                    <div class="col-md-4 mb-3">
                                        <input type="text" id="search-first_name" class="form-control search-input"
                                            placeholder="First Name">
                                    </div>
                                    <!-- Parent Name -->
                                    <div class="col-md-4 mb-3">
                                        <input type="text" id="search-parent_name" class="form-control search-input"
                                            placeholder="Parent Name">
                                    </div>
                                    <!-- Last Name -->
                                    <div class="col-md-4 mb-3">
                                        <input type="text" id="search-last_name" class="form-control search-input"
                                            placeholder="Last Name">
                                    </div>

                                    <!-- Parent Phone Number -->
                                    <div class="col-md-4 mb-3">
                                        <input type="text" id="search-phone" class="form-control search-input"
                                            placeholder="Parent Phone Number">
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-4 mb-3">
                                        <input type="email" id="search-email" class="form-control search-input"
                                            placeholder="Email">
                                    </div>

                                    <!-- Date of Birth Range -->
                                    <div class="row-md-6 mb-3">
                                        <div class="row g-2 align-items-center border p-3 rounded">
                                            <div class="w-100 text-center mb-2 fw-bold">Date of Birth</div>
                                            <div class="col-auto">
                                                <label for="start_date" class="form-label mb-0">From:</label>
                                            </div>
                                            <div class="col">
                                                <input type="date" id="search-start_date"
                                                    class="form-control search-input">
                                            </div>
                                            <div class="col-auto">
                                                <label for="end_date" class="form-label mb-0">To:</label>
                                            </div>
                                            <div class="col">
                                                <input type="date" id="search-end_date"
                                                    class="form-control search-input">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Section-ID -->
                                    <div class="col-md-4 mb-3">
                                        <select id="search-section" class="form-control search-input">
                                            <option value="" selected disabled>Select Section</option>
                                            @foreach ($sections as $section)
                                                <option value="{{ $section->id }}">Section {{ $section->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Grade-ID -->
                                    <div class="col-md-4 mb-3">
                                        <select id="search-grade" class="form-control search-input">
                                            <option value="" selected disabled>Select Grade</option>
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Gender -->
                                    <div class="col-md-4 mb-3">
                                        <select id="search-gender" class="form-control search-input">
                                            <option value="" selected disabled>Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
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


        <!--start actions row-->
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
                                    Filter Student
                                </button>
                            </div>
                            <div class="col-12 mb-3">
                                <button class="btn btn-outline-primary w-100 btn-add" data-bs-toggle="modal"
                                    data-bs-target="#add-modal">
                                    Insert New Student
                                </button>
                            </div>
                            <div class="col-12 mb-3">
                                <button class="btn btn-outline-primary w-100 btn-add" data-bs-toggle="modal"
                                    data-bs-target="#import-modal">
                                    Insert New Students by Excel file
                                </button>
                            </div>
                            <div class="col-12 mb-3">
                                <a href="{{ route('school.dashboard.student.export') }}" class="btn btn-outline-primary w-100">
                                    Install Excel Template
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end actions row-->

        <!--start data-table row-->
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header bg-transparent text-center">
                        <div class="row g-3 align-items-center justify-content-center">
                            <div class="col-auto">
                                <h5 class="mb-0">All Students</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>#ID</th>
                                        <th>Full-Name</th>
                                        <th>Parent-Phone</th>
                                        <th>Date-of-Birth</th>
                                        <th>Email</th>
                                        <th>Section-ID</th>
                                        <th>Grade-ID</th>
                                        <th>Gender</th>
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
                    url: '{{ route('school.dashboard.student.getdata') }}',
                    data: function(d) {
                        d.first_name = $('#search-first_name').val();
                        d.parent_name = $('#search-parent_name').val();
                        d.last_name = $('#search-last_name').val();
                        d.phone = $('#search-phone').val();
                        d.email = $('#search-email').val();
                        d.start_date = $('#search-start_date').val();
                        d.end_date = $('#search-end_date').val();
                        d.section_id = $('#search-section').val();
                        d.grade_id = $('#search-grade').val();
                        d.gender = $('#search-gender').val();
                    }

                },

                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'full_name',
                        name: 'full_name',
                        title: 'Full-Name',
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: 'parent_phone',
                        name: 'parent_phone',
                        title: 'Parent-Phone',
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: 'date_of_birth',
                        name: 'date_of_birth',
                        title: 'Date-of-Birth',
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: 'email',
                        name: 'email',
                        title: 'Email',
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: 'section_id',
                        name: 'section_id',
                        title: 'Section',
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
                        data: 'gender',
                        name: 'gender',
                        title: 'Gender',
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
            let first_name = $(this).data('first_name');
            let parent_name = $(this).data('parent_name');
            let last_name = $(this).data('last_name');
            let parent_phone = $(this).data('parent_phone');
            let date_of_birth = $(this).data('date_of_birth');
            let email = $(this).data('email');
            let section = $(this).data('section');
            let grade = $(this).data('grade');
            let gender = $(this).data('gender');

            $('#update-form [name="id"]').val(id);
            $('#update-form [name="first_name"]').val(first_name);
            $('#update-form [name="parent_name"]').val(parent_name);
            $('#update-form [name="last_name"]').val(last_name);
            $('#update-form [name="parent_phone"]').val(parent_phone);
            $('#update-form [name="date_of_birth"]').val(date_of_birth);
            $('#update-form [name="email"]').val(email);
            $('#update-form [name="section"]').val(section);
            $('#update-form [name="grade"]').val(grade);
            $('#update-form [name="gender"]').val(gender);

            $('#update-modal').modal('show');

        });

        $(document).ready(function() {
            $('#import-form').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        swal('Success!', response.success, 'success');
                        $('#import-form')[0].reset();
                    },
                    error: function(response) {
                        swal('Error!', response.error, 'error');
                        console.error(responseText);
                    }
                });
            });
        });

    </script>
@endsection
