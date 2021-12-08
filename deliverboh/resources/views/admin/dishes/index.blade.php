@extends('admin.dashboard')

@section('dashboard')
@if (session('status'))
	<div class="alert alert-success">
		{{ session('status') }}
	</div>
    
@endif
<a class="link-dish-index btn-top-index" href="{{route('admin.dishes.create')}}">Aggiungi un nuovo piatto</a>
<a class="link-dish-index btn-top-index" href="{{route('admin.index')}}">Torna indietro</a> 
<div class="big-box-dish" >
    @foreach ($data as $dish)
    <div class="card-dish-index" >

        <img class="img-dish-index" src="{{ asset('storage/' . $dish['image']) }}" alt="{{$dish['name']}} ">
        <h4 class="nome-dish-index">{{$dish['name']}} </h4>
        <p>Descrizione:</p>
        <p class="p-dish-index">{{$dish['description']}}</p>
        <h4 class="nome-dish-index">€{{$dish['price']}}</h4>
        <p>Ingredienti:</p>
        <p class="p-dish-index">{{$dish['ingredients']}}</p>
        <p class="p-dish-index">{{$dish['course']}}</p>
        <div class="overlay-dish-index">
            <div class="det-mod">
                <a class="link-dish-index" href="{{route('admin.dishes.show', $dish->id)}}">Dettaglio</a>
                <a class="link-dish-index" href="{{route('admin.dishes.edit', $dish->id)}}">Modifica piatto</a>
            </div>
            <form action="{{route('admin.dishes.destroy', $dish->id)}}" class="d-inline-block delete-post"  method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-dish-index">Delete</button>
            </form> 
        </div>
    </div>
    @endforeach   
</div>
@endsection
