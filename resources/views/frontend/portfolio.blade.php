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

    .hero {
        padding: 20px 0px;
        background-color: #000056;
        color: white;
        text-align: center;

    }

    .imgg {
        padding: 40px 0px;
    }

    .imgg p {
        color: #c3b4b4;
    }

    .imgg {
        padding: 40px 0px;
        background-image: url("{{asset('public/assets/images/portfolio.png')}}");

        height: 300px;
        width: 300px;
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
        border-radius: 50px;
        text-align: center;
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 40%;

    }

    .imgg h2 {
        padding-top: 40px;
        color: black;
    }

    .imgg p {
        color: black;
    }

    .content {
        background-color: #000056;
        padding: 20px 0px;
    }

    .content ul {
        list-style-type: none;
        text-align: center;
        color: white;
    }

    .content ul li {
        display: inline-block;
        padding: 0px 20px;

    }

    .fa-circle {
        color: blue;
        color: #1414b3;
        padding-right: 5px;
    }

    .content a {
        text-decoration: none;
        color: white;
    }

    .hero1 {
        background-color: #000056;
        padding: 20px 0px;
    }

    .dataa {
        background-color: #000056;
        color: white;
        padding-bottom: 10px;
    }

    .con {
        color: white;
    }

    .con1 {
        float: right;
    }

    .last {
        padding-bottom: 20px;
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
                    <h2 class="text-white">Hello {{Auth::user()->name}} </h2>
                    <p class="text-white">Good morning, remember to save today <i class="fa fa-usd" aria-hidden="true"></i></p>
                </div>
            </div>
        </div>
    </div>
    <section class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sm">
                    <div class="hero">
                        <h4 class="h4">My Portfolio</h4>
                        <div class="imgg">
                            <h2>$20,000</h2>
                            <p>net worth</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sm">
                    <div class="content">
                        <ul>
                            <a href="">
                                <li><i class="fa fa-circle" aria-hidden="true"></i> Savings</li>
                            </a>
                            <a href="">
                                <li><i class="fa fa-circle" aria-hidden="true"></i> Investments</li>
                            </a>

                            <a href="">
                                <li><i class="fa fa-circle" aria-hidden="true"></i> Emergency Funds</li>
                            </a>



                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="hero1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sm">
                    <div class="dataa">
                        <h3>Savings</h3>
                    </div>
                    <div class="con">
                        <hr>
                        <p>Savings balance <span class=con1>$10,000.21</span></p>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sm">
                    <div class="dataa">
                        <h3 class="last">Investments</h3>
                    </div>
                    <div class="con">
                        <hr>
                        <p>Investment balance <span class=con1>$10,000.21</span></p>
                        <p>Gold <span class=con1>$8,000</span></p>

                        <p>Agriculture <span class=con1>$6,000</span></p>

                        <p>Real Estate <span class=con1>$2,000</span></p>

                    </div>
                </div>
            </div>
        </div>

    </section>

</section>


@include('frontend.components.footer')


@endsection
