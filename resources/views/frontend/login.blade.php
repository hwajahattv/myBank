@extends('frontend.master')
@section('style')
<style>
    html {
        background-color: #000056;
    }

    * {
        margin: 0;
        padding: 0;
    }

    .main {
        background-color: #000056;
        padding: 20px 0px;
    }

    .icon a {

        font-size: 20px;
        color: white;

    }

    .create_Account {
        padding: 40px 0px;
        background-color: #000056;
        color: white;
        text-align: center;
    }

    .form_create h3 {
        color: #ff3a4d;

    }

    .main1 {
        padding: 50px 0px;
        background-color: #000056;

    }

    .form {
        background-color: #000056;
        text-align: center;
    }

    .form p {
        color: white;
    }

    .place1 {
        margin-top: -5px;
        margin-bottom: 20px;
        color: white;
        border: 1px solid white;
        border-radius: 0.5rem;
        background-color: #000056;
        padding: 5px 50px;
    }

    .place2::placeholder {
        color: white;
    }

    .btn2 {
        padding: 5px;
        margin-top: 20px;
        /* padding:100px 0px; */
        background-color: #ff3a4d;
        border: 1px solid transparent;
        border-radius: 10px;
        color: white;
    }

    .btn2:hover {
        /* background-color: black; */
        color: white;
    }

    .sign_in {
        padding: 10px 0px;
        color: white;
        text-align: center;
    }

    .sign_in a {

        color: #ff3a4d;
        text-decoration: none;
    }

    .forget {
        padding-bottom: 50px;
        text-align: center;
        color: white;

    }

    .forget a {
        text-decoration: none;
        color: #ff3a4d;

    }

    .modal-content {
        background-color: #000056;

    }

    .modal-title {
        color: #ff3a4d;

    }

    .da {
        color: white;
        font-size: 15px;
    }

    .btn-default {
        background-color: #ff3a4d;
        float: center;
        border: none;
        color: white;
    }

    .close {
        /* background-color: aliceblue; */
        color: white;
    }

    .alert-container {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .alert {
        width: max-content;
        font-size: 0.875rem;
        padding: 0.875rem 0.875rem;
        margin-bottom: 0.875rem;
    }

</style>

@endsection
@section('content')
<section class="create_Account">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form_create">
                    <h3>Sign into your Account</h3>
                    <p>Log into your MyBank account</p>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="main1">
    <div class="container">
        <div class="row">
            @if(session()->has('message'))
            <div class="d-flex justify-content-center">
                <div class="alert alert-success center-block">
                    {{ session()->get('message') }}
                </div>
            </div>
            @endif
            @if(session()->has('error'))
            <div class="d-flex justify-content-center">
                <div class="alert alert-danger center-block">
                    {{ session()->get('error') }}
                </div>
            </div>
            @endif


            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <form method="POST" class="form" action="{{ route('client.login.store') }}">
                    @csrf
                    <p>Email</p>
                    <input type="email" placeholder="test@example.com" name="email" class="place1" required>
                    <div class="alert-container">
                        @error('email') <div class="alert alert-danger ">{{ $message }}</div>
                        @enderror
                    </div>
                    <p>Password</p>
                    <input type="password" name="password" required placeholder="****" class="place1" required>
                    <div class="alert-container">
                        @error('password') <div class="alert alert-danger ">{{ $message }}</div>

                        @enderror
                    </div>
                    <div class="forget">
                        <p>Forgotton your password?</p>
                        <a href="{{route('password.request')}}" class="btn" data-toggle="modal" data-target="#myModal">click here to recover it</a>

                        {{-- <!--  -->
                        <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h2 class="modal-title">Recover password <br> <span class="da"> Please enter your new password to contine</span></h2>
                                        <!-- <p class="headp"></p> -->
                                    </div>
                                    <div class="modal-body">
                                        <div class="body">
                                            <p>new password</p>
                                            <input type="password" placeholder="...." class="pass">
                                            <p>confirm Password</p>
                                            <input type="password" placeholder="...." class="pass">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Change Password</button>
                                    </div>
                                </div>

                            </div>
                        </div> --}}

                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn2 " type="submit">LOGIN</button>
                    </div>
                    <div class="sign_in">
                        <p>Do you not have a MyBAnk account? <a href="{{route('client.register')}}"> <span class="spainn">Sign up here</span></a> </p>

                    </div>
            </div>
        </div>
    </div>
</section>

@endsection
