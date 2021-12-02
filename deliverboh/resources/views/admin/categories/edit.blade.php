@extends('layouts.app')

@section('content')
<form action="{{route('admin.categories.update', $categories['id'] )}}" method="post">
	@csrf
	@method('PUT') 

	<div class="form-group">
		<label for="cuisine">cuisine</label>
		<input  value="{{old('cuisine', $categories->cuisine)}}" type="text" name="cuisine" class="form-control @error('name') is-invalid @enderror" id="cuisine">     
		@error('cuisine')
		<div class="alert alert-danger">{{ $message }}  </div>
		@enderror   
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>	
@endsection
