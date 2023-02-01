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
        /* margin-bottom:20px; */


    }

    .main a {
        text-decoration: none;
        color: white;
        padding: 20px;
        font-size: 20px;

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
        color: gray;
        border: 1px solid white;
        border-radius: 0.5rem;
        background-color: #000056;
        padding: 5px 20px;
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

    html {
        background-color: #000056;

    }

    * {
        margin: 0;
        padding: 0;
    }

    .main {
        padding: 20px 0px;
        background-color: #000056;
    }

    .head {
        background-color: #000056;
        color: white;

    }

    .head i {
        background-color: #5f6ec3;
        padding: 10px;
        border-radius: 100%;
        color: #ff5179;
    }

    .head1 {
        color: white;

    }

    .head1 i {
        color: goldenrod;
        padding: 0px 5px;
    }

    .heading {
        color: white;
        padding: 20px 0px;
    }

    .dashboard-button {
        text-decoration: none;
    }

    .left {
        padding: 0.5rem;
        margin: 1rem;
        border: 2px solid #ad9696;
        color: white;
        border-radius: 0.5rem;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.25rem;

    }

    .left-without_border {

        padding: 0.5rem;
        margin: 1rem;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center
    }

    .left ul {
        list-style-type: none;

    }

    .left ul li {
        display: inline-block;
        /* padding:0px 30px; */
    }

    .money {
        padding-left: 20px;
        color: #e9e9e9;
    }

    .fa-credit-card-alt {
        color: #00b5ff;
    }

    .fa-paper-plane {
        color: darkgoldenrod;
    }

    .hero {
        background-color: #000056;
        padding: 20px 0px;
        color: white;
    }

    .content {
        padding: 10px 0px;
        color: white;
        /* border:2px solid black; */
        background-color: #1b53a7;
        border-radius: 5px;
    }

    .content ul {
        list-style-type: none;
    }

    .content ul li {
        display: inline-block;
        padding: 0px 5px;
    }

    .emerg {
        float: right;
        padding: 0px 5px;
    }

    .content p {
        padding-left: 20px;
    }

    .fa-briefcase {
        background-color: white;
        color: darkblue;
        border-radius: 50px;
        padding: 10px;
    }

    .sm {
        padding: 10px 0px;
    }

    .con {
        padding: 20px 0px;
    }

    .data {
        background-color: #002f74;
        border-radius: 30px 30px 0px 0px;
    }

    .hide {
        display: none;
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
            <div class="col-lg-11 col-md-6 col-sm-6 col-xs-12">
                <div class="head1">
                    <h2>Hello {{Auth::user()->name}} </h2>
                    <p>Good morning, remember to save today <i class="fa fa-usd" aria-hidden="true"></i></p>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="heading">
                    <p>Total savings</p>
                    <h2>$ {{$credit}}</h2>

                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form method="POST" class="form" action="{{ route('request.payment.viaAccount') }}">
                    @csrf
                    <p class="display-4 text-center">Amount : {{$request->amount}}</p>
                    <input type="text" hidden name="amount" class="place1" value="{{$request->amount}}">
                    <input type="text" hidden name="reqID" class="place1" value="{{$request->id}}">
                    <p>Requester's Email : {{$request->originator_email}}</p>
                    <p>Requester's Account Number : {{$request->originator_account_number}}</p>
                    <input name="account_number" type="text" id="account_number" hidden value="{{$request->originator_account_number}}">
                    <div class="gap-2 col-2 mx-auto" id="otpBtn">
                        <button class="btn2" id="btn2" type="button">Generate PIN</button>
                    </div>
                    <div class="alert alert-info col-4 hide mx-auto" id="info2">
                        <span id="pinShow"></span><br>
                    </div>
                    <p>Pin</p>
                    <input name="pin" type="password" placeholder="******" class="place1" required>
                    <div class="alert-container">
                        @error('pin') <div class="alert alert-danger ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn2 " type="submit">Make payment</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
    </div>
</section>

@include('frontend.components.footer')


@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script src="{{asset('public/front-assets/js/app.js')}}"></script>
@endsection
