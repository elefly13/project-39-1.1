@extends('admin.dashboard')

@section('dashboard')
<div class="container big-box-show">
	<div class="row justify-content-center">
		<div>
            @foreach ($data as $dish)
            <div class="coll-sm-6 card-dish-show" >
                @if(isset($dish->image))
                <img src="{{ asset('storage/'.$dish->image)}}" alt="{{ $dish->image}}" class="card-img-top">
                @endif
                <div class="card-body">
                    <h4 class="card-title">{{$dish['name']}}</h4>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Descrizione: {{$dish['description']}}</li>
                    <li class="list-group-item">Ingredienti: {{$dish['ingredients']}}</li>
                    <li class="list-group-item">Portata: {{$dish['course']}}</li>
                    <li class="list-group-item">Caricato il: {{$dish['updated_at']}}</li>
                    <li class="list-group-item">€ {{$dish['price']}}</li>
                </ul>
                <div class="card-body">
                <a href="{{route('admin.dishes.index')}}" class="link-dettaglio-dish">torna indietro</a> 
                </div>
            </div>   
            @endforeach
        </div>
    </div>
</div>
@endsection