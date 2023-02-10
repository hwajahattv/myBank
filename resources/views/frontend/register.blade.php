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
        font-size: 0.875rem;
        color: grey;
        border: 1px solid white;
        border-radius: 0.5rem;
        background-color: #000056;
        padding: 5px 20px;
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
                    <h3>Create Account</h3>
                    <p>Open a myBank account with a few details</p>
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

            {{-- @if($errors->any())
            <div class="d-flex justify-content-center">
                <div class="alert-container">
                    <div class="alert alert-danger ">
                        {{ implode('', $errors->all(':message')) }}
        </div>
    </div>
    </div>
    @endif --}}

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <form class="form" method="POST" action="{{ route('client.register.post') }}">
            @csrf
            <p>Full name</p>
            <input type="text" name="name" placeholder="Jhon doe" class="place1 text-sm" required>
            <div class="alert-container">
                @error('name') <div class="alert alert-danger ">{{ $message }}</div>
                @enderror
            </div>
            <p>Email</p>
            <input type="email" name="email" placeholder="test@example.com" class="place1" required>
            <div class="alert-container">
                @error('email') <div class="alert alert-danger ">{{ $message }}</div>
                @enderror
            </div>
            <p>Mobile no.</p>
            <input type="number" name="phone_no" placeholder="Enter only digits" class="place1" required>
            <div class="alert-container">
                @error('phone_no') <div class="alert alert-danger ">{{ $message }}</div>

                @enderror
            </div>
            <p>Password</p>
            <input type="password" name="password" class="place1" placeholder="Minimum 8 characters." required>
            <div class="alert-container">
                @error('password')
                <div class="alert alert-danger ">{{ $message }}</div>
                @enderror
            </div>
            <p>Repeat Password</p>
            <input type="password" name="password_confirmation" placeholder="Minimum 8 characters." class="place1" required>
            <div class="alert-container">
                @error('password_confirmation') <div class="alert alert-danger ">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn2 " type="submit">Save</button>
            </div>
        </form>
        <div class="sign_in">
            <p>Do you already have a MyBank account? <a href="{{route('client.login')}}"> <span class="spainn">Sign in here</span></a> </p>
        </div>
    </div>
    </div>
    </div>
</section>
@endsection
