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
                            <h4>Privacy Policy</h4>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="content">
                    <h6>Privacy Policy</h6>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, consequuntur saepe, repellendus facilis laudantium fugit totam nulla a veniam reprehenderit dicta fugiat deleniti maiores natus sequi aut. Quia, unde ipsum!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, consequuntur saepe, repellendus facilis laudantium fugit totam nulla a veniam reprehenderit dicta fugiat deleniti maiores natus sequi aut. Quia, unde ipsum!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, consequuntur saepe, repellendus facilis laudantium fugit totam nulla a veniam reprehenderit dicta fugiat deleniti maiores natus sequi aut. Quia, unde ipsum!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, consequuntur saepe, repellendus facilis laudantium fugit totam nulla a veniam reprehenderit dicta fugiat deleniti maiores natus sequi aut. Quia, unde ipsum!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, consequuntur saepe, repellendus facilis laudantium fugit totam nulla a veniam reprehenderit dicta fugiat deleniti maiores natus sequi aut. Quia, unde ipsum!</p>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn2 " type="button">I AGREE</button>

                </div>

                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn3 " type="button">I DISAGREE</button>

                </div>

            </div>
        </div>
    </div>
</section>


@include('frontend.components.footer')


@endsection
