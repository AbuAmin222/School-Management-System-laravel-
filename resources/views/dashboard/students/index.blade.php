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

        <!--start adding row-->
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
                        <button class="btn btn-primary col-12" data-bs-toggle="modal" data-bs-target="#add-modal">
                            Adding new student
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!--end adding row-->

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
    </script>
@endsection
