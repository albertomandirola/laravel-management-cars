@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>{{ $car->model }}</h2>
                <p>{{ $car->brand_id ? $car->brand_id : 'Brand non specificato' }}</p>
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
                <p>
                    <strong>Price:</strong>
                    <strong class="text-danger">&euro; {{ $car->price }}</strong>

                </p>
                @if (count($car->optionals) > 0)
                    <p>
                        <strong>Price with optionals:</strong>
                        <strong class="text-danger">&euro; {{ $fullprice }}</strong>
                    </p>
                @endif
                <p>{{ $car->doors }}</p>
                <p>{{ $car->seats }}</p>
                <p>{{ $car->color }}</p>
                <p>{{ $car->power }}</p>

                <img src="{{ asset('/storage/' . $car->path_image) }}" alt="{{ $car->title }}" width="200">

                <p>{{ $car->description }}</p>
            </div>
        </div>
    </div>
@endsection
