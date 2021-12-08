@extends('admin.dashboard')

@section('dashboard')

<div class="container-fluid">
    <div class="row col-sm-12">
        <div class="col-sm-12 col-md-6 box-order-index">
            @foreach ($data as $order)
            <div class="box-card-order">
                <p>Numero ordine </p>
                <div class="">
                    {{$order['id']}}
                </div>
                <p>Nome </p>
                <div class="">
                    {{$order['name_user']}}
                </div>
                <p>Cognome </p>
                <div class="">
                    {{$order['lastname_user']}}
                </div>
                <p>Indirizzo consegna</p>
                <div class="">
                    {{$order['delivery_address']}} 
                </div>
                <p>Importo totale</p>
                <div class="">€ 
                    {{$order['total']}}
                </div>
                <p>Note del cliente</p>
                <div class="">
                    {{$order['note']}}
                </div>
                
        
                <a href="{{route('admin.orders.show', $order->id)}}">dettaglio</a>
                <a href="{{route('admin.orders.edit', $order->id)}}">modifica ordine</a>
                <form action="{{route('admin.orders.destroy', $order->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form> 
            </div>
           
                 
            
            
        @endforeach
        <br>
            <a href="{{route('admin.orders.create')}}">aggiungi un nuovo ordine</a>

        </div>
    </div>
   
</div>

@endsection
