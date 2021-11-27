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
        {{$dish['course']}}
    </div>
    <div>
        {{$dish['updated_at']}}
    </div>
    <a href="{{route('admin.dishes.index')}}">torna indietro</a>   
@endforeach


