<form action="{{route('admin.dishes.update', $dish['id'] )}}" method="post">
	@csrf
	@method('PUT') 

	<div class="form-group">
		<label for="name">name</label>
		<input value="{{old('name', $dish->name)}}" type="text" name="name" class="form-control" id="name" placeholder="Inserisci il nome">     
	</div>
	<div class="form-group">
		<label for="ingredients">ingredients</label>
		<input value="{{old('ingredients', $dish->ingredients)}}"  type="text-area" name="ingredients" class="form-control" id="ingredients">     
	</div>
	<div class="form-group">
		<label for="price">price</label>
		<input value="{{old('price', $dish->price)}}"  type="number" name="price" class="form-control" id="price" placeholder="inserisci il prezzo">
	</div>
	<div class="form-group">
		<label for="description">description</label>
		<input value="{{old('description', $dish->description)}}"  type="text" name="description" class="form-control" id="description" placeholder="descrivi il piatto">     
	</div>
	<div class="form-group">
		<label for="visibility">visibility</label>
		<input value="{{old('visibility', $dish->visibility)}}"  type="checkbox" name="visibility" class="form-control" id="visibility" value="{{ ('checked' ? 1 : NULL)}}">     
	</div>
	{{-- <div class="form-group">
		<label for="lastname">lastname</label> INSERIRE IMMAGINE
		<input value="{{old('lastname_user', $dish->lastname_user)}}"  type="text" name="lastname_user" class="form-control" id="lastname" placeholder="buyer lastname">     
	</div> --}}
	<div class="form-group">
		<label for="course">course</label>
		<input value="{{old('course', $dish->course)}}"  type="text" name="course" class="form-control" id="course" placeholder="scrivi il tipo di portata">     
	</div>
	<div class="form-group">
    <p>Seleziona gli allergeni:</p>
    @foreach ($allergens as $allergen)
        <div class="form-check form-check-inline">
            <input {{in_array($allergen->id, old('allergens', [])) ? 'checked' : null}}
			 {{$dish->allergens->contains($allergen) ? 'checked' : null}} value="{{ $allergen->id }}" type="checkbox" name="allergens[]" class="form-check-input" id="{{'allergen' . $allergen->id}}">
            <label class="form-check-label" for="{{'allergen' . $allergen->id}}">{{ $allergen->name }}</label>
        </div>   
    @endforeach
	</div>

	<button type="submit" class="btn btn-primary">Submit</button>
</form>
