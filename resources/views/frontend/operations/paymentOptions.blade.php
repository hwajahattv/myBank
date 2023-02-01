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
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="" class="dashboard-button">
                    <div class="left">
                        <ul class="left-without_border">

                            <li><i class="fa fa-credit-card-alt" aria-hidden="true"></i></li>
                            <li class="money">Pay via Scan</li>

                        </ul>

                    </div>
                </a>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="{{route('payment.viaMobile')}}" class="dashboard-button">
                    <div class="left">
                        <ul class="left-without_border">

                            <li><i class="fa fa-paper-plane" aria-hidden="true"></i></li>
                            <li class="money">Pay via Mobile Number</li>

                        </ul>

                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="{{route('payment.viaEmail')}}" class="dashboard-button">

                    <div class="left">
                        <ul class="left-without_border">

                            <li><i class="fa fa-paper-plane" aria-hidden="true"></i></li>
                            <li class="money">Pay via Email</li>

                        </ul>

                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="{{route('payment.viaAccount')}}" class="dashboard-button">


                    <div class="left">
                        <ul class="left-without_border">
                            <li><i class="fa fa-paper-plane" aria-hidden="true"></i></li>
                            <li class="money">Pay via Account Number</li>

                        </ul>

                    </div>
                </a>
            </div>


        </div>
    </div>
</section>

@include('frontend.components.footer')


@endsection
