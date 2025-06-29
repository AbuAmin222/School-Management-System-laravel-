@extends('dashboard.light.master')

@section('title')
    Learn School | The root page for Teachers
@endsection

@section('content')
    <!--start content-->
    <main class="page-content">
        <!--Start Teachers Add Modal-->
        <div class="modal fade btn-add" id="add-modal" tabindex="-1" aria-labelledby="teachersModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="stagesModalLabel">Teachers Add</h5>
                        <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                    </div>
                    <form method="post" action="{{ route('school.dashboard.teacher.add') }}" id="add-form"
                        class="add-form">

                        <div class="modal-body">
                            <div class="container">
                                <input type="hidden" id="id" name="id" value="">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="mb-4 form-group">
                                    <label>Name: </label>
                                    <input class="form-control" name = "name" placeholder="Enter Name">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Email: </label>
                                    <input class="form-control" type="email" name = "email"
                                        placeholder="Enter your Email">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Phone: </label>
                                    <input class="form-control" name = "phone" placeholder="Enter your Phone">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Specialization: </label>
                                    <input class="form-control" name = "specialization" placeholder="Enter Specialization">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Date-of-Birth: </label>
                                    <input class="form-control" type="date" name = "date_of_birth"
                                        placeholder="Enter Date-of-Birth">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Hire-Date: </label>
                                    <input class="form-control" type="date" name = "hire_date"
                                        placeholder="Enter Hire-Date">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Qualification: </label>
                                    <select class="form-control" name="qualification" id="qualification">
                                        <option value="" selected disabled>Select Qualification</option>
                                        <option value="diploma">Diploma</option>
                                        <option value="bachelors">Bachelors</option>
                                        <option value="master">Master</option>
                                        <option value="doctora">Doctora</option>
                                    </select>
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">
                                    <label>Gender: </label>
                                    <select class="form-control" name = "gender">
                                        <option value="" selected disabled>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <div class="invalid-feedback"></div>


                                </div>
                                <div class="mb-4 form-group">
                                    <label>Status: </label>
                                    <select class="form-control" name = "status">
                                        <option value="active" selected>Active</option>
                                        <option value="inactive">In-Active</option>
                                    </select>
                                    <div class="invalid-feedback"></div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-outline-success col-12 btn-add" type="submit">Insert</button>
                            <button type="button" class="btn btn-outline-secondary col-12 btn-add"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!--End Teachers Add Modal-->

        <!--Start Update Teachers Modal-->
        <div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="teachersModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="teachersModalLabel">Teacher Update</h5>
                        <button type="button" class="btn-close ms-0" data-bs-dismiss="modal"
                            aria-label="إغلاق"></button>
                    </div>
                    <form method="post" action="{{ route('school.dashboard.teacher.update') }}" id="update-form"
                        class="update-form">

                        <div class="modal-body">
                            <div class="container">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" id="id" name="id" value="">
                                <div class="mb-4 form-group">
                                    <label>Name: </label>
                                    <input class="form-control" name = "name" id = "name" placeholder="Enter Name">
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">
                                    <label>Email: </label>
                                    <input class="form-control" type="email" name = "email" id = "email"
                                        placeholder="Enter your Email">
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">

                                    <label>Phone: </label>
                                    <input class="form-control" name = "phone" id = "phone"
                                        placeholder="Enter your Phone">
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">

                                    <label>Specialization: </label>
                                    <input class="form-control" name = "specialization" id = "specialization"
                                        placeholder="Enter Specialization">
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">

                                    <label>Date-of-Birth: </label>
                                    <input class="form-control" type="date" name = "date_of_birth"
                                        id = "date_of_birth" placeholder="Enter Date-of-Birth">
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">

                                    <label>Hire-Date: </label>
                                    <input class="form-control" type="date" name = "hire_date" id = "hire_date"
                                        placeholder="Enter Hire-Date">
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">

                                    <label>Qualification: </label>
                                    <select class="form-control" name="qualification" id="qualification">
                                        <option value="" selected disabled>Select Qualification</option>
                                        <option value="diploma">Diploma</option>
                                        <option value="bachelors">Bachelors</option>
                                        <option value="master">Master</option>
                                        <option value="doctora">Doctora</option>
                                    </select>
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">

                                    <label>Gender: </label>
                                    <select class="form-control" name = "gender" id="gender">
                                        <option value="" selected disabled>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="mb-4 form-group">

                                    <label>Status: </label>
                                    <select class="form-control" name = "status" id="status">
                                        <option value="active" selected>Active</option>
                                        <option value="inactive">In-Active</option>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-outline-info col-12 btn-add" type="submit">Update</button>
                            <button type="button" class="btn btn-outline-secondary col-12 btn-add"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!--End Update Teachers Modal-->

        <!-- Start Filter Modal -->
        <div class="modal fade" id="filter-modal" tabindex="-1" aria-labelledby="teachersModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="col-12 col-lg-12 col-xl-12 d-flex">
                        <div class="card radius-10 w-100">
                            <div class="card-header bg-transparent">
                                <div class="row g-3 align-items-center">
                                    <div class="w-100 d-flex justify-content-between align-items-center">
                                        <h5 class="modal-title mb-0">TeachersFilter</h5>
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

                                    <!-- Teacher Name -->
                                    <div class="col-md-4 mb-3">
                                        <input type="text" id="search-name" class="form-control search-input"
                                            placeholder="Teacher Name">
                                    </div>

                                    <!-- Phone Number -->
                                    <div class="col-md-4 mb-3">
                                        <input type="text" id="search-phone" class="form-control search-input"
                                            placeholder="Phone Number">
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-4 mb-3">
                                        <input type="email" id="search-email" class="form-control search-input"
                                            placeholder="Email">
                                    </div>

                                    <!-- Specialization -->
                                    <div class="row-md-4 mb-3">
                                        <input type="text" id="search-specialization"
                                            class="form-control search-input" placeholder="Specialization">
                                    </div>
                                    <div class="row mb-3">
                                        <!-- Date of Birth Range -->
                                        <div class="col-md-6 mb-3">
                                            <div class="row g-2 align-items-center border p-3 rounded">
                                                <div class="col-auto">
                                                    <label for="start_date" class="form-label mb-0">DOB From:</label>
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

                                        <!-- Hire Date Range -->
                                        <div class="col-md-6 mb-3 ">
                                            <div class="row g-2 align-items-center border p-3 rounded">
                                                <div class="col-auto">
                                                    <label for="start_HireDate" class="form-label mb-0">Hire From:</label>
                                                </div>
                                                <div class="col">
                                                    <input type="date" id="search-start_HireDate"
                                                        class="form-control search-input">
                                                </div>
                                                <div class="col-auto">
                                                    <label for="end_HireDate" class="form-label mb-0">To:</label>
                                                </div>
                                                <div class="col">
                                                    <input type="date" id="search-end_HireDate"
                                                        class="form-control search-input">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Qualification -->
                                    <div class="col-md-4 mb-3">
                                        <select id="search-qualification" class="form-control search-input">
                                            <option value="" selected disabled>Select Qualification</option>
                                            <option value="diploma">Diploma</option>
                                            <option value="bachelors">Bachelors</option>
                                            <option value="master">Master</option>
                                            <option value="doctora">Doctora</option>
                                        </select>
                                    </div>

                                    <!-- Gender -->
                                    <div class="col-md-4 mb-3">
                                        <select id="search-gender" class="form-control search-input">
                                            <option value="" disabled>Select Gender</option>
                                            <option value="male" selected>Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-4 mb-3">
                                        <select id="search-status" class="form-control search-input">
                                            <option value="" disabled>Select Status</option>
                                            <option value="active" selected>Active</option>
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
                                    Filter Teacher
                                </button>
                            </div>
                            <div class="col-12 mb-3">
                                <button class="btn btn-outline-primary w-100 btn-add" data-bs-toggle="modal"
                                    data-bs-target="#add-modal">
                                    Insert Teacher
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
                                <h5 class="mb-0">All Teachers</h5>
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
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Specialization</th>
                                        <th>Date-of-Birth</th>
                                        <th>Hire-Date</th>
                                        <th>Qualification</th>
                                        <th>Gender</th>
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
                url: '{{ route('school.dashboard.teacher.getdata') }}',
                data: function(d) {
                    d.name = $('#search-name').val();
                    d.email = $('#search-email').val();
                    d.phone = $('#search-phone').val();
                    d.specialization = $('#search-specialization').val();
                    d.qualification = $('#search-qualification').val();
                    d.gender = $('#search-gender').val();
                    d.status = $('#search-status').val();
                    d.start_date = $('#search-start_date').val();
                    d.end_date = $('#search-end_date').val();
                    d.start_HireDate = $('#search-start_HireDate').val();
                    d.end_HireDate = $('#search-end_HireDate').val();

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
                    data: 'phone',
                    name: 'phone',
                    title: 'Phone',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'email',
                    name: 'email',
                    title: 'Email',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'specialization',
                    name: 'specialization',
                    title: 'Specialization',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'date_of_birth',
                    name: 'date_of_birth',
                    title: 'Date-of-Birth',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'hire_date',
                    name: 'hire_date',
                    title: 'Hire-Date',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'qualification',
                    name: 'qualification',
                    title: 'Qualification',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'gender',
                    name: 'gender',
                    title: 'Gender',
                    orderable: false,
                    searchable: false,
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
                    title: 'Action',
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

        $(document).ready(function() {
            $(document).on('click', '.update_btn', function(e) {
                e.preventDefault();
                var button = $(this);
                var id = button.data('id');
                var name = button.data('name');
                var email = button.data('email');
                var phone = button.data('phone');
                var date_of_birth = button.data('date-of-birth');
                var hire_date = button.data('hire-date');
                var qualification = button.data('qualification');
                var specialization = button.data('specialization');
                var gender = button.data('gender');
                var status = button.data('status');

                $('#id').val(id);
                $('#name').val(name);
                $('#email').val(email);
                $('#phone').val(phone);
                $('#date_of_birth').val(date_of_birth);
                $('#hire_date').val(hire_date);
                $('#qualification').val(qualification);
                $('#specialization').val(specialization);
                $('#gender').val(gender);
                $('#status').val(status);
            });
        });

        $(document).ready(function() {
            $(document).on('click', '.active-btn', function(e) {
                e.preventDefault();

                var button = $(this);
                var id = $(this).data('id');
                var url = $(this).data('url');

                swal({
                    title: "Are you sure?",
                    text: "Will Activation This Teacher",
                    icon: "warning",
                    buttons: {
                        cancel: {
                            text: "Cancel",
                            value: null,
                            visible: true,
                            className: "custom-cancle-btn",
                            closeModal: true
                        },
                        confirm: {
                            text: "Activate",
                            value: true,
                            visible: true,
                            className: "custom-confirm-btn",
                            closeModal: true
                        },
                    },
                    dangerMode: false,
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: url,
                            type: 'POST',
                            data: {
                                id: id,
                                _token: "{{ csrf_token() }}",
                            },
                            success: function(response) {
                                toastr.success(response.success);
                                table.draw();
                            },
                        });
                    } else {
                        toastr.error("Cancelled Activation");
                    }

                });

            })
        })
    </script>
@endsection
