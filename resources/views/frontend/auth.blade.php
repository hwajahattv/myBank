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
        padding: 100px 0px;
    }

    .data {
        background-color: #000056;
        text-align: center;
        color: white;
    }

    .btn2 {
        padding: 5px 0px;
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

    .btn3 {
        margin-top: 20px;
        padding: 5px 0px;
        background-color: #6666b996;
        color: white;
        border: 1px solid transparent;
        border-radius: 10px;
        /* color:white; */



    }

    .btn3:hover {
        /* background-color: black; */
        /* color:white; */
    }

    .button {
        padding-top: 70px;
    }

</style>


@endsection
@section('content')
<div class="data">
    <h3>Wellcome to myBank</h3>
    <p>The bank for everyone.</p>
</div>
<div class="button">
    <div class="d-grid gap-2 col-6 mx-auto">
        <a class="btn2 btn" href="{{route('client.register')}}">Create Your Free Account</a>
    </div>

    <div class="d-grid gap-2 col-6 mx-auto">
        <a class="btn3 btn" href="{{route('client.login')}}">Log Into Your Account</a>

    </div>
</div>


@endsection
