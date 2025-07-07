<!doctype html>
<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('dashboard/asset/images/favicon-32x32.png') }}" type="image/png" />
    <!-- Bootstrap CSS -->
    <!-- public\dashboard\asset\css\bootstrap.min.css -->
    <link href="{{ asset('dashboard/asset/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/asset/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/asset/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/asset/css/icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.js') }}delivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css') }}">

    <!-- loader-->
    <link href="{{ asset('dashboard/asset/css/pace.min.css') }}" rel="stylesheet" />

    <title>Learn-School - Login</title>
</head>

<body>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    <!--start wrapper-->
    <div class="wrapper">

        <!--start content-->
        <main class="authentication-content">
            <div class="container-fluid">
                <div class="authentication-card">
                    <div class="card shadow rounded-0 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                                <img src="{{ asset('dashboard/asset/images/error/login-img.jpg') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body p-4 p-sm-5">
                                    <h5 class="card-title">Sign In</h5>
                                    <p class="card-text mb-5">See your growth and get consulting support!</p>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="d-grid">
                                            <a class="btn btn-white radius-30" href="javascript:;"><span
                                                    class="d-flex justify-content-center align-items-center">
                                                    <img class="me-2"
                                                        src="{{ asset('dashboard/asset/images/icons/search.svg') }}"
                                                        width="16" alt="">
                                                    <span>Sign in with Google</span>
                                                </span>
                                            </a>
                                        </div>

                                        <div class="login-separater text-center mb-4"> <span>OR SIGN IN WITH
                                                EMAIL</span>
                                            <hr>
                                        </div>
                                        <div class="row g-3">
                                            <!-- Email Address -->
                                            <div>
                                                <x-input-label for="email" :value="__('Email Address')" />
                                                <x-text-input id="email" icon="bi bi-envelope-fill" class="w-full"
                                                    type="email" name="email" :value="old('email')" required
                                                    autocomplete="username" placeholder="Email Address" />
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>

                                            <!-- Password -->
                                            <div class="mt-4">
                                                <x-input-label for="password" :value="__('Enter Password')" />

                                                <x-text-input id="password" class="block mt-1 w-full" type="password"
                                                    name="password" required autocomplete="current-password"
                                                    placeholder="Enter Password" />

                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>

                                            <!-- Remember Me -->
                                            <div class="row mt-4 align-items-center">
                                                <div class="col-6">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" name="remember"
                                                            id="remember_me" checked=""
                                                            {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="remember_me">
                                                            {{ __('Remember me') }}
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <a href="{{ route('password.request') }}">
                                                        {{ __('Forgot Password ?') }}
                                                    </a>
                                                </div>
                                            </div>


                                            <x-primary-button class="ms-3">
                                                {{ __('Sign in') }}
                                            </x-primary-button>

                                            <div class="col-12">
                                                <p class="mb-0">Don't have an account yet? <a
                                                        href="{{ route('sign_up') }}">Sign up here</a></p>
                                            </div>
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

    </div>
    <!--end wrapper-->


    <!--plugins-->
    <script src="{{ asset('dashboard/asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/asset/js/pace.min.js') }}"></script>


</body>

</html>
