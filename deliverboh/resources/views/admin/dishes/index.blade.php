@extends('admin.dashboard')

@section('dashboard')
@if (session('status'))
	<div  class="my-alert">
		{{ session('status') }}
	</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <a class="link-dish-index btn-top-index" href="{{route('admin.dishes.create')}}">Aggiungi un nuovo piatto</a>
    </div>
    

</div>
{{-- <a class="link-dish-index btn-top-index" href="{{route('admin.index')}}">Torna indietro</a>  --}}
<div class="col-sm-12 big-box-dish" >
    @foreach ($data as $dish)
    <?php
        $toggle = false;
    ?>
    <div class="card-dish-index {{($dish['visibility'] == 0) ? 'card-gray' : ''}}"  >
        @if ($toggle == false)
            
            <img class="img-dish-index" src="{{ asset('storage/'.$dish['image']) }}" alt="{{$dish['name']}} ">
            <h4 class="nome-dish-index">{{$dish['name']}} </h4>
            <p>Descrizione:</p>
            <p class="p-dish-index">{{$dish['description']}}</p>
            <h4 class="nome-dish-index">€ {{$dish['price']}}</h4>
            <p>Ingredienti:</p>
            <p class="p-dish-index">{{$dish['ingredients']}}</p>
            {{-- <p>Allergeni:</p> --}}
            {{-- <p class="p-dish-index">{{$allergen['name']}}</p> --}}
            <p class="p-dish-index">{{$dish['course']}}</p>
            <p>{{($dish['visibility'] == 0) ? 'Non visibile' : 'Visibile'}}</p>
            <div class="overlay-dish-index">
                <div class="det-mod">
                    <a class="link-dish-index" href="{{route('admin.dishes.show', $dish->id)}}">Dettaglio</a>
                    <form action="{{route('admin.dishes.destroy', $dish->id)}}" class="d-inline-block delete-post"  method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="window.confirmDelete()" type="submit" class="btn btn-dish-index" >Delete</button>
                    </form> 
                    <a class="link-dish-index" href="{{route('admin.dishes.edit', $dish->id)}}">Modifica piatto</a>
                </div>
               
            </div>
            
        @endif 
    </div>
    @endforeach   
</div>
@endsection
