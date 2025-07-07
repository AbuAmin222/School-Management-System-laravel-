<!doctype html>
<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('dashboard/asset/images/favicon-32x32.png') }}" type="image/png" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('dashboard/asset/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/asset/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/asset/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/asset/css/icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css') }}">

    <!-- loader-->
    <link href="{{ asset('dashboard/asset/css/pace.min.css') }}" rel="stylesheet" />

    <title>Learn-School - Login</title>
</head>

<body class="bg-surface">

    <!--start wrapper-->
    <div class="wrapper">

        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-white rounded-0 border-bottom">
                <div class="container">
                    <a class="navbar-brand" href="#"><img
                            src="{{ asset('dashboard/asset/images/brand-logo-2.png') }}" width="140"
                            alt="" /></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mb-lg-0 align-items-center">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;">About</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                                    data-bs-toggle="dropdown">
                                    Services <i class="bi bi-chevron-down align-middle ms-2"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;">Contact Us</a>
                            </li>
                        </ul>

                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                                    data-bs-toggle="dropdown">
                                    English
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;">Support</a>
                            </li>
                        </ul>
                        <div class="d-flex ms-3 gap-3">
                            <a href="{{ route('login') }}" class="btn btn-white btn-sm px-4 radius-30">Login</a>
                            <a href="#" class="btn btn-primary btn-sm px-4 radius-30">Register</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <!--start content-->
        <main class="authentication-content">
            <div class="container">
                <div class="mt-4">
                    <div class="card rounded-0 overflow-hidden shadow-none bg-white border">
                        <div class="row g-0">
                            <div
                                class="col-12 order-1 col-xl-8 d-flex align-items-center justify-content-center border-end">
                                <img src="{{ asset('dashboard/asset/images/error/auth-img-register3.png') }}"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="col-12 col-xl-4 order-xl-2">
                                <div class="card-body p-4 p-sm-5">
                                    <h5 class="card-title">Signing Up</h5>
                                    <form method="post" action="{{ route('register') }}" enctype="multipart/form-data"
                                        id="add-form" class="add-form">
                                        <!-- Token -->
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <!-- Image -->
                                        <div class="mb-4 form-group">
                                            <label for="inputImage" class="form-label">Image: </label>
                                            <input class="form-control radius-30 ps-5" type="file" name = "image"
                                                id = "image_add" accept="image/*">

                                            <!-- Preview image will appear here -->
                                            <div class="mb-3">
                                                <img id="preview-image-add" src="#" alt="Image Preview"
                                                    class="shadow rounded-pill border border-danger p-1"
                                                    style="max-width: 200px; display: none;">
                                            </div>

                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <!-- Username -->
                                        <div class="mb-4 form-group">
                                            <label for="inputUsername" class="form-label">Username:
                                            </label>
                                            <input class="form-control radius-30 ps-5" type="username"
                                                name = "username" id = "username" placeholder="Enter Username">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <!-- Email -->
                                        <div class="mb-4 form-group">
                                            <label for="inputEmail" class="form-label">Email: </label>
                                            <input class="form-control radius-30 ps-5" type="email" name = "email"
                                                id = "email" placeholder="Enter Email">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <!-- Password -->
                                        <div class="mb-4 form-group">
                                            <label for="inputPassword" class="form-label">Password: </label>
                                            <input class="form-control radius-30 ps-5" type="password"
                                                name = "password" id = "password" placeholder="Enter Password">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <!-- Confirm Password -->
                                        <div class="mb-4 form-group">
                                            <label for="inputConfirmPassword" class="form-label">Confirm Password:
                                            </label>
                                            <input class="form-control radius-30 ps-5" type="password"
                                                name = "confirm_password" id = "confirm_password"
                                                placeholder="Confirm Password">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <!-- Phone -->
                                        <div class="mb-4 form-group">
                                            <label for="inputPhone" class="form-label">Phone: </label>
                                            <input class="form-control radius-30 ps-5" type="phone" name = "phone"
                                                id = "phone" placeholder="Enter Phone">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <!-- Address -->
                                        <div class="mb-4 form-group">
                                            <label for="inputAddress" class="form-label">Address: </label>
                                            <input class="form-control radius-30 ps-5" type="text"
                                                name = "address" id = "address" placeholder="Enter Address">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <!-- Gender -->
                                        <div class="mb-4 form-group">
                                            <label for="inputGender" class="form-label">Gender: </label>
                                            <select class="form-control radius-30 ps-5" name="gender"
                                                id="gender">
                                                <option value="" disabled selected> Select Gender </option>
                                                <option value="male"> Male </option>
                                                <option value="female"> Female </option>
                                            </select>
                                            <div class="invalid-feedback"></div>

                                        </div>
                                        <!-- Permission-user (Hidden) -->
                                        <div class="mb-4 form-group" hidden>
                                            <label for="inputPermission" class="form-label">Permission: </label>
                                            <select class="form-control radius-30 ps-5" name="permission"
                                                id="permission">
                                                <option value="" selected disabled> Select Permission
                                                </option>
                                                <option value="admin"> Admin </option>
                                                <option value="user" selected> User </option>
                                                <option value="teacher"> Teacher </option>
                                                <option value="student"> Student </option>
                                            </select>


                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div>
                                            <div class="col-12">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckChecked" name="TermsConditions">
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">
                                                        IAgree to the Trems & Conditions
                                                    </label>
                                                    <div class="invalid-feedback"></div>

                                                </div>
                                            </div>
                                            <div class="col-12 d-grid">
                                                <button class="btn btn-primary radius-30" type="submit">Sign
                                                    Up</button>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center">
                                            <p class="mb-0">Already have an account? <a
                                                    href="{{ route('login') }}">Sign in
                                                    here</a></p>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!--end page main-->

        <footer class="bg-white border-top p-3 text-center">
            <p class="mb-0">Copyright © 2021. All right reserved.</p>
        </footer>

    </div>
    <!--end wrapper-->


    <!-- Bootstrap bundle JS -->
    <script src="{{ asset('dashboard/asset/js/bootstrap.bundle.min.js') }}"></script>

    <!--plugins-->
    <script src="{{ asset('dashboard/asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/asset/js/pace.min.js') }}"></script>

    <script>
        // <For shown image:>
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
        // </For>
        $('.add-form').on('submit', function(e) {
            e.preventDefault();
            var data = new FormData(this);
            var url = $(this).attr('action');
            var type = $(this).attr('method');
            $.ajax({
                url: url,
                type: type,
                processData: false,
                contentType: false,
                data: data,
                success: function(res) {
                    if (res.error) {
                        swal("error", res.error, "error");
                        return;
                    }
                    $('#add-modal').modal('hide');
                    $('#add-form').trigger("reset");
                    toastr.success(res.success);
                    table.draw();
                },
                error: function(data) {
                    if (data.status === 422) {
                        var response = data.responseJSON;
                        $.each(response.errors, function(key, value) {
                            var str = (key.split("."));
                            if (str[1] === '0') {
                                key = str[0] + '[]';
                            }
                            $('[name="' + key + '"], [name="' + key + '[]"]').addClass(
                                'is-invalid');
                            $('[name="' + key + '"], [name="' + key + '[]"]').closest(
                                '.form-group').find('.invalid-feedback').html(value[0]);
                        });
                    } else {
                        console.log('Unexpected Error');
                    }
                }

            });

        });
    </script>
</body>

</html>
