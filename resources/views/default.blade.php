@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-7 mx-2">
            <h1 class="display-1">{{ __("Welcome, to the Insurance system") }}</h1>
            <p class="pt-5">{{ __("this website will help you create, read, update and delete your clients") }}
            <p>[[Title]] [[Admin]]: [[phone]]</p>
        </div>
    </div>
</div>
@endsection
