@extends('frontend.master')
@section('style')
<style>
    <style>html {
        background-color: #000056;
    }

    * {
        margin: 0;
        padding: 0;
    }

    .main {
        padding: 40px 0px;
        background-color: #000056;
    }

    .main a {
        text-decoration: none;
        color: white;
        padding: 5px;
        font-size: 20px;

    }

    .img img {
        width: 50vh;
        height: 50vh;

    }

    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }

    .content {
        padding: 20px 0px;
        text-align: center;
        color: white;
    }

    .btn1 {
        background-color: #1c1c72;
        padding: 10px 50px;
        border: none;
        color: #ff0052;


    }

    .buttons i {
        /* float:left; */
        padding-left: 20px;
    }

    .btn2 {
        background-color: #ff0052;
        padding: 10px 30px;
        border: none;
        /* float:right; */


    }

    .buttons ul {
        list-style-type: none;

    }

    .buttons ul li {
        display: inline-block;

    }

    .right {
        float: right;
    }

    .referral {
        color: white;
        padding: 10px;
    }

    /* @media screen and (max-width: 768px){
      .img img {
      width: 100%;
      }} */
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
@section('content')
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

<section class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="img">
                    <img src="{{asset('public/front-assets/images/saving.png')}}" alt="" width="100%" class="center" class="img-fluid">
                </div>
                <div class="content">
                    <h2>Get Free $1,000</h2>
                    <p>You and your friends earn cash reward when they signup and save with your referral link or code</p>
                </div>

                <div class="referral">
                    <h4>Here's your referral code</h4>
                </div>
                <div class="buttons">
                    <ul>
                        <li><button type="button" class="btn1 btn-secondary">ABCDE123 <i class="fa fa-clone" aria-hidden="true"></i></button></li>
                        <li class="right"> <button type="button" class="btn2 btn-secondary">INVITE</button></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- @include('frontend.components.footer') --}}


@endsection
