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
                <p>
                    <strong>Optionals:</strong>
                <ul>
                    @forelse ($car->optionals as $optional)
                        <li class="text-capitalize">{{ $optional->name }}</li>
                    @empty
                        <p class="text-danger">No optionals for this car</p>
                    @endforelse
                </ul>
                </p>
                <p>{{ $car->type_of_gear }}</p>
                <p>{{ $car->n_chassis }}</p>
                <p>{{ $car->price }}</p>
                <p>{{ $car->doors }}</p>
                <p>{{ $car->seats }}</p>
                <p>{{ $car->color }}</p>
                <p>{{ $car->power }}</p>
                <p>{{ $car->photos }}</p>
                <p>{{ $car->description }}</p>
            </div>
        </div>
    </div>
@endsection
