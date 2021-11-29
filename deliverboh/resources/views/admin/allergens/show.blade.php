@foreach ($data as $allergen)
     <div>
        {{$allergen['name']}} 
    </div>
    
    <a href="{{route('admin.allergens.index')}}">torna indietro</a>   
@endforeach


