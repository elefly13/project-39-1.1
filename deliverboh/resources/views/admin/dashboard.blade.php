@extends('layouts.app')

@section('content')
 
<div class="container-fluid ">
    <div class="row coll-sm-12">

    {{-- link super user --}}
             {{-- <div><a href="{{route('admin.categories.index')}}">categorie</a></div> --}}
            {{-- <div><a href="{{route('admin.user.index')}}">modifica categorie associate allo user</a></div> --}}
        {{-- </div> --}}

        <div class="col-sm-12  col-md-11 space-dash box-big-dash" >
            <div class="col-sm-12 top-dash">
                <nav class="navbar navbar-expand-sm d-flex align-items-center">
                    {{-- AVVISO sei loggato --}}
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                    
                    <!-- Links -->
                    <ul class="navbar-nav d-flex align-items-center">
                        <li class="nav-item mx-3">
                            <span class="text-name-dash">Nome del ristorante</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-link-dash" href="{{route('admin.dishes.index')}}">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-link-dash" href="{{route('admin.orders.index')}}">Ordini</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-link-dash" href="/admin/statistiche">Statistiche</a>
                        </li>
                    </ul>        
                  </nav>    
            </div>

            @yield('dashboard')  

        </div>
    </div>
    
</div>
@endsection
