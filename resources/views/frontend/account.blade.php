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

    .hero img {
        width: 20vh;
        height: 20vh;

    }

    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
        border: 2px solid transparent;
        border-radius: 50%;
    }

    .hero {
        text-align: center;
        color: white;
    }

    .hero p {
        color: b#9bafc3;
    }

    .hero1 {
        padding: 40px 0px;
        background-color: #000056;
    }

    .content ul {
        list-style-type: none;
        padding: 10px 0px;
    }

    .content ul li {
        display: inline-block;
        color: white;
        padding: 0px 7px;
    }

    .fa {
        color: #ff0052;
        /* padding-left:0px 20px; */
    }

    hr {
        color: white;
    }

    a {
        text-decoration: none;
        font-size: 1.25rem;
        cursor: pointer;
    }

</style>
@endsection
@section('content')
<section class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="hero">
                    <img src="public\front-assets\images\profile.jpg" alt="" class="center">
                    <h3>{{Auth::user()->name}}</h3>
                    <p>{{Auth::user()->email}}</p>

                </div>
            </div>
        </div>
    </div>
</section>
<section class="hero1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="content">
                    <ul>
                        <li><i class="fa fa-bell" aria-hidden="true"></i></li>
                        <li>
                            <p>Account Number : {{$user->account_number}}</p>
                        </li>
                        <hr>
                    </ul>
                </div>
                <div class="content">
                    <ul>
                        <li><i class="fa fa-bell" aria-hidden="true"></i></li>
                        <li>
                            <p>Account Credit : ${{$user->credit}}</p>
                        </li>
                        <hr>
                    </ul>
                </div>
                <div class="content">
                    <ul>
                        <li><i class="fa fa-bell" aria-hidden="true"></i></li>
                        <li>
                            <p>Invested ammount : $5000</p>
                        </li>
                        <hr>
                    </ul>
                </div>
                <div class="content">
                    <ul>
                        <li><i class="fa fa-bell" aria-hidden="true"></i></li>
                        <li>
                            <p>Emergency savings : $2000</p>
                        </li>
                        <hr>
                    </ul>
                </div>
                <div class="content">

                    <ul>
                        <li><i class="fa fa-bell" aria-hidden="true"></i></li>
                        <li>
                            <a class="btn btn-outline-danger" href="{{route('client.password.change')}}">
                                <p>Change password</p>
                            </a>
                        </li>
                        <hr>
                    </ul>

                </div>





            </div>

        </div>
    </div>
</section>
@include('frontend.components.footer')


@endsection
