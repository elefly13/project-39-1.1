@extends('layouts.app')

@section('content')
@for ($i=0; $i< count($carrello); $i++)
     <div>
         {{$carrello[$i]['name']}} {{$carrello[$i]['id']}} 
         {{-- @dd($order) --}}
        {{ $quanto[$i]['quantity']}}
     </div>
     
     @endfor
     {{ $order->created_at}}
<a href="{{route('admin.orders.index')}}">torna indietro</a>  
@endsection



{{-- "id" => 2
        "user_id" => 2
        "name" => "napoli"
        "ingredients" => "mozzarella, pomodoro bio, acciughe e origano"
        "price" => "7.00"
        "description" => "Pizza Napoli"
        "visibility" => 1
        "image" => "dish_photos/dish-2.jpg"
        "course" => "pizze"
        "created_at" => "2021-12-08 23:13:04"
        "updated_at" => "2021-12-08 23:13:04" --}}