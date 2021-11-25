@extends('layouts.app')

@section('content')
 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                
                <div><a href="{{route('admin.menu', ['id' => $user['id']])}}">menu</a> </div>
                <div><a href="/admin/ordini">ordini</a></div>
                <div><a href="/admin/statistiche">statistiche</a></div>
            </div>
        </div>
    </div>
</div>
@endsection
