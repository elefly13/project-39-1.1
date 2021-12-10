@extends('layouts.app')

@section('content')
@for ($i=0; $i< count($carrello); $i++)
     <div>
         {{$carrello[$i]['name']}} {{$carrello[$i]['id']}} 
        {{ $quanto[$i]['quantity']}}
     </div>
     
@endfor
<a href="{{route('admin.orders.index')}}">torna indietro</a>  
@endsection



