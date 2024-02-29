@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>{{ $car->model }}</h2>
                <p>{{ $car->brand ? $car->brand : 'Brand non specificato' }}</p>
                <p>{{ $car->year }}</p>
                <p>{{ $car->type_of_engine }}</p>
                <p>{{ $car->plate }}</p>
                <p>{{ $car->type_of_gear }}</p>
                <p>{{ $car->n_chassis }}</p>
                <p>{{ $car->price }}</p>
                <p>{{ $car->doors }}</p>
                <p>{{ $car->seats }}</p>
                <p>{{ $car->color }}</p>
                <p>{{ $car->power }}</p>
                <img src="{{ asset('/storage/' . $car->photos) }}" alt="{{ $car->title }}" width="200">
                <p>{{ $car->description }}</p>
            </div>
        </div>
    </div>
@endsection
