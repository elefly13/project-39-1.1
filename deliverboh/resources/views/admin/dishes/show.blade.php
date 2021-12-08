@extends('layouts.app')

@section('content')
@foreach ($data as $dish)
     <div>
        {{$dish['name']}} 
    </div>
    <div>
        {{$dish['price']}}
    </div>
    <div>
        {{$dish['description']}}
    </div>
    <div>
        {{$dish['course']}}
    </div>
    @if(isset($dish->image))
	<img src="{{ asset('storage/'.$dish->image)}}" alt="{{ $dish->image}}">
    @endif
    <div>
        {{$dish['updated_at']}}
    </div>
    <a href="{{route('admin.dishes.index')}}">torna indietro</a>   
@endforeach
@endsection


