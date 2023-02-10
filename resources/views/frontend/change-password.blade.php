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
<section class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-md-6 col-sm-6 col-xs-12">
                <div class="head">
                    <a href="{{route('client.profile')}}">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </a>
                </div>
            </div>



        </div>
    </div>
</section>

<section class="create_Account">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form_create">
                    <h3>Change your password</h3>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="main1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                @if($errors->any())
                {!! implode('', $errors->all('<div class="alert alert-danger alert-dismissible fade show">:message</div>')) !!}
                @endif
                @if(Session::get('error') && Session::get('error') != null)
                <div class="alert alert-danger alert-dismissible fade show">{{ Session::get('error') }}</div>
                @php
                Session::put('error', null)
                @endphp
                @endif
                @if(Session::get('success') && Session::get('success') != null)
                <div class="alert alert-success alert-dismissible fade show">{{ Session::get('success') }}</div>

                @php
                Session::put('success', null)
                @endphp
                @endif
                <form class="form" action="{{ route('postChangePassword') }}" method="post">

                    @csrf
                    <div class="mb-3">
                        <p for="current_password">Current Password</p>
                        <input type="password" id="current_password" class="place1" name="current_password">

                    </div>
                    <div class="mb-3">
                        <p for="new_password">New Password</p>
                        <input type="password" id="new_password" class="place1" name="new_password">

                    </div>
                    <div class="mb-3">
                        <p for="new_password_confirmation">Confirm New Password</p>
                        <input type="password" id="new_password_confirmation" class="place1" name="new_password_confirmation">

                    </div>
                    <button type="submit" class="btn2">Change</button>

                </form>
            </div>
        </div>
    </div>
</section>
@include('frontend.components.footer')


@endsection
