<!DOCTYPE html>
<html class=" ">

<head>

    <title>My Bank App : Home Page</title>
    <meta name="_csrf" th:content="${_csrf.token}" />




    <!-- App Icons -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('public/assets/images/icons/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('public/assets/images/icons/apple-icon-60x60.png')}}">

    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('public/assets/images/icons/apple-icon-72x72.png')}}">

    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('public/assets/images/icons/apple-icon-76x76.png')}}">

    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('public/assets/images/icons/apple-icon-114x114.png')}}">

    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('public/assets/images/icons/apple-icon-120x120.png')}}">

    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('public/assets/images/icons/apple-icon-144x144.png')}}">

    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('public/assets/images/icons/apple-icon-152x152.png')}}">

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('public/assets/images/icons/apple-icon-180x180.png')}}">

    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('public/assets/images/icons/android-icon-192x192.png')}}">

    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('public/assets/images/icons/favicon-32x32.png')}}">

    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('public/assets/images/icons/favicon-96x96.png')}}">

    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/assets/images/icons/favicon-16x16.png')}}">

    <link rel="manifest" href="{{asset('public/assets/images/icons/manifest.json')}}">

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('public/assets/images/icons/ms-icon-144x144.png')}}">

    <meta name="theme-color" content="#ffffff">

    {{-- font awesome --}}
    <script src="https://kit.fontawesome.com/d1b8dba2c9.js" crossorigin="anonymous"></script>

    {{-- Bootstrap CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">



    <!-- CORE CSS FRAMEWORK - START -->
    <link href="{{asset('public/assets/css/preloader.css')}}" type="text/css" rel="stylesheet" media="screen,projection" />


    <link href="{{asset('public/assets/css/materialize.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection" />

    <link href="{{asset('public/assets/fonts/mdi/materialdesignicons.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection" />

    <link href="{{asset('public/assets/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" type="text/css" rel="stylesheet" media="screen,projection" />



    <!-- CORE CSS FRAMEWORK - END -->

    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->

    <!-- CORE CSS TEMPLATE - START -->


    <link href="{{asset('public/assets/css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection" id="main-style" />

    <!-- CORE CSS TEMPLATE - END -->



</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->


<body class="  html" data-header="light" data-footer="dark" data-header_align="center" data-menu_type="left" data-menu="light" data-menu_icons="on" data-footer_type="left" data-site_mode="light" data-footer_menu="show" data-footer_menu_style="light">
    @if(!Auth::user())
    <div class="preloader-background">
        <div class="preloader-wrapper">
            <div id="preloader"></div>
        </div>
    </div>
    @endif
    @include('sweetalert::alert')
    <!-- START navigation -->
    <nav class="fixedtop topbar navigation" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="index.html" class=" brand-logo "><i class="mt-3 fa-solid fa-money-bill-transfer"></i>My Bank</a>
            <!-- <ul class="right hide-on-med-and-down">
        <li><a href="#">Navbar Link</a></li>
      </ul> -->

            <!-- <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Navbar Link</a></li>
      </ul> -->
            <a href="#" data-target="" class=" navicon back-button htmlmode show-on-large "><i class="fa-solid fa-chevron-left" data-page=""></i></a>
            <a href="#" data-target="slide-nav" class=" navicon sidenav-trigger show-on-large"><i class="fa-solid fa-bars"></i></a>
            <a href="#" data-target="slide-settings" class="  navicon right sidenav-trigger show-on-large pulse"><i class="fa-sharp fa-solid fa-sliders"></i></a>
            <a href="#" data-target="" class=" navicon right nav-site-mode show-on-large"><i class="fa-solid fa-circle-half-stroke"></i></a>
            <!-- <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->
        </div>
    </nav>
    <ul id="slide-nav" class="sidenav sidemenu">
        <li class="menu-close"><i class="fa fa-circle-xmark"></i></li>

        <li class="user-wrap">
            @if(Auth::user())
            <div class="user-view row">
                <!-- <div class="background">
                   <img src="assets/images/office.jpg">
                 </div> -->
                <div class="col s3 imgarea">
                    <img title="click here to add new" class="circle" onclick="_upload()" src="{{asset('assets/images/camera.png')}}" style="cursor: pointer;"></a>

                    <input id="file_upload_id" type="file" hidden>

                    <div class="col s9 infoarea">
                        <a href="#name"><span class="name">{{Auth::user()->name}}</span></a>
                        <a href="#email"><span class="email">{{Auth::user()->email}}</span></a>
                        {{-- <a href="{{route('logout')}}"><span class="text-muted">Logout</span></a> --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();" class="btn btn-outline-danger">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </div>
                </div>
                @else
                <div class="user-view d-flex flex-row justify-content-around">
                    <a href="{{route('client.login')}}" class="auth_btns btn btn-primary p-2"><span class="name">Login</span></a>

                    <a href="{{route('client.register')}}" class=" auth_btns btn btn-primary p-2"><span class="name">Register</span></a>

                </div>
                @endif
        </li>


        <li class="menulinks">
            <ul class="collapsible">
                <!-- SIDEBAR - START -->

                <!-- MAIN MENU - START -->

                <li class="sh-wrap">
                    <div class="subheader">Navigation</div>
                </li>
                <li class="lvl1 ">
                    <div class=" waves-effect ">
                        <a href="ui-pages-home.html">
                            <span class="title">Analytics</span>
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    </div>
                </li>
                <li class="lvl1 ">
                    <div class=" waves-effect ">
                        <a href="sub-apps.html">
                            <span class="title">Add Money</span><span class="badge blue-grey lighten-3 badge-rounded">NEW</span>
                            <i class="fa-solid fa-chevron-right"></i>

                        </a>
                    </div>
                </li>
                <li class="lvl1 ">
                    <div class=" waves-effect ">
                        <a href="sub-apps.html">
                            <span class="title">Withdraw Money</span><span class="badge blue-grey lighten-3 badge-rounded">NEW</span>
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    </div>
                </li>
                <li class="lvl1 ">
                    <div class=" waves-effect ">
                        <a href="sub-uielements.html">
                            <span class="title">Invest Money</span>
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    </div>
                </li>
                <li class="lvl1 ">
                    <div class=" waves-effect ">
                        <a href="sub-uielements.html">
                            <span class="title">My transactions</span>
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    </div>
                </li>
                {{-- <li class="lvl1 ">
                    <div class=" waves-effect ">
                        <a href="sub-utilities-components.html">
                            <span class="title">Components</span>
                            <i class="fa-solid fa-chevron-right"></i>

                        </a>
                    </div>
                </li>
                <li class="lvl1 ">
                    <div class=" waves-effect ">
                        <a href="sub-forms.html">
                            <i class="mdi mdi-textbox"></i>
                            <span class="title">Forms</span>
                        </a>
                    </div>
                </li>
                <li class="lvl1 ">
                    <div class=" waves-effect ">
                        <a href="sub-charts.html">
                            <i class="mdi mdi-chart-line"></i>
                            <span class="title">Charts</span><span class="badge blue-grey lighten-3 badge-rounded">HOT</span>
                        </a>
                    </div>
                </li>
                <li class="lvl1 ">
                    <div class=" waves-effect ">
                        <a href="sub-pages.html">
                            <i class="mdi mdi-shape-outline"></i>
                            <span class="title">Pages</span>
                        </a>
                    </div>
                </li>
                <li class="lvl1 ">
                    <div class=" waves-effect ">
                        <a href="sub-access.html">
                            <i class="mdi mdi-access-point"></i>
                            <span class="title">Site Access</span>
                        </a>
                    </div>
                </li>
                <li class="lvl1 ">
                    <div class=" waves-effect ">
                        <a href="sub-portfolio.html">
                            <i class="mdi mdi-grid-large"></i>
                            <span class="title">Portfolio</span>
                        </a>
                    </div>
                </li>
                <li class="lvl1 ">
                    <div class=" waves-effect ">
                        <a href="sub-blogs.html">
                            <i class="mdi mdi-square-edit-outline"></i>
                            <span class="title">Blogs</span>
                        </a>
                    </div>
                </li> --}}
                <li class="sep-wrap">
                    <div class="divider"></div>
                </li>
                <li class="sh-wrap">
                    <div class="subheader">Reach Us</div>
                </li>
                <li class="lvl1 ">
                    <div class="waves-effect ">
                        <a href="tel:+1 234 567 890">
                            <i class="mdi mdi-cellphone-basic"></i>
                            <span class="title">Phone</span> </a>
                    </div>
                </li>
                <li class="lvl1 ">
                    <div class="waves-effect ">
                        <a href="mailto:email@example.com">
                            <i class="mdi mdi-email-outline"></i>
                            <span class="title">Email</span> </a>
                    </div>
                </li>
                <li class="lvl1 ">
                    <div class="waves-effect ">
                        <a href="sms:+1 234 567 890">
                            <i class="mdi mdi-message-text-outline"></i>
                            <span class="title">Message</span> </a>
                    </div>
                </li>
                <li class="sep-wrap">
                    <div class="divider"></div>
                </li>
                <li class="lvl1 ">
                    <div class="waves-effect "><a href="#" data-target="slide-settings" class="sidenav-trigger"><i class="mdi mdi-settings-outline"></i><span class="title">Settings</span> </a>
                    </div>
                </li>

                <!-- MAIN MENU - END -->



                <!--  SIDEBAR - END -->

        </li>
    </ul>
    </li>
    <li class="copy-spacer"></li>
    <li class="copy-wrap">
        <div class="copyright">&copy; Copyright @ themepassion</div>



        </ul>
        <!-- END navigation -->


        <ul id="slide-settings" class="sidenav sidesettings right fixed">
            <li class="menulinks">
                <ul class="collapsible">
                    <!-- SIDEBAR - START -->

                    <!-- MAIN MENU - START -->

                    <li class="sh-wrap">
                        <div class="subheader">Themes</div>
                    </li>
                    <li class="lvl1  theme">
                        <div class="waves-effect appsettings " data-type="theme" data-value="red">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-intermediate red-text text-lighten-2"></i>
                                <span class="title">Red</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  theme">
                        <div class="waves-effect appsettings " data-type="theme" data-value="orange">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline deep-orange-text text-lighten-2"></i>
                                <span class="title">Orange</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  theme">
                        <div class="waves-effect appsettings " data-type="theme" data-value="blue">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline blue-text text-lighten-2"></i>
                                <span class="title">Blue</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  theme">
                        <div class="waves-effect appsettings " data-type="theme" data-value="green">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline green-text text-lighten-2"></i>
                                <span class="title">Green</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  theme">
                        <div class="waves-effect appsettings active" data-type="theme" data-value="deep-purple">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline deep-purple-text text-lighten-2"></i>
                                <span class="title">Purple</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  theme">
                        <div class="waves-effect appsettings " data-type="theme" data-value="amber">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline amber-text"></i>
                                <span class="title">Yellow</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  theme">
                        <div class="waves-effect appsettings " data-type="theme" data-value="teal">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline teal-text text-lighten-2"></i>
                                <span class="title">Teal</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  theme">
                        <div class="waves-effect appsettings " data-type="theme" data-value="pink">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline pink-text text-lighten-2"></i>
                                <span class="title">Pink</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  theme">
                        <div class="waves-effect appsettings " data-type="theme" data-value="indigo">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline indigo-text text-lighten-2"></i>
                                <span class="title">Indigo</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  theme">
                        <div class="waves-effect appsettings " data-type="theme" data-value="blue-grey">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline blue-grey-text text-lighten-2"></i>
                                <span class="title">Blue Grey</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  theme">
                        <div class="waves-effect appsettings " data-type="theme" data-value="brown">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline brown-text text-lighten-2"></i>
                                <span class="title">Brown</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  theme">
                        <div class="waves-effect appsettings " data-type="theme" data-value="cyan">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline cyan-text text-lighten-2"></i>
                                <span class="title">Cyan</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  theme">
                        <div class="waves-effect appsettings " data-type="theme" data-value="light-green">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline light-green-text text-lighten-2"></i>
                                <span class="title">Light Green</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  theme">
                        <div class="waves-effect appsettings " data-type="theme" data-value="purple">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline purple-text text-lighten-2"></i>
                                <span class="title">Violet</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  theme">
                        <div class="waves-effect appsettings " data-type="theme" data-value="grey">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline grey-text text-darken-2"></i>
                                <span class="title">Black</span> </a>
                        </div>
                    </li>
                    <li class="sep-wrap">
                        <div class="divider"></div>
                    </li>
                    <li class="sh-wrap">
                        <div class="subheader">Site Mode</div>
                    </li>
                    <li class="lvl1  site_mode">
                        <div class="waves-effect appsettings active" data-type="site_mode" data-value="light">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-intermediate"></i>
                                <span class="title">Light Mode</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  site_mode">
                        <div class="waves-effect appsettings " data-type="site_mode" data-value="dark">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline"></i>
                                <span class="title">Dark Mode</span> </a>
                        </div>
                    </li>
                    <li class="sep-wrap">
                        <div class="divider"></div>
                    </li>
                    <li class="sh-wrap">
                        <div class="subheader">Header Style</div>
                    </li>
                    <li class="lvl1  header">
                        <div class="waves-effect appsettings active" data-type="header" data-value="light">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-intermediate"></i>
                                <span class="title">Light Header</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  header">
                        <div class="waves-effect appsettings " data-type="header" data-value="dark">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline"></i>
                                <span class="title">Dark Header</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  header">
                        <div class="waves-effect appsettings " data-type="header" data-value="colored">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline"></i>
                                <span class="title">Colored Header</span> </a>
                        </div>
                    </li>
                    <li class="sep-wrap">
                        <div class="divider"></div>
                    </li>
                    <li class="sh-wrap">
                        <div class="subheader">Header Alignment</div>
                    </li>
                    <li class="lvl1  header_align">
                        <div class="waves-effect appsettings " data-type="header_align" data-value="left">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-intermediate"></i>
                                <span class="title">Left Align Header</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  header_align">
                        <div class="waves-effect appsettings active" data-type="header_align" data-value="center">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline"></i>
                                <span class="title">Center Align Header</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  header_align">
                        <div class="waves-effect appsettings " data-type="header_align" data-value="right">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline"></i>
                                <span class="title">Right Align Header</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  header_align">
                        <div class="waves-effect appsettings " data-type="header_align" data-value="app">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline"></i>
                                <span class="title">App Based Align Header</span> </a>
                        </div>
                    </li>
                    <li class="sep-wrap">
                        <div class="divider"></div>
                    </li>
                    <li class="sh-wrap">
                        <div class="subheader">Menu Style</div>
                    </li>
                    <li class="lvl1  menu">
                        <div class="waves-effect appsettings active" data-type="menu" data-value="light">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-intermediate"></i>
                                <span class="title">Light Menu</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  menu">
                        <div class="waves-effect appsettings " data-type="menu" data-value="dark">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline"></i>
                                <span class="title">Dark Menu</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  menu">
                        <div class="waves-effect appsettings " data-type="menu" data-value="colored">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline"></i>
                                <span class="title">Colored Menu</span> </a>
                        </div>
                    </li>
                    <li class="sep-wrap">
                        <div class="divider"></div>
                    </li>
                    <li class="sh-wrap">
                        <div class="subheader">Menu Type</div>
                    </li>
                    <li class="lvl1  menu_type">
                        <div class="waves-effect appsettings active" data-type="menu_type" data-value="left">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-intermediate"></i>
                                <span class="title">Left Menu</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  menu_type">
                        <div class="waves-effect appsettings " data-type="menu_type" data-value="center">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline"></i>
                                <span class="title">Centered Menu</span> </a>
                        </div>
                    </li>
                    <li class="sep-wrap">
                        <div class="divider"></div>
                    </li>
                    <li class="sh-wrap">
                        <div class="subheader">Menu Icons</div>
                    </li>
                    <li class="lvl1  menu_icons">
                        <div class="waves-effect appsettings active" data-type="menu_icons" data-value="on">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-intermediate"></i>
                                <span class="title">Menu Icons Show</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  menu_icons">
                        <div class="waves-effect appsettings " data-type="menu_icons" data-value="off">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline"></i>
                                <span class="title">Menu Icons Hide</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  menu_icons">
                        <div class="waves-effect appsettings " data-type="menu_icons" data-value="colored">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline"></i>
                                <span class="title">Menu Icons Colored</span> </a>
                        </div>
                    </li>
                    <li class="sep-wrap">
                        <div class="divider"></div>
                    </li>
                    <li class="sh-wrap">
                        <div class="subheader">Page Footer Style</div>
                    </li>
                    <li class="lvl1  footer">
                        <div class="waves-effect appsettings " data-type="footer" data-value="light">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-intermediate"></i>
                                <span class="title">Light Footer</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  footer">
                        <div class="waves-effect appsettings active" data-type="footer" data-value="dark">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline"></i>
                                <span class="title">Dark Footer</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  footer">
                        <div class="waves-effect appsettings " data-type="footer" data-value="colored">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline"></i>
                                <span class="title">Colored Footer</span> </a>
                        </div>
                    </li>
                    <li class="sep-wrap">
                        <div class="divider"></div>
                    </li>
                    <li class="sh-wrap">
                        <div class="subheader">Page Footer Type</div>
                    </li>
                    <li class="lvl1  footer_type">
                        <div class="waves-effect appsettings " data-type="footer_type" data-value="minimal">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-intermediate"></i>
                                <span class="title">Minimal Footer</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  footer_type">
                        <div class="waves-effect appsettings active" data-type="footer_type" data-value="left">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline"></i>
                                <span class="title">Left Aligned Footer</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  footer_type">
                        <div class="waves-effect appsettings " data-type="footer_type" data-value="center">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline"></i>
                                <span class="title">Centered Footer</span> </a>
                        </div>
                    </li>
                    <li class="sep-wrap">
                        <div class="divider"></div>
                    </li>
                    <li class="sh-wrap">
                        <div class="subheader">Fixed Footer Menu</div>
                    </li>
                    <li class="lvl1  footer_menu">
                        <div class="waves-effect appsettings active" data-type="footer_menu" data-value="show">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-intermediate"></i>
                                <span class="title">Show Fixed Footer Menu</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  footer_menu">
                        <div class="waves-effect appsettings " data-type="footer_menu" data-value="hide">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline"></i>
                                <span class="title">Hide Fixed Footer Menu</span> </a>
                        </div>
                    </li>
                    <li class="sep-wrap">
                        <div class="divider"></div>
                    </li>
                    <li class="sh-wrap">
                        <div class="subheader">Fixed Footer Menu Style</div>
                    </li>
                    <li class="lvl1  footer_menu_style">
                        <div class="waves-effect appsettings active" data-type="footer_menu_style" data-value="light">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-intermediate"></i>
                                <span class="title">Light Fixed Menu</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  footer_menu_style">
                        <div class="waves-effect appsettings " data-type="footer_menu_style" data-value="dark">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline"></i>
                                <span class="title">Dark Fixed Menu</span> </a>
                        </div>
                    </li>
                    <li class="lvl1  footer_menu_style">
                        <div class="waves-effect appsettings " data-type="footer_menu_style" data-value="colored">
                            <a href="#!">
                                <i class="mdi mdi-checkbox-blank-outline"></i>
                                <span class="title">Colored Fixed Menu</span> </a>
                        </div>
                    </li>

                    <!-- MAIN MENU - END -->



                    <!--  SIDEBAR - END -->
                </ul>
            </li>
        </ul>
    </li>
    </ul>


    @yield('content')


    <footer class="page-footer">
        <div class="container footer-content">
            <div class="row">
                <div class="">
                    <h5 class="logo">My Bank</h5>
                    <p class="text">My Bank is a super fast, premium and multi purpose Mobile APP UI template, with tons of features and functionalities.</p>
                </div>
                <div class="link-wrap">
                    <ul class="link-ul">
                        <li><a class="" href="#!"><i class="mdi mdi-phone"></i> +1 234 567 890</a></li>
                        <li><a class="" href="#!"><i class="mdi mdi-email"></i> email@example.com</a></li>
                        <li><a class="" href="#!"><i class="mdi mdi-map-marker"></i> FF 1, Sector-8, Tech Street, NY, USA</a></li>
                    </ul>
                    <ul class="social-wrap">
                        <li class="social">
                            <a class="" href="#!"><i class="mdi mdi-facebook"></i></a>
                            <a class="" href="#!"><i class="mdi mdi-twitter"></i></a>
                            <a class="" href="#!"><i class="mdi mdi-dribbble"></i></a>
                            <a class="" href="#!"><i class="mdi mdi-google-plus"></i></a>
                            <a class="" href="#!"><i class="mdi mdi-linkedin"></i></a>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                &copy; Copyright <a class="" href="https://themeforest.net/user/themepassion/portfolio">Themepassion</a>. All rights reserved.
            </div>
        </div>
    </footer>

    <div class="backtotop">
        <a class="btn-floating btn primary-bg">
            <i class="mdi mdi-chevron-up"></i>
        </a>
    </div>




    <div class="footer-menu">
        <ul>
            <li>
                <a href="sub-apps.html"> <i class="mdi mdi-open-in-app"></i>
                    <span>Apps</span>
                </a> </li>
            <li>
                <a href="sub-pages.html"> <i class="mdi mdi-shape-outline"></i>
                    <span>Pages</span>
                </a> </li>
            <li>
                <a href="ui-pages-home.html" class=' active'> <i class="mdi mdi-home-outline"></i>
                    <span>Home</span>
                </a> </li>
            <li>
                <a href="sub-uielements.html"> <i class="mdi mdi-laptop"></i>
                    <span>UI</span>
                </a> </li>
            <li>
                <a href="sub-utilities-components.html"> <i class="mdi mdi-flask-outline"></i>
                    <span>Components</span>
                </a> </li>

        </ul>
    </div>









    <!-- PWA Service Worker Code -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <script type="text/javascript">
        // This is the "Offline copy of pages" service worker

        // Add this below content to your HTML page, or add the js file to your page at the very top to register service worker

        // Check compatibility for the browser we're running this in
        if ("serviceWorker" in navigator) {
            if (navigator.serviceWorker.controller) {
                console.log("[PWA Builder] active service worker found, no need to register");
            } else {
                // Register the service worker
                navigator.serviceWorker
                    .register("pwabuilder-sw.js", {
                        scope: "./"
                    })
                    .then(function(reg) {
                        console.log("[PWA Builder] Service worker has been registered for scope: " + reg.scope);
                    });
            }
        }

    </script>
    {{-- file upload button javascript code --}}
    <script>
        function _upload() {
            document.getElementById('file_upload_id').click();
        }

    </script>

    <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->

    <!-- CORE JS FRAMEWORK - START -->
    <script src="{{asset('public/assets/js/jquery-2.2.4.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js
"></script>
    <script src="{{asset('public/assets/js/materialize.js')}}"></script>
    <script src="{{asset('public/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <!-- CORE JS FRAMEWORK - END -->


    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#file_upload_id").change(function() {

                //Here is where you will make your AJAX call
                console.log("Image selected!");
                const selectedFile = this.files[0];
                console.log(selectedFile);

                // validate the uploaded file
                var allowedExtension = ['jpeg', 'jpg', 'png'];
                var fileExtension = selectedFile.name.split('.').pop().toLowerCase();
                var isValidFile = false;

                for (var index in allowedExtension) {

                    if (fileExtension === allowedExtension[index]) {
                        isValidFile = true;
                        break;
                    }
                }

                if (!isValidFile) {
                    // alert('Allowed Extensions are : *.' + allowedExtension.join(', *.'));
                    jQuery.getScript('https://unpkg.com/sweetalert/dist/sweetalert.min.js', function() {

                        swal({
                                title: "Failed "
                                , text: 'Allowed Extensions are : *.' + allowedExtension.join(', *.'),

                                icon: "error"
                                , buttons: false
                                , confirmButtonColor: '#C64EB2'
                            , })
                            .then((willSubmit) => {

                            });
                    });

                } else {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'POST'
                        , url: '127.0.0.1:8000/save_image'
                        , data: selectedFile
                        , success: function(data) {

                            // You will get response from your PHP page (what you echo or print)
                            alert(data.msg);
                        }
                    });
                }

            });

            var carouselTest = $(".carousel-fullscreen");

            carouselTest.carousel({

                fullWidth: true
                , indicators: true
            });
            // setTimeout(autoplay, 3500);

            function autoplay() {
                $(".carousel").carousel("next");
                setTimeout(autoplay, 3500);
            }
            $(".slider3").slider({
                indicators: false
                , height: 200
            , });

        });

    </script>
    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->


    <!-- CORE TEMPLATE JS - START -->
    <script src="{{asset('public/assets/js/init.js')}}"></script>
    <script src="{{asset('public/assets/js/settings.js')}}"></script>

    <script src="{{asset('public/assets/js/scripts.js')}}"></script>

    <!-- END CORE TEMPLATE JS - END -->


    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            $('.preloader-background').delay(10).fadeOut('slow');
        });

    </script>
</body>

</html>
