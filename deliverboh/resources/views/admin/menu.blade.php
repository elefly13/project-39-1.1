@foreach ($menu as $dish)
	 <div>
         {{$dish['name']}}
     </div>
     <div>
         {{$dish['price']}}
     </div>
@endforeach