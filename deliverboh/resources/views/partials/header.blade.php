<header class="container-fluid h-header">
  <nav class="navbar navbar-expand-md navbar-light justify-content-around">
    <a class="navbar-brand" href="{{ url('/') }}">
      <img src=" {{ asset('images/Logo.png') }} " class="logo" alt="{{ config('app.name', 'DELIVERBOH') }}">
    </a>
      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav">
        <!-- Authentication Links -->
        @if (Route::has('login'))
          @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/admin') }}">Dashboard</a>
            </li>

            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
            </li>
            
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Accedi</a>
          </li>
            @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Registrati</a>
              </li>   
            @endif 
          @endauth
        @endif
      </ul>
    </div>
  </nav>
</header>


