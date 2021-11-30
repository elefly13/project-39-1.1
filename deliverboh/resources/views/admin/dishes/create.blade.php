@extends('layouts.app')

@section('content')
 

<form action="{{route('admin.dishes.store')}}" method="post">
	@csrf
	@method('POST') 

	<div class="form-group">
		<label for="name">name</label>
		<input value="{{old('name')}}" type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Inserisci il nome">  
		@error('name')
			<div class="alert alert-danger">{{ $message }}  </div>
		@enderror
	 
	</div>
	<div class="form-group">
		<label for="ingredients">ingredients</label>
		<input value="{{old('name')}}" type="text-area" name="ingredients" class="form-control" id="ingredients">     
	</div>
	<div class="form-group">
		<label for="price">price</label>
		<input value="{{old('price')}}"v type="number" name="price" class="form-control  @error('price') is-invalid @enderror" id="price" placeholder="inserisci il prezzo">
		@error('price')
			<div class="alert alert-danger">{{ $message }}  </div>
		@enderror
	</div>
	<div class="form-group">
		<label for="description">description</label>
		<input value="{{old('description')}}" type="text" name="description" class="form-control" id="description" placeholder="descrivi il piatto">     
	</div>
	 <div class="form-group">
		<label for="visibility">visibility</label>
		<input   type="checkbox" name="visibility" class="form-control" id="visibility" value="{{ ('checked' ? 1 : 0)}}">     
	</div>
	{{-- <div class="form-group">
		<label for="lastname">lastname</label> INSERIRE IMMAGINE
		<input value="{{old('lastname_user')}}" type="text" name="lastname_user" class="form-control" id="lastname" placeholder="buyer lastname">     
	</div> --}}
	<div class="form-group">
		<label for="course">course</label>
		<input value="{{old('course')}}" type="text" name="course" class="form-control  @error('price') is-invalid @enderror" id="course" placeholder="scrivi il tipo di portata">  
		@error('course')
			<div class="alert alert-danger">{{ $message }}  </div>
		@enderror   
	</div>
	<div class="form-group">
    <p>Seleziona gli allergeni:</p>
    @foreach ($allergens as $allergen)
        <div class="form-check form-check-inline">
            <input {{in_array($allergen->id, old('allergens', [])) ? 'checked' : null}}
			 value="{{ $allergen->id }}" type="checkbox" name="allergens[]" class="form-check-input" id="{{'allergen' . $allergen->id}}">
            <label class="form-check-label" for="{{'allergen' . $allergen->id}}">{{ $allergen->name }}</label>
        </div>   
    @endforeach
	</div>

	<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection