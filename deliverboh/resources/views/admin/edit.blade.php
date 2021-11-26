<form action="{{route('admin.update', $dish['id'] )}}" method="post">
	@csrf
	@method('PUT') 

	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" name="name" class="form-control" id="title" placeholder="Enter new dish">     
	</div>
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" name="ingredients" class="form-control" id="title" placeholder="Enter new dish">     
	</div>
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" name="price" class="form-control" id="title" placeholder="Enter new dish">     
	</div>
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" name="description" class="form-control" id="title" placeholder="Enter new dish">     
	</div>
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" name="visibility" class="form-control" id="title" placeholder="Enter new dish">     
	</div>
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" name="course" class="form-control" id="title" placeholder="Enter new dish">     
	</div>

	<button type="submit" class="btn btn-primary">Submit</button>
</form>
