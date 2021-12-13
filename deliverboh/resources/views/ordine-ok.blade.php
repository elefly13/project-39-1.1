<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DeliverBoh') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('scss/app.scss') }}" rel="stylesheet"> --}}
</head>
<body>
    
    <div class="container-fluid-special">
        <div class="row justify-content-center">
            <div class="big-box-ordine col-md-8 col-lg-12">
                <h1>Il tuo Ordine è stato correttamente processato</h1>
                <h3>A breve riceverai una mail di riepilogo</h3>
                <h2>Grazie per averci scelto</h2>
                <a href="/">Torna alla Home</a> 
            </div>
            <div class="col-md-10">
                <div class="box-animazione">
                    <img src="../images/paese.svg" alt="">
                    <div class="bici">
                        <img class="animazione" src="../images/bike.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>





