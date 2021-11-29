<form action="{{route('admin.allergens.update', $allergen['id'] )}}" method="post">
	@csrf
	@method('PUT') 

	<div class="form-group">
		<label for="name">name</label>
		<input type="text" name="name" class="form-control" id="name" placeholder="Inserisci il nome">     
	</div>
	 

	<button type="submit" class="btn btn-primary">Submit</button>
</form>
