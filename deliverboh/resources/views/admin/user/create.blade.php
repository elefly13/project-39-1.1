<form action="{{route('admin.dishes.store')}}" method="post">
	@csrf
	@method('POST') 

	<div class="form-group">
		<label for="name">name</label>
		<input type="text" name="name" class="form-control" id="name" placeholder="Inserisci il nome">     
	</div>
	<div class="form-group">
		<label for="ingredients">ingredients</label>
		<input type="text-area" name="ingredients" class="form-control" id="ingredients">     
	</div>
	<div class="form-group">
		<label for="price">price</label>
		<input type="number" name="price" class="form-control" id="price" placeholder="inserisci il prezzo">
	</div>
	<div class="form-group">
		<label for="description">description</label>
		<input type="text" name="description" class="form-control" id="description" placeholder="descrivi il piatto">     
	</div>
	<div class="form-group">
		<label for="visibility">visibility</label>
		<input type="checkbox" name="visibility" class="form-control" id="visibility" value="{{ ('checked' ? 1 : NULL)}}">     
	</div>
	{{-- <div class="form-group">
		<label for="lastname">lastname</label> INSERIRE IMMAGINE
		<input type="text" name="lastname_user" class="form-control" id="lastname" placeholder="buyer lastname">     
	</div> --}}
	<div class="form-group">
		<label for="course">course</label>
		<input type="text" name="course" class="form-control" id="course" placeholder="scrivi il tipo di portata">     
	</div>

	<button type="submit" class="btn btn-primary">Submit</button>
</form>
