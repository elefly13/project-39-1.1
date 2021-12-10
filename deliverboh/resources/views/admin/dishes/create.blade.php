@extends('admin.dashboard')

@section('dashboard')
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="coll-sm-12 col-md-8">
			<div class="card-header header-create">
				<h4>Aggiungi un piatto al tuo menu</h4>
			</div>
			<div class="card my-card-create">
				
				<form action="{{route('admin.dishes.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					@method('POST') 

					<div class="form-group">
						<label for="name">Nome piatto</label>
						<input value="{{old('name')}}" type="text" name="name" class="form-control my-form @error('name') is-invalid @enderror" id="name" placeholder="Inserisci il nome">  
						@error('name')
							<div class="alert alert-danger">{{ $message }}  </div>
						@enderror
					
					</div>
					<div class="form-group">
						<label for="ingredients">Ingredienti</label>
						<input value="{{old('name')}}" type="text-area" name="ingredients" class="form-control my-form" id="ingredients">     
					</div>
					<div class="form-group">
						<label for="price">Prezzo</label>
						<input step="any" value="{{old('price')}}" type="number" name="price" class="form-control my-form @error('price') is-invalid @enderror" id="price" placeholder="inserisci il prezzo">
						@error('price')
							<div class="alert alert-danger">{{ $message }}  </div>
						@enderror
					</div>
					<div class="form-group">
						<label for="description">Descrizione</label>
						<input value="{{old('description')}}" type="text" name="description" class="form-control my-form" id="description" placeholder="descrivi il piatto">     
					</div>
					<div class="form-group">
						<label for="description">inserisci una foto</label>		
						<input type="file" name='image' id='image' class="@error('image') is-invalid @enderror">
						@error('image')
							<div class="alert alert-danger">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="visibility">Visibilità</label>
						<input   type="checkbox" name="visibility" class="form-control my-form" id="visibility" value="{{ ('checked' ? 1 : 0)}}">     
					</div>
					<div class="form-group">
						<label for="course">Portata</label>
						<input value="{{old('course')}}" type="text" name="course" class="form-control my-form @error('price') is-invalid @enderror" id="course" placeholder="scrivi il tipo di portata">  
						@error('course')
							<div class="alert alert-danger">{{ $message }}  </div>
						@enderror   
					</div>
					<div class="form-group">
					<p>Seleziona gli allergeni:</p>
						@foreach ($allergens as $allergen)
							<div class="form-check form-check-inline check">
								<input {{in_array($allergen->id, old('allergens', [])) ? 'checked' : null}}
								value="{{ $allergen->id }}" type="checkbox" name="allergens[]" class="form-check-input" id="{{'allergen' . $allergen->id}}">
								<label class="form-check-label" for="{{'allergen' . $allergen->id}}">{{ $allergen->name }}</label>
							</div>   
						@endforeach
					</div>

					<button type="submit" class="btn my-btn">Aggiungi piatto</button>
				</form>
			</div>
		</div>
	</div>
	{{-- <div class="form-group">
		<label for="ingredients">ingredients</label>
		<input value="{{old('name')}}" type="text-area" name="ingredients" class="form-control" id="ingredients">     
	</div>
	<div class="form-group">
		<label for="price">price</label>
		<input step="any" value="{{old('price')}}" type="number" name="price" class="form-control  @error('price') is-invalid @enderror" id="price" placeholder="inserisci il prezzo">
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
	{{-- <div class="form-group">
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
</form> --}}
@endsection