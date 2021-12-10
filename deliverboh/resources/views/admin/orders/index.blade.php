@extends('admin.dashboard')

@section('dashboard')

<div class="container-fluid">
    <div class="row col-12 justify-content-center">
        <div class="col-sm-12 col-md-8 box-order-index">
            @foreach ($data as $order)
            <div class=" col-12 box-card-order">
                <table class="table table-order-index">
                    <thead>
                      <tr class="row-head">
                        <th scope="col">N.Ordine</th>
                        {{-- <th scope="col">Nome</th> --}}
                        <th scope="col">Cognome</th>
                        <th scope="col">indirizzo consegna</th>
                        <th scope="col">Importo Totale</th>
                        {{-- <th scope="col">Nota del cliente</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">{{$order['id']}}</th>
                        {{-- <td>{{$order['name_user']}}</td> --}}
                        <td>{{$order['lastname_user']}}</td>
                        <td>{{$order['delivery_address']}}</td>
                        <td>€ {{$order['total']}}</td>
                        {{-- <td>{{$order['note']}}</td> --}}
                      </tr>
                    </tbody>
                  </table>   
                
                
        
                <a href="{{route('admin.orders.show', $order->id)}}">dettaglio</a>
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

@endsection
