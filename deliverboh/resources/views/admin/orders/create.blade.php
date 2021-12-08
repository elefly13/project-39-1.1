@extends('layouts.app')

@section('content')
	<form action="{{route('admin.orders.store')}}" method="post">
		@csrf
		@method('POST') 

		<div class="form-group">
			<label for="date">Date</label>
			<input type="date" name="date" class="form-control" id="date" >     
		</div>
		<div class="form-group">
			<label for="address">Address</label>
			<input type="text" name="delivery_address" class="form-control" id="address" placeholder="enter your address">     
		</div>
		<div class="form-group">
			<label for="Status">Status</label>
			<input type="checkbox" name="status" class="form-control" id="Status" value="{{ ('checked' ? 1 : NULL)}}">
		</div>
		<div class="form-group">
			<label for="total">total</label>
			<input type="number" name="total" class="form-control" id="total" placeholder="How much did you spent?">     
		</div>
		<div class="form-group">
			<label for="name">name</label>
			<input type="text" name="name_user" class="form-control" id="name" placeholder="buyer name">     
		</div>
		<div class="form-group">
			<label for="lastname">lastname</label>
			<input type="text" name="lastname_user" class="form-control" id="lastname" placeholder="buyer lastname">     
		</div>
		<div class="form-group">
			<label for="note">note</label>
			<input type="text" name="note" class="form-control" id="note" placeholder="Add a note to the order">     
		</div>
		@foreach ($dishes as $dish)
		<div class="form-group">
			<label for="{{$dish->id}}">{{$dish->name}}</label>
			<input type="checkbox" name="dish[]" class="form-control" id="{{$dish->id}}" value="{{('checked' ? $dish->id : NULL)}}">
		</div>
		@endforeach
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
	
@endsection
