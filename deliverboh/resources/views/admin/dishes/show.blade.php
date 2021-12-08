@extends('admin.dashboard')

@section('dashboard')
<div class="container big-box-show">
	<div class="row justify-content-center">
		<div class="coll-sm-12">
            @foreach ($data as $dish)
            <div class="coll-sm-6 card-dish-show" >
                <img class="img-dish-show" src="{{ asset('./images/image-dish/' . $dish['image']) }}" alt="{{$dish['name']}} ">
                <h2 class="text-show">{{$dish['name']}} </h2>
                <h2 class="text-show">€ {{$dish['price']}}</h2>
                <div class="text-show">Descrizione: {{$dish['description']}}</div>
                <div class="text-show">Portata: {{$dish['course']}}</div>
                <div class="text-show">Caricato il: {{$dish['updated_at']}}</div>
                <a href="{{route('admin.dishes.index')}}">torna indietro</a>  
            </div>   
            @endforeach
        </div>
    </div>
</div>
@endsection