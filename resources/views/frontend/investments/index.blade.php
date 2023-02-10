@extends('frontend.master')
@section('style')
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

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
        /* background-color: #1b53a7; */

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
        color: gray !important;
    }

    .search {
        /* float:center; */
        text-align: center;

    }



    .data ul {
        list-style-type: none;
        display: flex;
    }

    .data ul li {
        display: inline-block;
    }

    .fa-building {
        color: white;
        background-color: palevioletred;
        border-radius: 50%;
        /* font-size: 20px; */
    }

    .li1 {
        padding: 10px 10px;
        background-color: green;
        border-radius: 50%;


    }


    .li2 {
        float: right;
    }





    .search {
        /* float:center; */
        text-align: center;

    }


    .real {
        padding-left: 10px;
    }

    .data {
        padding: 1rem;
        margin: 5px 5px;
        height: 250px;
        padding: 5px 5px;
        /* background-color: skyblue; */
        border-radius: 5%;
        position: relative;
    }


    .real {

        margin: 5px;
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
            <div class="content bg-dark">
                <h3 class="text-center">Choose an investment</h3>
                <h5 class="text-center">not sure what you want to invest in? <a href="">See recommendations</a> </h5>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="buttons">
                    <input type="text" class="search" id="myInput" onkeyup="myFunction()" placeholder="Search a plan">

                </div>
            </div>
            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-4">
                <div class="buttons">
                    <ul>
                        <li class="real"><a data-filter="all" class="btn btn-secondary filter_link">All</a></li>
                        @foreach ($types as $type)
                        <li class="real"><a data-filter={{$type->name}} class="btn btn-secondary filter_link">{{$type->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>



            <section class="hero1">
                <div class="container">
                    <div class="row" id="myUL">
                        @foreach ($investments as $investment)
                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 media {{$investment->type}}">
                            <div class="data bg-success">
                                <div class="bg-dark">
                                    <ul>
                                        <li class="li1"><i class="fa fa-building" aria-hidden="true"></i></li>
                                        <li class="li2"><span class="text-white" style="font-size: small">Returns {{$investment->return_rate}}% in {{$investment->return_cycle}} months</span></li>

                                    </ul>
                                </div>
                                <h6> Invest in {{$investment->type}} type plan: {{$investment->plan_name}}<br><span>offered by:</span> {{$investment->company}}</h6>
                                <span>Investment amount: ${{$investment->amount}}</span>
                                <a class="btn btn-dark" href="{{route('client.invest.show',['id'=>$investment->id])}}">Details</a>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

@include('frontend.components.footer')


@endsection
@section('script')
<script>
    var $mediaElements = $('.media');

    $('.filter_link').click(function(e) {
        e.preventDefault();
        // get the category from the attribute
        var filterVal = $(this).data('filter');

        if (filterVal === 'all') {
            $mediaElements.show();
        } else {
            // hide all then filter the ones to show
            $mediaElements.hide().filter('.' + filterVal).show();
        }
    });

    function myFunction() {
        // Declare variables
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById('myInput');
        filter = input.value.toUpperCase();
        ul = document.getElementById("myUL");
        li = $('div.media div.data h6');

        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < li.length; i++) {
            a = li[i];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                $('.media')[i].style.display = "";
            } else {
                $('.media')[i].style.display = "none";

            }
        }
    }

</script>
@endsection
