@foreach ($data['1'] as $dish)
	 <div>
         {{$dish['name']}}
     </div>
     <div>
         {{$dish['price']}}
     </div>
     {{$dish->id}}
     <a href="{{route('admin.edit' , $dish->id)}}">modifica piatto</a>
     <form action="{{route('admin.destroy', $dish->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form> 
@endforeach
<a href="{{route('admin.create')}}">inserisci un nuovo piatto</a>


