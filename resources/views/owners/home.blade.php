@extends('layouts.app')

@section('content')
    <div class="container ">
        <header>
            <h1>{{ __("MANAGE OWNERS") }}</h1>
        </header>
        <a type="button" href="{{ route('owner.create') }}" class="btn btn-primary">{{ __("Add") }}</a>
        <div class="table-responsive-md ">
        <table class="table table-hover">
            <tr>
                <th>id</th>
                <th>{{ __("name") }}</th>
                <th>{{ __("surname") }}</th>
                <th>{{ __("cars") }}</th>
                <th>{{ __("phone") }}</th>
                <th>{{ __("email") }}</th>
                <th>{{ __("address") }}</th>
                <th>{{ __("Delete") }}</th>
                <th>{{ __("Edit") }}</th>
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
                    @can('delete-owner',$owner)
                    <a type="button" href="{{ route('delete', $owner->id)}}" class="btn btn-danger">Delete</a>
                    @endcan
                </td>
                <td>
                    @can('edit-owner',$owner)
                    <a type="button" href="{{ route('owner.edit', $owner->id)}}" class="btn btn-primary">Edit</a>
                </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>

    </div>
@endsection
