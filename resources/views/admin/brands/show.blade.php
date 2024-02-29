@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="text-center text-danger">Auto del brand: "{{ $brand->name }}"</h2>
            @if ($brand->logo !== null)
                <img src="{{ $brand->logo ? asset('/storage/' . $brand->logo) : asset('/img/test-img.jpg') }}"
                    class="card-img-top h-50" alt="{{ $car->title }}">
            @else
                <p class="text-center my-2">Logo non disponibile</p>
            @endif
            <div class="col-12 m-auto my-5 bg-light p-5 d-flex">
                @forelse ($brand->cars as $car)
                    <div class="card m-3 shadow" style="width: 18rem;">

                        <div class="card-body">
                            <h5 class="card-title">Modello: <strong>{{ $car->model }}</strong></h5>
                            <p class="card-text">Anno di produzione: <strong>{{ $car->year }}</strong></p>
                            <p class="card-text">Alimentazione: <strong>{{ $car->type_of_engine }}</strong></p>
                            <p class="card-text">Cambio: <strong>{{ $car->type_of_gear }}</strong></p>
                            <p class="card-text">Prezzo: <strong>{{ $car->price }}€</strong></p>
                            <a href="{{ route('admin.cars.show', ['car' => $car->id]) }}" class="btn btn-danger">Vai al
                                dettaglio auto</a>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <h4>Non esistono auto per questo brand</h4>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
