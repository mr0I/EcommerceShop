<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Bigdeal admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, Bigdeal admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="pixelstrap">
  <link rel="icon" href="{{ url('images/favicon/favicon.png') }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{ url('images/favicon/favicon.png') }}" type="image/x-icon">
  <title>@yield('title')</title>

  <!-- Font Awesome-->
  <link rel="stylesheet" type="text/css" href="{{ url('css/font-awesome.css') }}">

  <!-- Flag icon-->
  <link rel="stylesheet" type="text/css" href="{{ url('css/flag-icon.css') }}">

  <!-- ico-font-->
  <link rel="stylesheet" type="text/css" href="{{ url('css/icofont.css') }}">

  <!-- Prism css-->
  <link rel="stylesheet" type="text/css" href="{{ url('css/prism.css') }}">

  <!-- Chartist css -->
  <link rel="stylesheet" type="text/css" href="{{ url('css/chartist.css') }}">

  <!-- vector map css -->
  <link rel="stylesheet" type="text/css" href="{{ url('css/vector-map.css') }}">

  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.css') }}">

  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="{{ url('css/admin.css') }}">
</head>

<body class="rtl">

<div id="container">
  @yield('content')
</div>

<!-- latest jquery-->
<script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>

<!-- Bootstrap js-->
<script src="{{ url('js/popper.min.js') }}"></script>
<script src="{{ url('js/bootstrap.js') }}"></script>

<!-- feather icon js-->
<script src="{{ url('js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ url('js/icons/feather-icon/feather-icon.js') }}"></script>

<!-- Sidebar jquery-->
<script src="{{ url('js/sidebar-menu.js') }}"></script>

<!--chartist js-->
{{--<script src="{{ url('js/chart/chartist/chartist.js') }}"></script>--}}


<!-- lazyload js-->
<script src="{{ url('js/lazysizes.min.js') }}"></script>

<!--copycode js-->
<script src="{{ url('js/prism/prism.min.js') }}"></script>
<script src="{{ url('js/clipboard/clipboard.min.js') }}"></script>
<script src="{{ url('js/custom-card/custom-card.js') }}"></script>

<!--counter js-->
<script src="{{ url('js/counter/jquery.waypoints.min.js') }}"></script>
<script src="{{ url('js/counter/jquery.counterup.min.js') }}"></script>
<script src="{{ url('js/counter/counter-custom.js') }}"></script>

<!--Customizer admin-->
<script src="{{ url('js/admin-customizer.js') }}"></script>

<!--map js-->
<script src="{{ url('js/vector-map/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ url('js/vector-map/map/jquery-jvectormap-world-mill-en.js') }}"></script>

<!--apex chart js-->
<script src="{{ url('js/chart/apex-chart/apex-chart.js') }}"></script>
<script src="{{ url('js/chart/apex-chart/stock-prices.js') }}"></script>

<!--chartjs js-->
<script src="{{ url('js/chart/flot-chart/excanvas.js') }}"></script>
<script src="{{ url('js/chart/flot-chart/jquery.flot.js') }}"></script>
<script src="{{ url('js/chart/flot-chart/jquery.flot.time.js') }}"></script>
<script src="{{ url('js/chart/flot-chart/jquery.flot.categories.js') }}"></script>
<script src="{{ url('js/chart/flot-chart/jquery.flot.stack.js') }}"></script>
<script src="{{ url('js/chart/flot-chart/jquery.flot.pie.js') }}"></script>
<!--dashboard custom js-->
{{--<script src="{{ url('js/dashboard/default.js') }}"></script>--}}

<!--right sidebar js-->
<script src="{{ url('js/chat-menu.js') }}"></script>

<!--height equal js-->
<script src="{{ url('js/equal-height.js') }}"></script>

<!-- lazyload js-->
<script src="{{ url('js/lazysizes.min.js') }}"></script>

<!--script admin-->
<script src="{{ url('js/admin-script.js') }}"></script>

</body>
</html>
