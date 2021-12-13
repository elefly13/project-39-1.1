@extends('admin.dashboard')

@section('dashboard')
	<div class="container-fluid">
		{{-- pagina modifica piatto dishes/edit  --}}
		<div class="row justify-content-center">
			<div class="col-sm-12 col-md-8">
				<div class="card-header header-edit">
					<h4>Modifica un piatto del tuo menu</h4>
				</div>
				<div class="card my-card-edit">
					<form action="{{route('admin.dishes.update', $dish['id'] )}}" method="post" enctype='multipart/form-data' >
						@csrf
						@method('PUT') 
						
						<div class="form-group">
							<label for="name">Nome piatto</label>
							<input value="{{old('name', $dish->name)}}" type="text" name="name" class="form-control my-form @error('name') is-invalid @enderror" id="name" placeholder="Inserisci il nome"> 
							@error('name')
								<div class="alert alert-danger">{{ $message }}  </div>
							@enderror    
						</div>
						<div class="form-group">
							<label for="course">Portata</label>
							<input value="{{old('course', $dish->course)}}"  type="text" name="course" class="form-control my-form" id="course" placeholder="scrivi il tipo di portata">     
						</div>
						<div class="form-group">
							<label for="ingredients">Ingredienti</label>
							<input value="{{old('ingredients', $dish->ingredients)}}"  type="text-area" name="ingredients" class="form-control my-form" id="ingredients">     
						</div>
						<div class="form-group">
							<label for="description">Descrizione</label>
							<input value="{{old('description', $dish->description)}}"  type="text" name="description" class="form-control my-form" id="description" placeholder="descrivi il piatto">     
						</div>
						<div class="form-group">
							<label for="description">Modifica immagine piatto</label><br>
							<input type="file" name='image' id='image' class="@error('image') is-invalid @enderror">
						</div>
						<div class="form-group">
							<label for="price">Prezzo</label>
							<input value="{{old('price', $dish->price)}}"  step="any" type="number" name="price" class="form-control my-form @error('price') is-invalid @enderror" id="price" placeholder="inserisci il prezzo">
							@error('price')
								<div class="alert alert-danger">{{ $message }}  </div>
							@enderror 
						</div>
						
						{{-- <div class="form-group">
							<label for="lastname">lastname</label> INSERIRE IMMAGINE
							<input value="{{old('lastname_user', $dish->lastname_user)}}"  type="text" name="lastname_user" class="form-control" id="lastname" placeholder="buyer lastname">     
						</div> --}}
						
						<div class="form-group">
						<p>Seleziona gli allergeni:</p>
						@foreach ($allergens as $allergen)
							<div class="form-check form-check-inline check">
								<input {{in_array($allergen->id, old('allergens', [])) ? 'checked' : null}}
								{{$dish->allergens->contains($allergen) ? 'checked' : null}} value="{{ $allergen->id }}" type="checkbox" name="allergens[]" class="form-check-input" id="{{'allergen' . $allergen->id}}">
								<label class="form-check-label" for="{{'allergen' . $allergen->id}}">{{ $allergen->name }}</label>
							</div>   
						@endforeach
						</div>
						<div class="form-group">
							{{-- Select visibilità  --}}
							<select class="col-sm-12 col-md-3 py-2 form-select form-select-sm my-form" name="visibility" id="visibility">
								<option value="1" selected>Seleziona la visibilità</option>
								<option value="1">Visibile</option>
								<option value="0">Non visibile</option>
							</select>
						</div>
						{{-- <div class="form-group">
							<label class="text-center" for="visibility"></label>
							<input value="{{old('visibility', $dish->visibility)}}"  type="checkbox" name="visibility" class="form-control my-form" id="visibility" value="{{ ('checked' ? 1 : NULL)}}">     
						</div> --}}
						<div class="col-12 box-btn-dish-create">
							<button type="submit" class="btn my-btn-dish btn-create-dish">Modifica piatto</button>
							<a class="btn my-btn-dish btn-create-dish" href="{{ url('/admin/dishes') }}">Torna indietro</a>
						</div>

						
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
