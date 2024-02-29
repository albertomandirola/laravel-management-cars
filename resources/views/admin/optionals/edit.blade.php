@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-uppercase text-dark-emphasis ">Modifica dell'optional: {{ $optional->name }}
                </h2>
                <form action="{{ route('admin.optionals.update', ['optional' => $optional->id]) }}" method="POST">
                    @csrf
                    @method ('PUT')
                    <div class="form-group my-2">
                        <label for="name" class="control-label m-1 text-danger ">Nome:</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" placeholder="Inserisci il nome" value="{{ old('name') ?? $optional->name }}"
                            required>
                        @error('model')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="description" class="control-label m-1 text-danger ">Descrizione</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                            placeholder="Info aggiuntive" cols="100" rows="10" required>{{ old('description') ?? $optional->description }}</textarea>
                        @error('description')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="color" class="control-label m-1 text-danger ">Colore</label>
                        <input type="text" class="form-control @error('color') is-invalid @enderror" name="color"
                            id="color" placeholder="Inserisci il colore" value="{{ old('color') ?? $optional->color }}"
                            required>
                        @error('color')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="price" class="control-label m-1 text-danger ">Prezzo</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                            id="price" placeholder="Inserisci il prezzo" value="{{ old('price') ?? $optional->price }} "
                            required>
                        @error('price')
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
