<form action="{{route('admin.categories.update', $categories['id'] )}}" method="post">
	@csrf
	@method('PUT') 

	<div class="form-group">
		<label for="cuisine">cuisine</label>
		<input type="text" name="cuisine" class="form-control" id="cuisine" >     
	</div>

	<button type="submit" class="btn btn-primary">Submit</button>
</form>
