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

    .main a {
        text-decoration: none;
        color: white;
        padding: 20px;
        font-size: 20px;

    }

    .hero {
        /* padding:20px 0px; */
        background-color: #000056;

    }

    .content {
        color: white;
    }

    .content a {
        color: #ff0052;
        text-decoration: none;
    }

    .buttons {
        padding: 5px 0px;
        /* background-color: #3f3fa1; */
    }

    .search {

        /* width:100% */
        padding: 10px 50px;
        border: none;
        background-color: #3f3fa1;

    }

    .buttons {
        padding: 10px 0px;
        float: center center;
    }

    .buttons ul {
        padding: 10px 0px;
        list-style-type: none;


    }

    .buttons ul li {
        display: inline-block;


    }

    ::placeholder {
        color: white;
    }

    .btn {
        background-color: #3f3fa1;
        color: white;
        border: none;
        border-radius: 10px;
        /* padding-left:0px; */
    }

    .hero1 {
        background: #000056;
        padding: 20px 20px;
    }


    .data ul {
        list-style-type: none;

    }

    .data ul li {
        display: inline-block;
    }


    .fa-building {
        color: white;
        background-color: red;
        border-radius: 50%;
        /* font-size: 20px; */
    }

    .li1 {
        padding: 5px 10px;
        background-color: #a14ba5;
        border-radius: 50%;


    }

    .spaan {
        color: #29d7ff;
        padding: 0px 50px;

    }

    .li2 {
        float: right;
    }

    .data h6 {
        padding-top: 10px;
    }

    .btn-primary {
        background-color: #c4f4ff;
        color: #29d7ff;
    }

    .search {
        /* float:center; */
        text-align: center;

    }

    ::placeholder {
        color: lightblue;
    }

    .real {
        padding-left: 10px;
    }

    @media screen and (max-width: 820px) {
        .data {
            margin: 5px 7px;
        }

        .real {

            margin: 5px;
        }
    }

</style>

@endsection
@section('content')
<section class="main">
    <div class="container">
        <div class="row">
            @if(session()->has('message'))
            <div class="d-flex justify-content-center">
                <div class="alert alert-success center-block">
                    {{ session()->get('message') }}
                </div>
            </div>
            @endif
    @if($errors->any())
    <div class="d-flex justify-content-center">
        {!! implode('', $errors->all('<div class="alert alert-danger center-block alert-dismissible fade show">:message</div>')) !!}

    </div>
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
        <a href="{{route('money.add')}}" class="dashboard-button">
            <div class="left">
                <ul class="left-without_border">
                    <li><i class="fa fa-credit-card-alt" aria-hidden="true"></i></li>
                    <li class="money"> Add money</li>
                </ul>
            </div>
        </a>

    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <a href="{{route('payment.request')}}" class="dashboard-button">

            <div class="left">
                <ul class="left-without_border">

                    <li><i class="fa fa-paper-plane" aria-hidden="true"></i></li>
                    <li class="money">Request Money</li>

                </ul>

            </div>
        </a>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <a href="{{route('utility.index')}}" class="dashboard-button">
            <div class="left">
                <ul class="left-without_border">

                    <li><i class="fa fa-paper-plane" aria-hidden="true"></i></li>
                    <li class="money">Pay</li>

                </ul>

            </div>
        </a>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <a href="{{route('sendMoney.index')}}" class="dashboard-button">
            <div class="left">
                <ul class="left-without_border">
                    <li><i class="fa fa-paper-plane" aria-hidden="true"></i></li>
                    <li class="money"> Send Money</li>

                </ul>

            </div>
        </a>
    </div>


    </div>
    </div>



</section>


<section class="hero">
    <div class="container">
        <div class="row">
            <div class="data">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sm">
                    <p>
                        Get your money working for you
                    </p>
                    <div class="content">
                        <a href="{{route('client.save')}}">

                            <ul>
                                <li><i class="fa fa-briefcase" aria-hidden="true"></i></li>
                                <li>
                                    <p>save for emergency</p>
                                </li>
                                <li class="emerg"><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                            </ul>
                        </a>

                    </div>


                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sm">
                    <a href="{{route('client.invest.index')}}">

                        <div class="content">
                            <ul>
                                <li><i class="fa fa-briefcase" aria-hidden="true"></i></li>
                                <li>
                                    <p>Invest your money</p>
                                </li>
                                <li class="emerg"><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                            </ul>
                        </div>
                    </a>


                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sm">
                    <div class="con">
                        <p>
                            Ways to earn more money
                        </p>
                        <div class="content">
                            <ul>
                                <li><i class="fa fa-briefcase" aria-hidden="true"></i></li>
                                <li>
                                    <p>Invite your friends and get a bonus</p>
                                </li>
                                <li class="emerg"><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                            </ul>
                        </div>


                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>
</section>

@include('frontend.components.footer')


@endsection
