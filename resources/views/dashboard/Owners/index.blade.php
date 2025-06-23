@extends('dashboard.light.master')

@section('title')
    Learn School | The root page for Owner`s
@endsection

@section('style')
    <style>
        #preview-image-add,
        #preview-image-update {
            display: none;
            max-width: 200px;
            border: 1px solid #ccc;
            padding: 5px;
            border-radius: 10px;
            margin-top: 10px;
        }
    </style>
@endsection

@section('content')
    <!--start content-->
    <main class="page-content">

        <!--Start update Owners Modal-->
        <div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="ownersModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ownersModalLabel">Owners</h5>
                        <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                    </div>
                    <div class="modal-body">

                        <div class="container">
                            <form method="post" action="{{ route('school.dashboard.owner.update') }}"
                                enctype="multipart/form-data" id="update-form" class="update-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" id="id" value="">
                                <div class="mb-4 form-group">
                                    <label>Image: </label>
                                    <input class="form-control" type="file" name = "image" id = "image_update"
                                        accept="image/*" placeholder="Enter Image">
                                    <div class="invalid-feedback"></div>

                                    <!-- Preview image will appear here -->
                                    <div class="mb-3">
                                        <img id="preview-image-update" src="#" alt="Image Preview">
                                    </div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Username: </label>
                                    <input class="form-control" type="name" name = "username" id = "username"
                                        placeholder="Enter Username">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Email: </label>
                                    <input class="form-control" type="name" name = "email" id = "email"
                                        placeholder="Enter Email">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Enter New Password: </label>
                                    <input class="form-control" type="password" name = "password" id = "password"
                                        placeholder="Enter Password">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Confirm New Password: </label>
                                    <input class="form-control" type="password" name = "confirm_password"
                                        id = "confirm_password" placeholder="Confirm Password">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Phone: </label>
                                    <input class="form-control" type="phone" name = "phone" id = "phone"
                                        placeholder="Enter Phone">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Address: </label>
                                    <input class="form-control" type="name" name = "address" id = "address"
                                        placeholder="Enter Address">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Permission: </label>
                                    <select class="form-control" name="permission" id="permission">
                                        <option value="" selected disabled> Select Permission </option>
                                        <option value="admin"> Admin </option>
                                        <option value="user"> User </option>
                                        <option value="teacher"> Teacher </option>
                                        <option value="student"> Student </option>
                                    </select>


                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Status: </label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="" disabled> Select Status </option>
                                        <option value="active" selected> Active </option>
                                        <option value="inactive"> In-Active </option>
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
        <!--End update Owners Modal-->

        <!--Start add Owners Modal-->
        <div class="modal fade" id="add-modal" tabindex="-1" aria-labelledby="ownersModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ownersModalLabel">Owners</h5>
                        <button type="button" class="btn-close ms-0" data-bs-dismiss="modal"
                            aria-label="إغلاق"></button>
                    </div>
                    <div class="modal-body">

                        <div class="container">
                            <form method="post" action="{{ route('school.dashboard.owner.add') }}"
                                enctype="multipart/form-data" id="add-form" class="add-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" id="id" value="">
                                <div class="mb-4 form-group">
                                    <label>Image: </label>
                                    <input class="form-control" type="file" name = "image" id = "image_add"
                                        accept="image/*">

                                    <!-- Preview image will appear here -->
                                    <div class="mb-3">
                                        <img id="preview-image-add" src="#" alt="Image Preview">
                                    </div>

                                    <div class="invalid-feedback"></div>
                                </div>

                                <div class="mb-4 form-group">
                                    <label>Username: </label>
                                    <input class="form-control" type="name" name = "username" id = "username"
                                        placeholder="Enter Username">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Email: </label>
                                    <input class="form-control" type="email" name = "email" id = "email"
                                        placeholder="Enter Email">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Password: </label>
                                    <input class="form-control" type="password" name = "password" id = "password"
                                        placeholder="Enter Password">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Confirm Password: </label>
                                    <input class="form-control" type="password" name = "confirm_password"
                                        id = "confirm_password" placeholder="Confirm Password">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Phone: </label>
                                    <input class="form-control" type="phone" name = "phone" id = "phone"
                                        placeholder="Enter Phone">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Address: </label>
                                    <input class="form-control" type="name" name = "address" id = "address"
                                        placeholder="Enter Address">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Permission: </label>
                                    <select class="form-control" name="permission" id="permission">
                                        <option value="" selected disabled> Select Permission </option>
                                        <option value="admin"> Admin </option>
                                        <option value="user"> User </option>
                                        <option value="teacher"> Teacher </option>
                                        <option value="student"> Student </option>
                                    </select>


                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-4 form-group">
                                    <label>Status: </label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="" disabled> Select Status </option>
                                        <option value="active" selected> Active </option>
                                        <option value="inactive"> In-Active </option>
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
        <!--End add Owners Modal-->

        <!--start Owners row-->
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header bg-transparent text-center">
                        <div class="row g-3 align-items-center justify-content-center">
                            <div class="col-auto">
                                <h5 class="mb-0">All Owners</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary col-12" data-bs-toggle="modal" data-bs-target="#add-modal">
                            Adding new Owners
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!--end Owners row-->

        <!--start data-table row-->
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header bg-transparent text-center">
                        <div class="row g-3 align-items-center justify-content-center">
                            <div class="col-auto">
                                <h5 class="mb-0">All Owners</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>#ID</th>
                                        <th>Image</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Permission</th>
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
        <!--end data-table row-->

    </main>
    <!--end page main-->

@stop

@section('js')
    <script>
        // <For shown image:></For>
        // Preview for Add Form
        document.getElementById('image_add').addEventListener('change', function() {
            const file = this.files[0];
            const preview = document.getElementById('preview-image-add');

            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    preview.src = reader.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        });

        // Preview for Update Form
        document.getElementById('image_update').addEventListener('change', function() {
            const file = this.files[0];
            const preview = document.getElementById('preview-image-update');

            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    preview.src = reader.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        });
        // </For shown image:></For>

        var table;
        $(document).ready(function() {
            table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,

                ajax: {
                    url: '{{ route('school.dashboard.owner.getdata') }}',
                },

                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'image',
                        name: 'image',
                        title: 'Image',
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: 'username',
                        name: 'username',
                        title: 'Username',
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
                        data: 'phone',
                        name: 'phone',
                        title: 'Phone',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'address',
                        name: 'address',
                        title: 'Address',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'permission',
                        name: 'permission',
                        title: 'Permission',
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
                        title: 'Actions',
                        orderable: false,
                        searchable: false,
                    },
                ],
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

        $(document).ready(function() {
            $(document).on('click', '.update_btn', function(e) {
                e.preventDefault();
                var button = $(this);
                var id = button.data('id');
                var username = button.data('username');
                var email = button.data('email');
                var phone = button.data('phone');
                var address = button.data('address');
                var permission = button.data('permission');
                var status = button.data('status');

                $('#id').val(id);
                $('#username').val(username);
                $('#email').val(email);
                $('#phone').val(phone);
                $('#address').val(address);
                $('#permission').val(permission);
                $('#status').val(status);

                var image = button.data('image'); // أضفه هنا
                var previewPath = '/uploads/owners/' + image; // غيّر المسار حسب الحاجة
                $('#preview-image-update').attr('src', previewPath).show();

            });
        });
    </script>
@endsection
