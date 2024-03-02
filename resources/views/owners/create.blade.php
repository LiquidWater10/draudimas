@extends('layouts.app')

@section("content")
    <div class="container mt-3">
    <div class="card">
        <div class="card-header">
            ADD A NEW OWNER
        </div>
    <div class="card-body">
    <form  method="post" action="{{route('owner.store')}}">
    <div class="mb-3 mt-3">
    @csrf
    <label for="name" class="form-label">name:</label>
    <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name">
        </div>
        <div class="mb-3">
        <label for="surname" class="form-label">surname:</label>
        <input type="text" class="form-control" id="surname" placeholder="Enter your surname" name="surname">
        </div>
        <div class="mb-3">
        <label for="phone" class="form-label">phone:</label>
        <input type="tel" class="form-control" id="phone" placeholder="Enter your phone-nr" name="phone">
        </div>
        <div class="mb-3">
        <label for="email" class="form-label">email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email">
        </div>
        <div class="mb-3">
        <label for="address" class="form-label">address:</label>
        <input type="text" class="form-control" id="address" placeholder="Enter your address" name="address">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    </div>
    </div>
@endsection
