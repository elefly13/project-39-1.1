@extends('layouts.app')

@section('content')
 
<div class="container">
    <div class="row">
        <div class="col-4 prova">
            <div class="dash-box"><a href="{{route('admin.dishes.index')}}">menu</a></div>
            <div class="dash-box"><a href="{{route('admin.orders.index')}}">ordini</a></div>
            <div><a href="{{route('admin.categories.index')}}">categorie</a></div>
            <div><a href="{{route('admin.user.index')}}">modifica categorie associate allo user</a></div>
            <div class="dash-box"><a href="/admin/statistiche">statistiche</a></div>
        </div>
        <div class="col-8 prova-2"></div>
    </div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {{ __('You are logged in!') }}
    </div>
    
</div>
@endsection
