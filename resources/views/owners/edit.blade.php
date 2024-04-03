@extends('layouts.app')
    @section("content")
        <div class="container mt-3">
            <div class="card">
                <div class="card-header">
                    {{ __("EDIT AN EXISTING OWNER") }}
                </div>
                <div class="card-body">
                    <form  method="post" action="{{route('owner.save', $owner->id)}}">
                        <div class="mb-3 mt-3">
                            @csrf
                            <label for="name" class="form-label">{{ __("name") }}:</label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" placeholder="Enter your name" name="name" value="{{ old('name')?: $owner->name }}">
                            <div class="invalid-feedback">@error('name') {{ $message }} @enderror</div>
                        </div>
                        <div class="mb-3">
                            <label for="surname" class="form-label">{{ __("surname") }}:</label>
                            <input type="text" class="form-control  @error('surname') is-invalid @enderror" id="surname" placeholder="Enter your surname" name="surname" value="{{ old('surname')?: $owner->surname }}">
                            <div class="invalid-feedback">@error('surname') {{ $message }} @enderror</div>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">{{ __("phone") }}:</label>
                            <input type="tel" class="form-control  @error('phone') is-invalid @enderror" id="phone" placeholder="Enter your phone-nr" name="phone" value="{{ old('phone')?: $owner->phone }}">
                            <div class="invalid-feedback">@error('phone') {{ $message }} @enderror</div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __("email") }}:</label>
                            <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="Enter your email" name="email" value="{{ old('email')?: $owner->email }}">
                            <div class="invalid-feedback">@error('email') {{ $message }} @enderror</div>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">{{ __("address") }}:</label>
                            <input type="text" class="form-control  @error('address') is-invalid @enderror" id="address" placeholder="Enter your address" name="address" value="{{ old('address')?: $owner->address }}">
                            <div class="invalid-feedback">@error('address') {{ $message }} @enderror</div>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __("Submit") }}</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection

