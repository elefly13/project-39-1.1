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
                <h1>Il tuo Ordine non è andato a buon fine</h1>
                <h3>Controlla che tutto sia corretto!</h3>
                <a href="/">Torna al pagamento</a> 
            </div>
            <div class="col-md-10">
                <div class="box-animazione">
                    <img src="../images/paese.svg" alt="">
                    <div class="bici">
                        <img class="fallito" src="../images/bike.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>




