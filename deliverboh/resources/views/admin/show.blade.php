@foreach ($data['1'] as $dish)
	 <div>
         {{$dish['name']}}
     </div>
     <div>
         {{$dish['price']}}
     </div>
     {{$dish->id}}
     <a href="{{route('admin.edit', $dish['id'] )}}">modifica piatto</a>
@endforeach
<a href="{{route('admin.create')}}">inserisci un nuovo piatto</a>


