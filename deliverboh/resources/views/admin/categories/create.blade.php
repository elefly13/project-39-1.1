@extends('layouts.app')

@section('content')
<form action="{{route('admin.categories.store')}}" method="post">
	@csrf
	@method('POST') 

	<div class="form-group">
		<label for="cuisine">cuisine</label>
		<input value="{{old('cuisine')}}" type="text" name="cuisine" class="form-control @error('cuisine') is-invalid @enderror" id="cuisine">  
		@error('cuisine')
			<div class="alert alert-danger">{{ $message }}  </div>
		@enderror   
	</div>

	<button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection