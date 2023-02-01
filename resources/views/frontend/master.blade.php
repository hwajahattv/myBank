<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My bank</title>
    <meta name="_csrf" th:content="${_csrf.token}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <link rel="shortcut icon" href="{{asset('public/assets/admin/images/favicon.png')}}" />


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="{{asset('public/front-assets/css/front.css')}}"> --}}
    @yield('style')
    <style>
        .footers {
            background-color: #000056;
            box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 0.56);
            -webkit-box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 0.56);
            -moz-box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 0.56);

        }

        .footer_ul {
            list-style-type: none;
        }

        .footer_ul li a {
            color: #fff;
            text-decoration: none;
        }

        .footer_ul li a p {
            margin: 0px;
        }



        .footer_ul li {
            display: inline-block;
            padding: 10px 70px;
            text-align: center;
        }

        .footer_ul li a:hover {
            color: red;
        }

        .foot {
            text-align: center !important;
            padding-top: 10px;
        }

        @media screen and (max-width: 1180px) {
            .footer_ul li {
                padding: 10px 40px;
            }
        }

        @media screen and (max-width: 767px) {
            .footer_ul li {
                padding: 10px 17px;
            }
        }

        @media screen and (max-width: 550px) {
            .footer_ul li {
                padding: 10px 12px;
                text-align: center;
            }

            .fa-2x {
                font-size: 15px;
            }

            .footer_ul li a p {
                font-size: 12px;
            }
        }

    </style>
</head>
<body>
    @include('sweetalert::alert')


    <section class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @yield('script')
</body>
</html>
