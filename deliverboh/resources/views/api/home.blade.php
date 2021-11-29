{{-- Questa è la nostra index --}}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  
  <title>Sono l'index</title>
</head>
<body>
    @include('partials.header')


    













    {{-- <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="logo">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        
                        <img src="../images/Logo.png" alt="Logo Deliverboh">
                    </a>
                </div>
                @if (Route::has('login'))
                <div style="
                position: absolute;
                right: 10px;
                top: 18px;
                color: red;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                ">
                    @auth
                        <a href="{{ url('/admin') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Accedi</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registrati</a>
                            @endif
                            <a href="#">Carrello</a>        
                    @endauth
                </div>
                @endif
            </div>
        </div>
    </div> --}}
    
  <div id="app">

  </div>
  <script src="{{asset('js/front.js')}}"></script>   
</body>
</html>




