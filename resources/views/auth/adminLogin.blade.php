    @extends('layouts.guest.master')
    @section('content')
    @include('sweetalert::alert')


    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light  p-5">
                            <div class="brand-logo d-flex justify-content-center">
                                <img src="{{asset('/public/assets/admin/images/logo.png')}}">
                            </div>
                            <h4 class="text-center">Administrator login</h4>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            @if(session()->has('error'))
                            <div class="d-flex justify-content-center">
                                <div class="alert alert-danger center-block">
                                    {{ session()->get('error') }}
                                </div>
                            </div>
                            @endif
                            <h6 class="font-weight-light text-center">Sign in</h6>
                            <form class="pt-3" method="POST" action="{{ route('admin.login.store') }}">
                                @csrf
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                                    @if ($errors->has('email'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('email') }}.</strong>
                                    </span>
                                    @endif

                                </div>
                                <div class="form-group">
                                    <input name="password" required type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                                    @if ($errors->has('password'))
                                    <span class="invalid feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}.</strong>

                                    </span>
                                    @endif

                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-dark btn-lg font-weight-medium auth-form-btn" type="submit">SIGN IN</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input" name="remember"> Remember me </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="auth-link text-black">Forgot password?</a>
                                    @endif
                                </div>
                                {{-- <div class="mb-2">
                                    <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                                        <i class="icon-social-facebook mr-2"></i>Connect using facebook </button>
                                </div> --}}
                                <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="{{ route('register') }}" class="text-primary">Create</a>
                                </div>
                                {{-- <div class="form-group row">
                                    <a href="{{route('login.google')}}" class="btn btn-danger btn-block btn-sm">Login with <i class="icon-social-google"></i></a>
                                    <a href="{{route('login.facebook')}}" class="btn btn-primary btn-block btn-sm">Login with <i class="icon-social-facebook"></i></a>
                                    <a href="{{route('login.github')}}" class="btn btn-dark btn-block btn-sm">Login with <i class="icon-social-github"></i></a>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    @endsection
