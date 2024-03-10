@extends('layouts.app')

@section('content')
    <div class="container ">
        <header>
            <h1>MANAGE CARS</h1>
        </header>
        <a type="button" href="{{ route('cars.create') }}" class="btn btn-primary">Add</a>
        <div class="table-responsive-md ">
        <table class="table table-hover">
            <tr>
                <th>id</th>
                <th>reg_number</th>
                <th>brand</th>
                <th>model</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            <tbody>
            @foreach($cars as $car)
                <tr>
                <td>{{$car->id}}</td>
                <td>{{$car->reg_number}}</td>
                <td>{{$car->brand}}</td>
                <td>{{$car->model}}</td>
                <td>
                    <form method="post" action="{{ route('cars.destroy', $car->id) }}">
                        @csrf
                        @method("delete")
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
                    <td><a type="button" href="{{ route('cars.edit', $car->id)}}" class="btn btn-primary">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>

    </div>
@endsection
