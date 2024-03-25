@extends('layouts.app')
    @section("content")
        <div class="container mt-3">
            <div class="card">
                <div class="card-header">
                    {{ __("EDIT AN EXISTING CAR") }}
                </div>
                <div class="card-body">
                    <form  method="post" action="{{route('cars.update', $cars->id)}}">
                        @csrf
                        @method('put')
                        <div class="mb-3 mt-3">
                            <label for="reg_number" class="form-label">{{ __("registration number") }}:</label>
                            <input type="text" class="form-control" id="reg_number" placeholder="Enter the registration number" value="{{$cars->reg_number}}" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="brand" class="form-label">{{ __("brand") }}:</label>
                            <input type="text" class="form-control" id="brand" placeholder="Enter the brand" value="{{$cars->brand}}" name="brand">
                        </div>
                        <div class="mb-3">
                            <label for="model" class="form-label">{{ __("model") }}:</label>
                            <input type="tel" class="form-control" id="model" placeholder="Enter the model" value="{{$cars->model}}" name="model">
                        </div>
                        <div class="mb-3">
                            <label for="owner_id" class="form-label">{{ __("owner") }}:</label>
                            <select name="owner_id" id="owner_id" class="form-select">
                                @foreach($owners as $owner)
                                    @if($owner->id===$cars->owner_id)
                                    <option value={{$owner->id}} selected > {{$owner->name ." ". $owner->surname}}</option>
                                    @else
                                    <option value={{$owner->id}}> {{$owner->name ." ". $owner->surname}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-primary">{{ __("Submit") }}</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection

