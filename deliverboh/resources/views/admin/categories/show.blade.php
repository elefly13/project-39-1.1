@extends('layouts.app')

@section('content')
    @foreach ($data as $item)
     <div>
        {{$item['cuisine']}} 
    </div>
    <a href="{{route('admin.categories.index')}}">torna indietro</a>   
    
    @endforeach
@endsection


