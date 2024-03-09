@extends('layouts.app')

@section('content')
    <div class="container ">
        <header>
            <h1>MANAGE OWNERS</h1>
        </header>
        <a type="button" href="{{ route('owner.create') }}" class="btn btn-primary">Add</a>
        <div class="table-responsive-md ">
        <table class="table table-hover">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>surname</th>
                <th>cars</th>
                <th>phone</th>
                <th>email</th>
                <th>address</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            <tbody>
            @foreach($owners as $owner)
                <tr>
                <td>{{$owner->id}}</td>
                <td>{{$owner->name}}</td>
                <td>{{$owner->surname}}</td>
                <td>
                    @foreach($owner->cars as $car)
                        {{$car->brand}} {{$car->model}}
                        <br>
                    @endforeach
                </td>
                <td>{{$owner->phone}}</td>
                <td>{{$owner->email}}</td>
                <td>{{$owner->address}}</td>
                <td>
                    <a type="button" href="{{ route('delete', $owner->id)}}" class="btn btn-danger">Delete</a>
                </td>
                    <td><a type="button" href="{{ route('owner.edit', $owner->id)}}" class="btn btn-primary">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>

    </div>
@endsection
