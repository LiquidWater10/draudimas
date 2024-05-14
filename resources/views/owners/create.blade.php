@extends('layouts.app')

@section("content")
    <div class="container mt-3">
    <div class="card">
        <div class="card-header">
            {{ __("ADD A NEW OWNER") }}
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
    <form  method="post" action="{{route('owner.store')}}">
    <div class="mb-3 mt-3">
    @csrf
    <label for="name" class="form-label">{{ __("name") }}:</label>
    <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" placeholder="Enter your name" name="name" value="{{ old('name') }}">
            <div class="invalid-feedback">@error('name') {{ $message }} @enderror</div>
        </div>
        <div class="mb-3">
        <label for="surname" class="form-label">{{ __("surname") }}:</label>
        <input type="text" class="form-control  @error('surname') is-invalid @enderror" id="surname" placeholder="Enter your surname" name="surname" value="{{ old('surname') }}">
            <div class="invalid-feedback">@error('surname') {{ $message }} @enderror</div>
        </div>
        <div class="mb-3">
        <label for="phone" class="form-label">{{ __("phone") }}:</label>
        <input type="tel" class="form-control  @error('phone') is-invalid @enderror" id="phone" placeholder="Enter your phone-nr" name="phone" value="{{ old('phone') }}">
            <div class="invalid-feedback">@error('phone') {{ $message }} @enderror</div>
        </div>
        <div class="mb-3">
        <label for="email" class="form-label">{{ __("email") }}:</label>
        <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="Enter your email" name="email" value="{{ old('email') }}">
            <div class="invalid-feedback">@error('email') {{ $message }} @enderror</div>
        </div>
        <div class="mb-3">
        <label for="address" class="form-label">{{ __("address") }}:</label>
        <input type="text" class="form-control  @error('address') is-invalid @enderror" id="address" placeholder="Enter your address" name="address" value="{{ old('address') }}">
            <div class="invalid-feedback">@error('address') {{ $message }} @enderror</div>
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">Administrator:</label>
            <select name="user_id" id="user_id" class="form-select">
                @foreach($Users as $user)
                    <option value={{$user->id}}> {{$user->email}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">{{ __("Submit") }}</button>
    </form>
    </div>
    </div>
    </div>
@endsection
