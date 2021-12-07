@extends('admin.dashboard')

@section('dashboard')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8 overflow-create">
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
        </div>
    </div>
</div>
@endsection