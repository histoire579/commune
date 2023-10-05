<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Administration Bddpromhandicam</title>

  <!-- Favicons -->
  <link href="{{ asset('dist/assets/img/icon.png') }}" rel="shortcut icon">
  <link href="{{ asset('dash/img/apple-touch-icon.png') }}" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('dash/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!--external css-->
  <link href="{{ asset('dash/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{ asset('dash/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('dash/css/style-responsive.css') }}" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
  <style>
    body {
      /* background-image: url("{{ asset('dash/img/login-bg.jpg') }}"); */
      
      background-position: center;
      background-size: cover;
    }
  </style>
</head>

<body >
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      @yield('content')
  <!-- js placed at the end of the document so the pages load faster -->
  <script src=""></script>
  <script src="{{ asset('dash/lib/jquery/jquery.min.js') }}" defer></script>
  <script src="{{ asset('dash/lib/bootstrap/js/bootstrap.min.js') }}" defer></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script src="{{ asset('dash/lib/jquery.backstretch.min.js') }}" defer></script>
  <script>
    $.backstretch("{{ asset('dash/img/login-bg.jpg') }}", {
      speed: 500
    });
  </script>
</body>

</html>
