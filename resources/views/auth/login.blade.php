@extends('layouts.app')

@section('content')
<main class="main-content  mt-0">
    <section>
    <div class="page-header min-vh-100">
        <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
            <div class="card card-plain">
                <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-info text-gradient">Welcome</h3>
                <p class="mb-0">Enter your email and password to login</p>
                </div>
                <div class="card-body">
                <form method="POST" id="form-login" role="form" enctype="multipart/form-data" autocomplete="off">
                    <label>Email</label>
                    <div class="mb-3">
                    <input type="search" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                        <div class="input-group" id="show_hide_password">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required
                                data-parsley-errors-container="#parsley-error-password">
                            <span class="input-group-text"><a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a></span>
                        </div>
                        <div id="parsley-error-password"></div>
                    </div>
                    <div class="text-center">
                    <input type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0" value="Login">
                    <a href="register" class="btn bg-gradient-primary w-100 mt-4 mb-0">Register</a>
                    </div>
                </form>
                </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('{{request()->getSchemeAndHttpHost().'/img/img-login.jpg'}}')"></div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
</main>
@endsection
