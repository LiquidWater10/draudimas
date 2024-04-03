@extends('layouts.app')

@section("content")
    <div class="container mt-3">
    <div class="card">
        <div class="card-header">
            {{ __("ADD A NEW CAR") }}
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach( $errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="card-body">
    <form  method="post" action="{{route('cars.store')}}">
    <div class="mb-3 mt-3">
    @csrf
        <label for="reg_number" class="form-label">{{ __("registration number") }}:</label>
        <input type="text" class="form-control @error('reg_number') is-invalid @enderror" id="reg_number" placeholder="Enter the registration number" name="reg_number" value="{{ old('reg_number') }}">
            <div class="invalid-feedback">@error('reg_number') {{ $message }} @enderror</div>
        </div>
        <div class="mb-3">
        <label for="brand" class="form-label">{{ __("brand") }}:</label>
        <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" placeholder="Enter the brand" name="brand" value="{{ old('brand') }}">
            <div class="invalid-feedback">@error('brand') {{ $message }} @enderror</div>
        </div>
        <div class="mb-3">
        <label for="model" class="form-label">{{ __("model") }}:</label>
        <input type="text" class="form-control @error('model') is-invalid @enderror" id="model" placeholder="Enter the model" name="model" value="{{ old('model') }}">
            <div class="invalid-feedback">@error('model') {{ $message }} @enderror</div>
        </div>
        <div class="mb-3">
        <label for="owner_id" class="form-label">{{ __("owner") }}:</label>
            <select name="owner_id" id="owner_id" class="form-select">
                @foreach($owners as $owner)
                    <option value={{$owner->id}}> {{$owner->name ." ". $owner->surname}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">{{ __("Submit") }}</button>
    </form>
    </div>
    </div>
    </div>
@endsection
