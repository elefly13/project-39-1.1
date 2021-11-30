<header>
  {{-- io sono l header dell home-balde --}}
  <div class="box-80 navbar-expand-md">
      <div>
          <a href="{{ url('/') }}">
              {{-- inserisco il logo --}}
              <img class="logo" src="../images/Logo.png" alt="Logo Deliverboh">
          </a>
      </div>
      <div class="nav">
        @if (Route::has('login'))
                @auth
                    <a href="{{ url('/admin') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Accedi</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Registrati</a>
                        @endif
                        <a href="#">Carrello</a>        
                @endauth
        @endif
      </div>
  </div>
</header>

{{-- <script src="{{asset('js/front.js')}}"></script>    --}}



