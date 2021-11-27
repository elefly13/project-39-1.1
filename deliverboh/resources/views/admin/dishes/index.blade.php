<div>
    @foreach ($data as $dish)
        <div>
            {{$dish['name']}} 
        </div>
        <div>
            {{$dish['price']}}
        </div>
        <div>
            {{$dish['description']}}
        </div>
        <div>
            {{$dish['ingredients']}}
        </div>
        <div>
            {{$dish['course']}}
        </div>

        <a href="{{route('admin.dishes.show', $dish->id)}}">dettaglio</a>
        <a href="{{route('admin.dishes.edit', $dish->id)}}">modifica ordine</a>
        <form action="{{route('admin.dishes.destroy', $dish->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form> 
            
        <br>
        
        @endforeach
        <a href="{{route('admin.dishes.create')}}">aggiungi un nuovo piatto</a>
        <a href="{{route('admin.index')}}">torna indietro</a>   
</div>


