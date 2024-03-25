@extends('layouts.app')

@section("content")
    <div class="container mt-3">
    <div class="card">
        <div class="card-header">
            {{ __("ADD A NEW CAR") }}
        </div>
    <div class="card-body">
    <form  method="post" action="{{route('cars.store')}}">
    <div class="mb-3 mt-3">
    @csrf
        <label for="reg_number" class="form-label">{{ __("registration number") }}:</label>
        <input type="text" class="form-control" id="reg_number" placeholder="Enter the registration number" name="reg_number">
        </div>
        <div class="mb-3">
        <label for="brand" class="form-label">{{ __("brand") }}:</label>
        <input type="text" class="form-control" id="brand" placeholder="Enter the brand" name="brand">
        </div>
        <div class="mb-3">
        <label for="model" class="form-label">{{ __("model") }}:</label>
        <input type="text" class="form-control" id="model" placeholder="Enter the model" name="model">
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
