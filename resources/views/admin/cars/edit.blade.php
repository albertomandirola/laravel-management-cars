@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-uppercase text-dark-emphasis ">Modifica dell'auto "{{ $car->brand_id }} {{ $car->model }},
                    targa: {{ $car->plate }}":
                </h2>
                <form action="{{ route('admin.cars.update', ['car' => $car->id]) }}" method="POST">
                    @csrf
                    @method ('PUT')
                    <div class="form-group my-2">
                        <label for="model" class="control-label m-1 text-danger ">Modello</label>
                        <input type="text" class="form-control @error('model') is-invalid @enderror" name="model"
                            id="model" placeholder="Inserisci il modello" value="{{ old('model') ?? $car->model }}">
                        @error('model')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="brand" class="control-label m-1">Marca</label>
                        <select name="brand_id" id="brand" class="form-select @error('brand') is-invalid @enderror">
                            <option value="">Seleziona brand</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" @selected($brand->id == old('brand', $car->brand_id ? $car->brand_id : ''))>{{ $brand->name }}
                                </option>
                            @endforeach
                            @error('brand')
                                <div class="text-danger m-1">{{ $message }}</div>
                            @enderror
                        </select>
                    </div>
                    <div class="form-group my-2">
                        <label for="year" class="control-label m-1 text-danger ">Anno di produzione</label>
                        <input type="text" class="form-control @error('year') is-invalid @enderror" name="year"
                            id="year" placeholder="Inserici l'anno di produzione"
                            value="{{ old('year') ?? $car->year }}">
                        @error('year')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="type_of_engine" class="control-label m-1 text-danger ">Alimentazione</label>
                        <input type="text" class="form-control @error('type_of_engine') is-invalid @enderror"
                            name="type_of_engine" id="type_of_engine" placeholder="Tipo di alimentazione"
                            value="{{ old('type_of_engine') ?? $car->type_of_engine }}">
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
                        @if ($error_plate != '')
                            <div class="text-danger m-1 ">
                                {{ $error_plate }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group my-2">
                        <label for="type_of_gear" class="control-label m-1 text-danger ">Tipo trasmissione</label>
                        <input type="text" class="form-control @error('type_of_gear') is-invalid @enderror"
                            name="type_of_gear" id="type_of_gear" placeholder="Tipo di trasmissione"
                            value="{{ old('type_of_gear') ?? $car->type_of_gear }}">
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
                        @if ($error_chassis != '')
                            <div class="text-danger m-1 ">
                                {{ $error_chassis }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group my-2">
                        <label for="price" class="control-label m-1 text-danger ">Prezzo</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                            id="price" placeholder="Inserisci il prezzo" value="{{ old('price') ?? $car->price }} ">
                        @error('price')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="doors" class="control-label m-1 text-danger ">Porte</label>
                        <input type="text" class="form-control @error('doors') is-invalid @enderror" name="doors"
                            id="doors" placeholder="Inserisci il numero di porte"
                            value="{{ old('doors') ?? $car->doors }}">
                        @error('doors')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="seats" class="control-label m-1 text-danger ">Posti</label>
                        <input type="text" class="form-control @error('seats') is-invalid @enderror" name="seats"
                            id="seats" placeholder="Inserisci il numero di posti passeggero"
                            value="{{ old('seats') ?? $car->seats }}">
                        @error('seats')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="color" class="control-label m-1 text-danger ">Colore</label>
                        <input type="text" class="form-control @error('color') is-invalid @enderror" name="color"
                            id="color" placeholder="Inserisci il colore" value="{{ old('color') ?? $car->color }}">
                        @error('color')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="power" class="control-label m-1 text-danger ">Cavalli</label>
                        <input type="text" class="form-control @error('power') is-invalid @enderror" name="power"
                            id="power" placeholder="Inserisci il numero di cavalli"
                            value="{{ old('power') ?? $car->power }}">
                        @error('power')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="" class="control-label m-1 text-danger ">Optionals:</label>
                        <div class="accordion" id="accordionOptionals">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Seleziona gli Optionals:
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionOptionals">
                                    <div class="accordion-body d-flex gap-3">
                                        @foreach ($optionals as $optional)
                                            <div class="d-flex gap-1">
                                                <input type="checkbox" name="optional[]" class=" form-check"
                                                    id="optional-{{ $optional->id }}" value="{{ $optional->id }}"
                                                    {{ $car->optionals->contains($optional->id) ? 'checked' : '' }}>
                                                <label for="optional-{{ $optional->id }}"
                                                    class="text-capitalize form-label">{{ $optional->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="form-group my-2">

                        <label for="path_image" class="control-label m-1 text-danger ">Foto</label>
                        <input type="file" class="form-control @error('path_image') is-invalid @enderror"
                            name="path_image" id="path_image" placeholder="Inserisci il link delle foto"
                            value="{{ old('path_image') ?? $car->path_image }}">
                        @error('path_image')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="description" class="control-label m-1 text-danger ">Descrizione</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                            placeholder="Info aggiuntive" cols="100" rows="10">{{ old('description') ?? $car->description }}</textarea>
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
