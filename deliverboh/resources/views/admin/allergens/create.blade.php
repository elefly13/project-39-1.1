<form action="{{route('admin.allergens.store')}}" method="post">
	@csrf
	@method('POST') 

	<div class="form-group">
		<label for="name">name</label>
		<input type="text" name="name" class="form-control" id="name" placeholder="Inserisci il nuovo allergene">     
	</div>
	 

	<button type="submit" class="btn btn-primary">Submit</button>
</form>
