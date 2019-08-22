<!DOCTYPE html>
<html dir="ltr" lang="es">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <title>Administrador</title>
    @include('backend.admin.resources.top')

    @yield('css')

</head>

<body>
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<div id="main-wrapper">

    @include('backend.admin.menu.menuTop')
    @include('backend.admin.menu.leftBar')
    <div class="page-wrapper">

        @yield('breadcrumb')

       @yield('dashboard')

        <footer class="footer text-center">
            All rights reserved by <a href="">Cusubamba</a>.
        </footer>
    </div>
</div>

    @include('backend.admin.resources.custom')
    @include('backend.admin.resources.bottom')
    @yield('scripts')

</body>

</html>
