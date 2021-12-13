@extends('admin.dashboard')

@section('dashboard')
<div class="container-fluid">
  <div class="row col-12 justify-content-center">
    <div class="col-sm-12 col-md-8 box-order-index">
      <div class=" col-11 box-card-order">
        <table class="col-11 table table-order-index">
          <thead>
            <tr class="row-head">
              <th scope="col">Numero piatto</th>
              <th scope="col">Nome piatto</th>
              <th scope="col">Ingredienti</th>
              <th scope="col">Quantità</th>
            </tr>
          </thead>
          <tbody>
            @for ($i=0; $i< count($carrello); $i++)
            <tr>
              <th scope="row">{{$carrello[$i]['id']}} </th>
              <td>{{$carrello[$i]['name']}}</td>
              <td>{{$carrello[$i]['ingredients']}}</td>
              <td>{{ $quanto[$i]['quantity']}}</td> 
            </tr>
            @endfor
          </tbody>
        </table>  
            {{-- <div>
                {{$carrello[$i]['name']}} {{$carrello[$i]['id']}} 
                
                {{ $quanto[$i]['quantity']}}
            </div> --}}
             <p>Ordine effettuato il  {{ $order->created_at}} </p>   
          <a class="link-dettaglio-order" href="{{route('admin.orders.index')}}">torna indietro</a>  

        </div>   
      </div>
    </div>
  </div>
</div>

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