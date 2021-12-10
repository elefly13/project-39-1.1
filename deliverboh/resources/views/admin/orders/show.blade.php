@extends('admin.dashboard')

@section('dashboard')
<div class="container-fluid">
    <div class="row col-12 justify-content-center">
        <div class="col-sm-12 col-md-8 box-order-index">
            @foreach ($data as $item)
            <div class=" col-12 box-card-order">
                <table class="table table-order-index">
                    <thead>
                      <tr class="row-head">
                        <th scope="col">N.Ordine</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Cognome</th>
                        <th scope="col">indirizzo consegna</th>
                        <th scope="col">Importo Totale</th>
                        <th scope="col">Nota del cliente</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">{{$order['id']}}</th>
                        <td>{{$order['name_user']}}</td>
                        <td>{{$order['lastname_user']}}</td>
                        <td>{{$order['delivery_address']}}</td>
                        <td>€ {{$order['total']}}</td>
                        <td>{{$order['note']}}</td>
                      </tr>
                    </tbody>
                </table>   
                
                
        
                <a href="{{route('admin.orders.index')}}">Torna indietro</a>
                {{-- <a href="{{route('admin.orders.edit', $order->id)}}">modifica ordine</a>
                <form action="{{route('admin.orders.destroy', $order->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>  --}}
            </div>
        @endforeach
        {{-- <br>
            <a href="{{route('admin.orders.create')}}">aggiungi un nuovo ordine</a> --}}

        </div>
    </div>
   
</div>







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