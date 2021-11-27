<div>
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
        <a href="{{route('admin.orders.edit', $item->id)}}">modifica ordine</a>
        <form action="{{route('admin.orders.destroy', $item->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form> 
            
        @endforeach   
        <br>
        <a href="{{route('admin.orders.create')}}">aggiungi un nuovo ordine</a>
        
    @endforeach
</div>


