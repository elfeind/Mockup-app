<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/png" href="{{request()->getSchemeAndHttpHost().'/img/favicon.ico.png'}}">
    <title>Mockup App Tiara</title>

    <!-- Scripts -->
    {{-- <script src="{{request()->getSchemeAndHttpHost().'/js/app.js'}}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{request()->getSchemeAndHttpHost().'/css/ui-template.css'}}"/>
    <link rel="stylesheet" href="{{request()->getSchemeAndHttpHost().'/css/parsley.css'}}"/>

</head>
<body>
    <div id="app">
        <main class="">
            @yield('content')
        </main>
    </div>

    <!--   Core JS Files   -->
  <script>
    var base_url = '{{request()->getSchemeAndHttpHost()."/"}}';
  </script>
  <script src="{{request()->getSchemeAndHttpHost().'/js/jquery-3.6.0.min.js'}}"></script>
  <script src="{{request()->getSchemeAndHttpHost().'/js/parsley.min.js'}}"></script>
  <script src="{{request()->getSchemeAndHttpHost().'/js/loadingoverlay.js'}}"></script>
  <script src="{{request()->getSchemeAndHttpHost().'/js/loadingoverlay.min.js'}}"></script>
  <script src="{{request()->getSchemeAndHttpHost().'/js/sweetalert2.all.min.js'}}"></script>
  <script src="{{request()->getSchemeAndHttpHost().'/js/login.js'}}"></script>
  <script type="text/javascript" src="{{request()->getSchemeAndHttpHost().'/js/core/popper.min.js'}}"></script>
  <script type="text/javascript" src="{{request()->getSchemeAndHttpHost().'/js/datatables.min.js'}}"></script>
  <script type="text/javascript" src="{{request()->getSchemeAndHttpHost().'/js/jquery.dataTables.min.js'}}"></script>
  <script type="text/javascript" src="{{request()->getSchemeAndHttpHost().'/js/dataTables.bootstrap5.min.js'}}"></script>
<script type="text/javascript" src="{{request()->getSchemeAndHttpHost().'/js/home.js'}}"></script>
</body>
</html>
