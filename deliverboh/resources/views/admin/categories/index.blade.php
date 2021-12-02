@extends('layouts.app')

@section('content')
 
<div>
    @if (session('status'))
	<div class="alert alert-success">
		{{ session('status') }}
	</div>
    @endif
    @foreach ($data as $category)
        <div>
            {{$category['cuisine']}} 
        </div>
        <a href="{{route('admin.categories.show', $category->id)}}">dettaglio</a>
        <a href="{{route('admin.categories.edit', $category->id)}}">modifica ordine</a>
        <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form> 
             
        
        
    @endforeach
    <br>
        <a href="{{route('admin.categories.create')}}">aggiungi un nuovo ordine</a>
</div>

@endsection
