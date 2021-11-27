@foreach ($data as $item)
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
    <a href="{{route('admin.orders.index')}}">torna indietro</a>   
@endforeach


