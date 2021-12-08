@extends('layouts.app')
@section('content')
    
<div>
    {{-- @dd($categories) --}}
        <div>
            {{$user['name']}} 
        </div>
        <form action="{{route('admin.user.update', $user['id'] )}}" method="post">
            @csrf
            @method('PUT') 
                @foreach ($categories as $category)
                    <div class="form-group">
                        <label for="{{$category->id}}">{{$category->cuisine}}</label>
                        <input type="checkbox" name="category[]" class="form-control" id="{{$category->id}}" value="{{('checked' ? $category->id : NULL)}}">
                    </div>
                @endforeach
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
         
        <br>
        <a href="{{route('admin.index')}}">torna indietro</a>   
        
</div>

@endsection


