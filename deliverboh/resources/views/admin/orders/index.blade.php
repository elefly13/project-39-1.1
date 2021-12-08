@extends('layouts.app')

@section('content')
    
<div>
    @foreach ($data as $order)
        <div>
            {{$order['delivery_address']}} 
        </div>
        <div>
            {{$order['total']}}
        </div>
        <div>
            {{$order['note']}}
        </div>
        <div>
            {{$order['name_user']}}
        </div>
        <div>
            {{$order['lastname_user']}}
        </div>

        <a href="{{route('admin.orders.show', $order->id)}}">dettaglio</a>
        <a href="{{route('admin.orders.edit', $order->id)}}">modifica ordine</a>
        <form action="{{route('admin.orders.destroy', $order->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form> 
             
        
        
    @endforeach
    <br>
        <a href="{{route('admin.orders.create')}}">aggiungi un nuovo ordine</a>
</div>
@endsection


