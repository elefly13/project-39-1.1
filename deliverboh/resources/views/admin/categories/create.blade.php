<form action="{{route('admin.categories.store')}}" method="post">
	@csrf
	@method('POST') 

	<div class="form-group">
		<label for="cuisine">cuisine</label>
		<input type="text" name="cuisine" class="form-control" id="cuisine" >     
	</div>

	<button type="submit" class="btn btn-primary">Submit</button>
</form>
