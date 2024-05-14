@extends('layouts.app')

@section('content')
    <div class="container ">
        <header>
            <h1>{{ __("MANAGE CARS") }}</h1>
        </header>
        <a type="button" href="{{ route('cars.create') }}" class="btn btn-primary">{{ __("Add") }}</a>
        <div class="table-responsive-md ">
        <table class="table table-hover">
            <tr>
                <th>id</th>
                <th>{{ __("reg_number") }}</th>
                <th>{{ __("brand") }}</th>
                <th>{{ __("model") }}</th>
                <th>{{ __("Delete") }}</th>
                <th>{{ __("Edit") }}</th>
            </tr>
            <tbody>
            @foreach($cars as $car)
                <tr>
                <td>{{$car->id}}</td>
                <td>{{$car->reg_number}}</td>
                <td>{{$car->brand}}</td>
                <td>{{$car->model}}</td>
                <td>
                    @can('delete-car',$car)
                    <form method="post" action="{{ route('cars.destroy', $car->id) }}">
                        @csrf
                        @method("delete")
                        <button class="btn btn-danger">Delete</button>
                    </form>
                    @endcan
                </td>
                    <td>
                    @can('edit-car',$car)
                    <a type="button" href="{{ route('cars.edit', $car->id)}}" class="btn btn-primary">Edit</a>
                    @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>

    </div>
@endsection
