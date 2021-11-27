@foreach ($data as $order)
	 @foreach ($order as $item)
     <div>
        {{$item['delivery_address']}} 
    </div>
    <div>
        {{$item['total']}}
    </div>
    <div>
        {{$item['note']}}
    </div>
    <div>
        {{$item['name_user']}}
    </div>
    <div>
        {{$item['lastname_user']}}
    </div>

    <a href="{{route('admin.orders.show', $item->id)}}">dettaglio</a>
         
     @endforeach     
@endforeach


