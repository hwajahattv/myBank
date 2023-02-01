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
        padding: 0px 20px 0px 0px;
        font-size: 20px;

    }

    .main ul {
        list-style-type: none;

    }

    .main ul li {
        display: inline-block;
        cursor: pointer;
    }

    .hero {
        background-color: #000056;
        padding: 20px 0px 0px 0px;
    }

    .data {
        color: white;
    }

    .content {}

    .content ul {
        padding: 10px 10px;

        list-style-type: none;
        border: 1px solid #818080;
        border-radius: 10px;


    }

    .content ul li {
        display: inline-block;
        color: white;
        cursor: pointer;
    }

    .fa {
        color: #c99600;
        padding: 0px 10px 0px 0px;

    }

    .fa-university {
        color: #f3004e;
    }

    .para {
        color: #b1a9a9;
        padding: 0px 50px;
    }

    .data1 {
        padding: 50px 0px;
    }

</style>


@endsection
@section('content')
<section class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="main">
                    <ul>
                        <li>
                            <h4>Notifications</h4>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="dropdown open p-2 m-2">
                <a class="btn btn-dark dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Show transaction from:
                </a>
                <div class="dropdown-menu bg-dark" aria-labelledby="triggerId">
                    <a class="dropdown-item" href="{{route('client.notifications',['days'=>1])}}">Today</a>
                    <a class="dropdown-item" href="{{route('client.notifications',['days'=>7])}}">Last 7 days</a>
                    <a class="dropdown-item" href="{{route('client.notifications',['days'=>30])}}">Last 30 days</a>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data">
                    <p>{{$duration}}</p>
                    @if(sizeof($transactions)>0)
                    @foreach($transactions as $key => $transaction)
                    <div class="content">
                        <ul @if($transaction->TTID == 2||$transaction->targetTitle==Auth::user()->name)

                            class="bg-success"
                            @else
                            class="bg-danger"
                            @endif>
                            <li><i class="fa fa-arrows" aria-hidden="true"></i></li>
                            <li>
                                <p>{{$transaction->name}} ({{$transaction->UserAccount}}) {{$transaction->Type}} ${{$transaction->Amount}} on {{$transaction->Date}} to Account Title : {{$transaction->targetTitle}} ( {{$transaction->Target}} )<br> </p>


                            </li>
                            <p class="para"> Transaction ID : {{$transaction->TID}}</p>

                        </ul>
                    </div>
                    @endforeach
                    @else
                    <div class="alert alert-success" style="height: 400px">
                        <span class="text-center display-5"> No transactions available.</span>
                    </div>
                    @endif


                    {{-- <div class="content">
                        <ul>
                            <li><i class="fa fa-university" aria-hidden="true"></i></li>
                            <li>
                                <p> Received money $2,000 from Dito <br> </p>
                            </li>
                            <p class="para">8:40PM</p>

                        </ul>
                    </div>
                    <div class="content">
                        <ul>
                            <li><i class="fa fa-arrows" aria-hidden="true"></i></li>
                            <li>
                                <p>withdraw $40,0000 from emergency funds<br> </p>
                            </li>
                            <p class="para">8:58PM</p>

                        </ul>
                    </div>

                    <div class="content">
                        <ul>
                            <li><i class="fa fa-university" aria-hidden="true"></i></li>
                            <li>
                                <p> Added $4,000 to your savings <br> </p>
                            </li>
                            <p class="para">6:40PM</p>

                        </ul>
                    </div> --}}
                </div>

            </div>



            {{-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data data1">
                    <p>Yesterday</p>
                    <div class="content">
                        <ul>
                            <li><i class="fa fa-arrows" aria-hidden="true"></i></li>
                            <li>
                                <p>withdraw $3,900 <br> </p>
                            </li>
                            <p class="para">2:45PM</p>

                        </ul>
                    </div>

                    <div class="content">
                        <ul>
                            <li><i class="fa fa-university" aria-hidden="true"></i></li>
                            <li>
                                <p> Received cashback $5 on interest <br> </p>
                            </li>
                            <p class="para">5:58PM</p>

                        </ul>
                    </div>
                    <div class="content">
                        <ul>
                            <li><i class="fa fa-arrows" aria-hidden="true"></i></li>
                            <li>
                                <p>withdraw $40,0000 from emergency funds<br> </p>
                            </li>
                            <p class="para">8:58PM</p>

                        </ul>
                    </div>

                </div>

            </div> --}}

        </div>
    </div>
</section>



@include('frontend.components.footer')


@endsection
