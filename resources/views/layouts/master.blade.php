<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

  <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">

  <script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/pace.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/core/libraries/bootstrap.min.js') }}"></script>
  
  <script type="text/javascript" src="{{ asset('assets/js/angular/angular.min.js') }}"></script>
  <!-- <script type="text/javascript" src="{{ asset('assets/js/angular/angular-sanitize.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/angular/app.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/angular/loading-bar.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/angular/service.js') }}"></script> -->
  <style>


  .navbar-inverse {
    border-radius: 0px;
  }
  .navbar {
    margin-bottom: 0px;
  }
  a {
    color: #333;
    text-decoration: none;
  }
</style>
</head>
<body style="background: #e1ebf5;">
  <div class="container" style="
  background: #fff;
  box-shadow: 0 3px 10px rgba(0, 0, 50, 0.1);">
  <div class="row" style="margin-top: 15px;">
    <div class="col-md-6">
      LOGO
    </div>
    <div class="col-md-6">
      <div class="col-md-6">
       ติดตามเรา :08-123-456-789
       <img src="/img/facebook.png">
       <img src="/img/line.png">
     </div>
     <div class="col-md-6">

      <div style="text-align: right;">
        <a href="/login">สมัครสมาชิก</a>
        <a href="/register">เข้าสู่ระบบ</a>
      </div>
    </div>


  </div>
</div>

<div class="row" style="margin-top: 15px;">

 <!--  <nav class="navbar navbar-inverse">

    <div class="navbar-header">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
      <a class="navbar-brand" href="/">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="/">หน้าแรก</a></li>
      <li><a href="/foodmenu">เมนูอาหาร</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>

  </nav> -->
  <nav class="navbar navbar-inverse">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     <ul class="nav navbar-nav">
      <li><a href="/">หน้าแรก</a></li>
      <li><a href="/foodmenu">เมนูอาหาร</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>

  </div><!-- /.navbar-collapse -->

</nav>
</div>

@yield('content')
@include('layouts.footer')


</div>

</body>
</html>
