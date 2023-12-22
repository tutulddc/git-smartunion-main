<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gymove - Fitness Bootstrap Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend') }}/images/favicon.png">
    <link href="{{ asset('backend') }}/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form bg-black rounded">
                                    <h4 class="text-center mb-4 text-white">Sign in your account</h4>

                                    <form  action="{{ route('admin.login.confirm') }}" method="POST">
                                        {{-- @method('POST') --}}
                                        @csrf
                                        {{-- <div class="form-group">
                                            <input type="hidden" name="user_type" value="{{ $users_info->user_type }}">
                                        </div> --}}
                                        <div class="form-group">
                                            <input type="hidden" name="department" value="{{ $users_info->department }}">
                                        </div>
                                        <div class="form-group">
                                            {{-- <span class="text-success"><h3>Welcome!! {{ $users_info->department }}</h3></span> --}}
                                            <h4 class="text-center mb-4 text-danger">{{ $users_info->department }}</h4>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Name</strong></label>
                                            <input type="text" name="name" class="form-control" >
                                        </div>

                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <a class="text-white" href="page-forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-white text-black btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                    {{-- <div class="mt-3">
                                        @if (session('exist'))
                                            <div class="alert alert-danger">{{ session('exist') }}</div>
                                        @endif
                                    </div> --}}
                                    <div class="new-account mt-3">
                                        <p class="text-white">Don't have an account? <a class="text-white" href="{{ asset('backend') }}/page-register.html">Sign up</a></p>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('backend') }}/vendor/global/global.min.js"></script>
	<script src="{{ asset('backend') }}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('backend') }}/js/custom.min.js"></script>
    <script src="{{ asset('backend') }}/js/deznav-init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




@if (session('exist'))
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '{{ session('exist') }}',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
@endif


</body>

</html>
