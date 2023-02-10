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
        width: 100%;
        padding: 10px 0px;
        color: white;
        text-align: left;

    }

    .main a {
        text-decoration: none;
        color: white;
        padding: 5px;
        font-size: 20px;

    }


    .main ul {
        list-style-type: none;

    }

    .main ul li {
        display: inline-block;
        cursor: pointer;
    }

    .content h6 {
        color: #ff3a4d;
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

    .btn3 {
        margin-top: 20px;
        padding: 5px;
        background-color: white;
        color: blue;
        border: 1px solid transparent;
        border-radius: 10px;
        /* color:white; */



    }

    .btn3:hover {
        /* background-color: black; */
        /* color:white; */
    }

    .head {
        background-color: #000056;
        color: white;
        display: flex;

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

</style>


@endsection
<section class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-md-6 col-sm-6 col-xs-12">
                <div class="head">
                    <a href="{{route('client.profile')}}">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </a>
                    <a href="{{route('client.dashboard')}}">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </a>

                </div>

            </div>
        </div>
    </div>
</section>

@section('content')
<section class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="main">
                    <ul>
                        <li>
                            <h4>Save for emergency</h4>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="content">
                    <h6>Save your money with us!</h6>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn2 " type="button">Get details</button>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.components.footer')
@endsection
