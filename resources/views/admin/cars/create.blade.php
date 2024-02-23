@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-uppercase text-dark-emphasis ">Aggiungi un'auto:</h2>
                <form action="{{ route('admin.cars.store') }}" method="POST">
                    @csrf
                    <div class="form-group my-2">
                        <label for="model" class="control-label m-1 text-danger ">Modello</label>
                        <input type="text" class="form-control @error('model') is-invalid @enderror" name="model"
                            id="model" placeholder="Inserisci il modello" value="{{ old('model') }}" required>
                        @error('model')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="brand" class="control-label m-1 text-danger ">Marca</label>
                        <input type="text" class="form-control @error('brand') is-invalid @enderror" name="brand"
                            id="brand" placeholder="Inserisci la marca" value="{{ old('brand') }}" required>
                        @error('brand')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="year" class="control-label m-1 text-danger ">Anno di produzione</label>
                        <input type="text" class="form-control @error('year') is-invalid @enderror" name="year"
                            id="year" placeholder="Inserici l'anno di produzione" value="{{ old('year') }}" required>
                        @error('year')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="type_of_engine" class="control-label m-1 text-danger ">Alimentazione</label>
                        <input type="text" class="form-control @error('type_of_engine') is-invalid @enderror"
                            name="type_of_engine" id="type_of_engine" placeholder="Tipo di alimentazione"
                            value="{{ old('type_of_engine') }}" required>
                        @error('type_of_engine')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="plate" class="control-label m-1 text-danger ">Targa</label>
                        <input type="text" class="form-control @error('plate') is-invalid @enderror" name="plate"
                            id="plate" placeholder="Inserisci la targa" value="{{ old('plate') }}">
                        @error('plate')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="type_of_gear" class="control-label m-1 text-danger ">Tipo trasmissione</label>
                        <input type="text" class="form-control @error('type_of_gear') is-invalid @enderror"
                            name="type_of_gear" id="type_of_gear" placeholder="Tipo di trasmissione"
                            value="{{ old('type_of_gear') }}" required>
                        @error('type_of_gear')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="n_chassis" class="control-label m-1 text-danger ">Numero di telaio</label>
                        <input type="text" class="form-control @error('n_chassis') is-invalid @enderror" name="n_chassis"
                            id="n_chassis" placeholder="Inserisci il numero di telaio" value="{{ old('n_chassis') }}">
                        @error('n_chassis')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="price" class="control-label m-1 text-danger ">Prezzo</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                            id="price" placeholder="Inserisci il prezzo" value="{{ old('price') }}" required>
                        @error('price')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="doors" class="control-label m-1 text-danger ">Porte</label>
                        <input type="text" class="form-control @error('doors') is-invalid @enderror" name="doors"
                            id="doors" placeholder="Inserisci il numero di porte" value="{{ old('doors') }}" required>
                        @error('doors')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="seats" class="control-label m-1 text-danger ">Posti</label>
                        <input type="text" class="form-control @error('seats') is-invalid @enderror" name="seats"
                            id="seats" placeholder="Inserisci il numero di posti passeggero"
                            value="{{ old('seats') }}" required>
                        @error('seats')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="color" class="control-label m-1 text-danger ">Colore</label>
                        <input type="text" class="form-control @error('color') is-invalid @enderror" name="color"
                            id="color" placeholder="Inserisci il colore" value="{{ old('color') }}" required>
                        @error('color')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="power" class="control-label m-1 text-danger ">Cavalli</label>
                        <input type="text" class="form-control @error('power') is-invalid @enderror" name="power"
                            id="power" placeholder="Inserisci il numero di cavalli" value="{{ old('power') }}"
                            required>
                        @error('power')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="photos" class="control-label m-1 text-danger ">Foto</label>
                        <input type="text" class="form-control @error('photos') is-invalid @enderror" name="photos"
                            id="photos" placeholder="Inserisci il link delle foto" value="{{ old('photos') }}">
                        @error('photos')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="description" class="control-label m-1 text-danger ">Descrizione</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                            placeholder="Info aggiuntive" cols="100" rows="10" required>{{ old('description') }}</textarea>
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
