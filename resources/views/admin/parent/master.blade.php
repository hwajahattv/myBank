<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MyBank Admin</title>
    {{-- bootstrap CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('public/assets/admin/vendors/simple-line-icons/css/simple-line-icons.css')}}">

    <link rel="stylesheet" href="{{asset('public/assets/admin/vendors/flag-icon-css/css/flag-icon.min.css')}}">

    <link rel="stylesheet" href="{{asset('public/assets/admin/vendors/css/vendor.bundle.base.css')}}">

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('public/assets/admin/vendors/daterangepicker/daterangepicker.css')}}">

    <link rel="stylesheet" href="{{asset('public/assets/admin/vendors/chartist/chartist.min.css')}}">

    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('public/assets/admin/css/style.css')}}">

    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('public/assets/admin/images/favicon.png')}}" />
    @yield('styles')
</head>
<body>
    {{-- ---------------------------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------------------------- --}}

    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Enter transaction ID</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('find.transaction')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Transaction ID:</label>
                            <input type="text" class="form-control" name="transaction_id" id="" aria-describedby="transaction_id" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" onclick="find_transaction" class="btn btn-dark btn-sm">Find</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    {{-- ---------------------------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------------------------- --}}
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex align-items-center">
                <a class="navbar-brand brand-logo" href="index.html">
                    <img src="{{asset('public/assets/admin/images/logo.png')}}" alt="logo" class="logo-dark" />


                </a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('public/assets/admin/images/logo.png')}}" alt="logo" /></a>


            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
                <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome Admin dashboard!</h5>
                <ul class="navbar-nav navbar-nav-right ml-auto">
                    {{-- <form class="search-form d-none d-md-block" action="#">
                        <i class="icon-magnifier"></i>
                        <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                    </form>
                    <li class="nav-item"><a href="#" class="nav-link"><i class="icon-basket-loaded"></i></a></li>
                    <li class="nav-item"><a href="#" class="nav-link"><i class="icon-chart"></i></a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator message-dropdown" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <i class="icon-speech"></i>
                            <span class="count">7</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                            <a class="dropdown-item py-3">
                                <p class="mb-0 font-weight-medium float-left">You have 7 unread mails </p>
                                <span class="badge badge-pill badge-primary float-right">View all</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="{{asset('public/assets/admin/images/faces/face10.jpg')}}" alt="image" class="img-sm profile-pic">


            </div>
            <div class="preview-item-content flex-grow py-2">
                <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                <p class="font-weight-light small-text"> The meeting is cancelled </p>
            </div>
            </a>
            <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="{{asset('public/assets/admin/images/faces/face12.jpg')}}" alt="image" class="img-sm profile-pic">


                </div>
                <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                    <p class="font-weight-light small-text"> The meeting is cancelled </p>
                </div>
            </a>
            <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="{{asset('public/assets/admin/images/faces/face1.jpg')}}" alt="image" class="img-sm profile-pic">

                </div>
                <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
                    <p class="font-weight-light small-text"> The meeting is cancelled </p>
                </div>
            </a>
    </div>
    </li> --}}
    {{-- <li class="nav-item dropdown language-dropdown d-none d-sm-flex align-items-center">
                        <a class="nav-link d-flex align-items-center dropdown-toggle" id="LanguageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <div class="d-inline-flex mr-3">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <span class="profile-text font-weight-normal">English</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left navbar-dropdown py-2" aria-labelledby="LanguageDropdown">
                            <a class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i> English </a>
                            <a class="dropdown-item">
                                <i class="flag-icon flag-icon-fr"></i> French </a>
                            <a class="dropdown-item">
                                <i class="flag-icon flag-icon-ae"></i> Arabic </a>
                            <a class="dropdown-item">
                                <i class="flag-icon flag-icon-ru"></i> Russian </a>
                        </div>
                    </li> --}}
    <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            <img class="img-xs rounded-circle ml-2" src="{{asset('public/assets/admin/images/faces/face8.jpg')}}" alt="Profile image"> <span class="font-weight-normal"> {{Auth::user()->name}} </span></a>


        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="{{asset('public/assets/admin/images/faces/face8.jpg')}}" alt="Profile image">


                <p class="mb-1 mt-3">{{Auth::user()->name}}</p>
                <p class="font-weight-light text-muted mb-0">{{Auth::user()->email}}</p>
            </div>
            <a class="dropdown-item"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
            <a class="dropdown-item"><i class="dropdown-item-icon icon-speech text-primary"></i> Messages</a>
            <a class="dropdown-item"><i class="dropdown-item-icon icon-energy text-primary"></i> Activity</a>
            <a class="dropdown-item"><i class="dropdown-item-icon icon-question text-primary"></i> FAQ</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();" class="btn btn-outline-danger">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>

        </div>
    </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="icon-menu"></span>
    </button>
    </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <div class="profile-image">
                            <img class="img-xs rounded-circle" src="{{asset('public/assets/admin/images/faces/face8.jpg')}}" alt="profile image">
                            <div class="dot-indicator bg-success"></div>
                        </div>
                        <div class="text-wrapper">
                            <p class="profile-name">{{Auth::user()->name}}</p>
                            <p class="designation">{{Auth::user()->email}}</p>
                        </div>
                        <div class="icon-container">
                            <i class="icon-bubbles"></i>
                            <div class="dot-indicator bg-danger"></div>
                        </div>
                    </a>
                </li>
                <li class="nav-item nav-category">
                    <span class="nav-link">Dashboard</span>
                    @if($errors->any()) <div class="jumbotron bg-danger">
                        <span class="text-light font-weight-bold font-italic">
                            {{ implode('', $errors->all('** :message')) }}</span></div>
                    @endif
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/home')}}">
                        <span class="menu-title">Dashboard</span>
                        <i class="icon-screen-desktop menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item nav-category"><span class="nav-link">Operations</span></li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#accounts-section" aria-expanded="false" aria-controls="ui-basic">

                        <span class="menu-title">Accounts</span>
                        <i class="icon-layers menu-icon"></i>
                    </a>
                    <div class="collapse" id="accounts-section">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{route('account.index')}}">All Accounts</a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Add New account</a></li>
                        </ul>
                    </div>

                </li>
                <li class="nav-item">

                    <a class="nav-link" data-toggle="collapse" href="#transactions-section" aria-expanded="false" aria-controls="ui-basic">

                        <span class="menu-title">Transactions</span>
                        <i class="icon-layers menu-icon"></i>
                    </a>
                    <div class="collapse" id="transactions-section">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{route('transaction.index')}}">All Transactions</a></li>
                            <!-- Modal trigger button -->
                            <li class="nav-item"> <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modalId">
                                    Find a transaction details
                                </a></li>
                        </ul>
                    </div>
                    {{-- <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                            </ul>
                        </div> --}}
                </li>
                <li class="nav-item">

                    <a class="nav-link" data-toggle="collapse" href="#investment-section" aria-expanded="false" aria-controls="ui-basic">

                        <span class="menu-title">Investments</span>

                        <i class="icon-layers menu-icon"></i>
                    </a>
                    <div class="collapse" id="investment-section">

                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{route('investment.index')}}">All investments</a></li>


                            {{-- <!-- Modal trigger button -->
                            <li class="nav-item"> <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modalId">
                                    Find a transaction details
                                </a></li> --}}
                        </ul>
                    </div>
                    {{-- <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                            </ul>
                        </div> --}}
                </li>
                <li class="nav-item">

                    <a class="nav-link" data-toggle="collapse" href="#users-section" aria-expanded="false" aria-controls="ui-basic">

                        <span class="menu-title">Users</span>
                        <i class="icon-layers menu-icon"></i>
                    </a>
                    <div class="collapse" id="users-section">

                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{route('user.index')}}">All Users</a></li>
                        </ul>
                    </div>
                    {{-- <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                            </ul>
                        </div> --}}
                </li>

                {{-- <li class="nav-item">
                        <a class="nav-link" href="pages/icons/simple-line-icons.html">
                            <span class="menu-title">Icons</span>
                            <i class="icon-globe menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/forms/basic_elements.html">
                            <span class="menu-title">Form Elements</span>
                            <i class="icon-book-open menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/charts/chartist.html">
                            <span class="menu-title">Charts</span>
                            <i class="icon-chart menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/tables/basic-table.html">
                            <span class="menu-title">Tables</span>
                            <i class="icon-grid menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item nav-category"><span class="nav-link">Sample Pages</span></li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                            <span class="menu-title">General Pages</span>
                            <i class="icon-doc menu-icon"></i>
                        </a>
                        <div class="collapse" id="auth">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item pro-upgrade">
                        <span class="nav-link">
                            <a class="btn btn-block px-0 btn-rounded btn-upgrade" href="https://www.bootstrapdash.com/product/stellar-admin-template/" target="_blank"> <i class="icon-badge mx-2"></i> Upgrade to Pro</a>
                        </span>
                    </li> --}}
            </ul>
        </nav>
        <!-- partial -->
        @yield('content')

        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
        </footer>
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    {{-- Bootstrap javascript --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <!-- plugins:js -->
    <script src="{{asset('public/assets/admin/vendors/js/vendor.bundle.base.js')}}"></script>


    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('public/assets/admin/vendors/chart.js/Chart.min.js')}}"></script>

    <script src="{{asset('public/assets/admin/vendors/moment/moment.min.js')}}"></script>

    <script src="{{asset('public/assets/admin/vendors/daterangepicker/daterangepicker.js')}}"></script>

    <script src="{{asset('public/assets/admin/vendors/chartist/chartist.min.js')}}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('public/assets/admin/js/off-canvas.js')}}"></script>


    <script src="{{asset('public/assets/admin/js/misc.js')}}"></script>


    <!-- endinject -->
    <!-- Custom js for this page -->

    <script src="{{asset('public/assets/admin/js/dashboard.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"></script>

    <!-- End custom js for this page -->
    @yield('scripts')

    <!-- Modal Optional: Place to the bottom of scripts -->
    <script>
        const myModal = new bootstrap.Modal(document.getElementById('modalId'));

    </script>

</body>
</html>
