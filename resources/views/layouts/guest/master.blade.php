<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MyBank Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('/public/assets/admin/vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('/public/assets/admin/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/assets/admin/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('/public/assets/admin/css/style.css')}}" {{-- <!-- End layout styles --> --}} <link rel="shortcut icon" href="{{asset('/public/assets/admin/images/favicon.png')}}" />
</head>
<body>
    @yield('content')

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('/public/assets/admin/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('/public/assets/admin/js/off-canvas.js')}}"></script>
    <script src="{{asset('/public/assets/admin/js/misc.js')}}"></script>
    <!-- endinject -->
</body>
</html>
