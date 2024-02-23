@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-uppercase text-dark-emphasis ">Modifica dell'auto "{{ $car->brand }} {{ $car->model }},
                    targa: {{ $car->plate }}":
                </h2>
                <form action="{{ route('admin.cars.update', ['car' => $car->id]) }}" method="POST">
                    @csrf
                    @method ('PUT')
                    <div class="form-group my-2">
                        <label for="model" class="control-label m-1 text-danger ">Modello</label>
                        <input type="text" class="form-control @error('model') is-invalid @enderror" name="model"
                            id="model" placeholder="Inserisci il modello" value="{{ old('model') ?? $car->model }}"
                            required>
                        @error('model')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="brand" class="control-label m-1 text-danger ">Marca</label>
                        <input type="text" class="form-control @error('brand') is-invalid @enderror" name="brand"
                            id="brand" placeholder="Inserisci la marca" value="{{ old('brand') ?? $car->brand }}"
                            required>
                        @error('brand')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="year" class="control-label m-1 text-danger ">Anno di produzione</label>
                        <input type="text" class="form-control @error('year') is-invalid @enderror" name="year"
                            id="year" placeholder="Inserici l'anno di produzione"
                            value="{{ old('year') ?? $car->year }}" required>
                        @error('year')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="type_of_engine" class="control-label m-1 text-danger ">Alimentazione</label>
                        <input type="text" class="form-control @error('type_of_engine') is-invalid @enderror"
                            name="type_of_engine" id="type_of_engine" placeholder="Tipo di alimentazione"
                            value="{{ old('type_of_engine') ?? $car->type_of_engine }}" required>
                        @error('type_of_engine')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="plate" class="control-label m-1 text-danger ">Targa</label>
                        <input type="text" class="form-control @error('plate') is-invalid @enderror" name="plate"
                            id="plate" placeholder="Inserisci la targa" value="{{ old('plate') ?? $car->plate }}">
                        @error('plate')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="type_of_gear" class="control-label m-1 text-danger ">Tipo trasmissione</label>
                        <input type="text" class="form-control @error('type_of_gear') is-invalid @enderror"
                            name="type_of_gear" id="type_of_gear" placeholder="Tipo di trasmissione"
                            value="{{ old('type_of_gear') ?? $car->type_of_gear }}" required>
                        @error('type_of_gear')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="n_chassis" class="control-label m-1 text-danger ">Numero di telaio</label>
                        <input type="text" class="form-control @error('n_chassis') is-invalid @enderror" name="n_chassis"
                            id="n_chassis" placeholder="Inserisci il numero di telaio"
                            value="{{ old('n_chassis') ?? $car->n_chassis }}">
                        @error('n_chassis')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="price" class="control-label m-1 text-danger ">Prezzo</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                            id="price" placeholder="Inserisci il prezzo" value="{{ old('price') ?? $car->price }} "
                            required>
                        @error('price')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="doors" class="control-label m-1 text-danger ">Porte</label>
                        <input type="text" class="form-control @error('doors') is-invalid @enderror" name="doors"
                            id="doors" placeholder="Inserisci il numero di porte"
                            value="{{ old('doors') ?? $car->doors }}" required>
                        @error('doors')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="seats" class="control-label m-1 text-danger ">Posti</label>
                        <input type="text" class="form-control @error('seats') is-invalid @enderror" name="seats"
                            id="seats" placeholder="Inserisci il numero di posti passeggero"
                            value="{{ old('seats') ?? $car->seats }}" required>
                        @error('seats')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="color" class="control-label m-1 text-danger ">Colore</label>
                        <input type="text" class="form-control @error('color') is-invalid @enderror" name="color"
                            id="color" placeholder="Inserisci il colore" value="{{ old('color') ?? $car->color }}"
                            required>
                        @error('color')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="power" class="control-label m-1 text-danger ">Cavalli</label>
                        <input type="text" class="form-control @error('power') is-invalid @enderror" name="power"
                            id="power" placeholder="Inserisci il numero di cavalli"
                            value="{{ old('power') ?? $car->power }}" required>
                        @error('power')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="photos" class="control-label m-1 text-danger ">Foto</label>
                        <input type="text" class="form-control @error('photos') is-invalid @enderror" name="photos"
                            id="photos" placeholder="Inserisci il link delle foto"
                            value="{{ old('photos') ?? $car->photos }}">
                        @error('photos')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="description" class="control-label m-1 text-danger ">Descrizione</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                            placeholder="Info aggiuntive" cols="100" rows="10" required>{{ old('description') ?? $car->description }}</textarea>
                        @error('description')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group my-2">
                        <button type="submit" class="btn btn-sm btn-success m-1">Salva</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
