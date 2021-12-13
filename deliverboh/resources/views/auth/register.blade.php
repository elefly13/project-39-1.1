@extends('layouts.app')

@section('content')
<div class="container-fluid box-image-login">
    <div class="row justify-content-center">
        <div class=" col-sm-12 col-md-6">
            <div class="my-card">
                <div class="card-header header">{{ __('Registrati') }}</div>
                <div class="card-body ">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control my-form @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo e-mail') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control my-form @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- creating new field in the registration form  --}}
                        <div class="form-group row">
                            <label for="restaurant_name" class="col-md-4 col-form-label text-md-right">{{ __('Nome ristorante') }}</label>
                            <div class="col-md-6">
                                <input id="restaurant_name" type="text" class="form-control my-form @error('restaurant_name') is-invalid @enderror" name="restaurant_name" value="{{ old('restaurant_name') }}" required autocomplete="restaurant name">
                                @error('restaurant_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- creating new field in the registration form  --}}
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control my-form @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">
                                {{-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
                        {{-- creating new field in the registration form  --}}
                        <div class="form-group row">
                            <label for="vat_number" class="col-md-4 col-form-label text-md-right">{{ __('Partita IVA') }}</label>
                            <div class="col-md-6">
                                <input id="vat_number" type="text" class="form-control my-form @error('vat_number') is-invalid @enderror" name="vat_number" value="{{ old('vat_number') }}" required autocomplete="VAT number">
                                {{-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <p class="col-md-4 col-form-label text-md-right">Seleziona le categorie:</p>
                            <div class="col-md-6 d-flex flex-wrap">
                                @foreach ($categories as $category)
                                    <div class=" form-check-inline check @error('categories') is-invalid @enderror">
                                        <input {{in_array($category->id, old('categorys', [])) ? 'checked' : null}}
                                        value="{{ $category->id }}" type="checkbox" name="categories[]" class="form-check-input" id="{{'category' . $category->id}}">
                                        <label class="form-check-label" for="{{'category' . $category->id}}">{{ $category->cuisine }}</label>
                                    </div> 
                                    @error('categories')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control my-form @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control my-form" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn my-btn">
                                    {{ __('Registrati') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
