<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cakebox Middleware') }}</title>

    <!-- Styles -->
    <link href="{{ asset('assets/auth/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/auth/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="configLoginScreen">
        <div class="configLoginScreenContainer">
            <div class="configLoginCompanyLogoWrapper">
                <img src="{{ asset('assets/auth/img/cakebox-logo.png') }}">
            </div>
            <div class="configProductName">
                SIGNAGE
            </div>
            @yield('content')
            <div class="configLoginCopyright">
                © 2016 - @php echo date('Y') @endphp Cakebox Co., Ltd <label class="label" style="background-color: #016d77;border-color: #316d77;color: #fff;">version {{env('VERSION_NUMBER')}}</label>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/auth/js/app.js') }}"></script>
</body>
</html>