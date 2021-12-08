@extends('layouts.app')

@section('content')
 

<div class="container-fluid space">
    {{-- AVVISO sei loggato --}}
    {{-- <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {{ __('You are logged in!') }}
    </div> --}}

    <div class="row box-center">
        <div class="col-3 box-side-left-dash ">
           
            <div class="dash-box"><a href="{{route('admin.dishes.index')}}">menu</a></div>
            <div class="dash-box"><a href="{{route('admin.orders.index')}}">ordini</a></div>
            @auth
                @if(Auth::user()->id === 1)
                <div><a href="{{route('admin.categories.index')}}">categorie</a></div>
                <div><a href="{{route('admin.user.index')}}">modifica categorie associate allo user</a></div>
                @endif
            @endauth
            <div class="dash-box"><a href="/admin/statistiche">statistiche</a></div>
        </div>
        <div class="col-9 box-side-right-dash" >
            <div class="col-12 top-dash-right">
                
            </div>
            @yield('dashboard')  

        </div>
    </div>
    
</div>
@endsection
