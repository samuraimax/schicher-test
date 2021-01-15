@extends('layouts.nomenu')

@section('content')
<!-- Page Content -->
<div class="hero-static d-flex align-items-center">
    <div class="w-100">
        <!-- Sign In Section -->
        <div class="bg-white">
            <div class="content content-full">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4 py-4">
                        <!-- Header -->
                        <div class="text-center">
                            <p class="mb-2">
                                <i class="fa fa-2x fa-circle-notch text-primary"></i>
                            </p>
                            <h1 class="h4 mb-1">
                                Sign In
                            </h1>
                            <h2 class="h6 font-w400 text-muted mb-3">
                                A perfect match for your project
                            </h2>
                        </div>
                        <!-- END Header -->

                        <!-- Sign In Form -->
                        <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                        <form class="js-validation-signin" action="{{ route('backend.user.selecttent') }}" method="POST">
                            <div class="py-3">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg form-control-alt" id="login-username" name="login-username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg form-control-alt" id="login-password" name="login-password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <div class="d-md-flex align-items-md-center justify-content-md-between">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="login-remember" name="login-remember">
                                            <label class="custom-control-label font-w400" for="login-remember">Remember Me</label>
                                        </div>
                                        <div class="py-2">
                                            <a class="font-size-sm font-w500" href="op_auth_reminder2.php">Forgot Password?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center mb-0">
                                <div class="col-md-6 col-xl-5">
                                    <button type="submit" class="btn btn-block btn-primary">
                                        <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Sign In
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- END Sign In Form -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END Sign In Section -->

        <!-- Footer -->
        <div class="font-size-sm text-center text-muted py-3">
            <strong>Schicher 1.0.0 @ 2021</strong> &copy; <span data-toggle="year-copy"></span>
        </div>
        <!-- END Footer -->
    </div>
</div>
<!-- END Page Content -->
@endsection

@section('js_after')
<script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script>
        jQuery(".js-validation-signin").validate({
          rules:{
                "login-username":{required:!0},
                "login-password":{required:!0,minlength:4}
              },
            messages:{
              "login-username":{
                required:"Please enter a username",
                minlength:"Your username must consist of at least 3 characters"
              },
              "login-password":{
                required:"Please provide a password",
                minlength:"Your password must be at least 5 characters long"
              }
            },
            submitHandler: function() { checkLogin(); }
        });

        function checkLogin(){
            const dataForm = jQuery(".js-validation-signin").serialize()+"&_token="+window.Laravel.csrfToken;
            jQuery.post("{{ route('backend.auth.checklogin') }}",dataForm,function name(params) {
                window.location = "{{ route('backend.user.selecttent') }}";
            }).fail(function name(params){
                One.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: 'Username Or Password.'});
            });
        }
    </script>
@endsection
