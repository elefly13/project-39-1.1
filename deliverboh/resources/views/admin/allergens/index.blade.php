<div>
    @foreach ($data as $allergen)
        <div>
            {{$allergen['name']}} 
        </div>
       

        <a href="{{route('admin.allergens.show', $allergen->id)}}">dettaglio</a>
        <a href="{{route('admin.allergens.edit', $allergen->id)}}">modifica allergene</a>
        <form action="{{route('admin.allergens.destroy', $allergen->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form> 
            
        <br>
        
        @endforeach
        <a href="{{route('admin.allergens.create')}}">aggiungi un nuovo piatto</a>
        <a href="{{route('admin.index')}}">torna indietro</a>   
</div>


