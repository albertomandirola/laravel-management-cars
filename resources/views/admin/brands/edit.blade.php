@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-uppercase text-dark-emphasis ">Modifica brand: {{ $brand->name }}</h2>
                <form action="{{ route('admin.brands.update', ['brand' => $brand->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group my-2">
                        <label for="name" class="control-label m-1  ">Nome</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" placeholder="Nome brand" value="{{ old('name') ?? $brand->name }}" required>
                        @error('name')
                            <div class=" m-1">{{ $message }}</div>
                        @enderror
                        @if ($error_name != '')
                            <div class="text-danger m-1 ">
                                {{ $error_name }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group my-2">
                        <label for="country" class="control-label m-1  ">Paese</label>
                        <input type="text" class="form-control @error('country') is-invalid @enderror" name="country"
                            id="country" placeholder="Paese del brand" value="{{ old('country') ?? $brand->country }} "
                            required>
                        @error('country')
                            <div class=" m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="year" class="control-label m-1  ">Anno di fondazione</label>
                        <input type="text" class="form-control @error('year') is-invalid @enderror" name="year"
                            id="year" placeholder="Anno di fondazione del brand"
                            value="{{ old('year') ?? $brand->year }}" required>
                        @error('year')
                            <div class=" m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="phone_number" class="control-label m-1  ">Numero di telefono</label>
                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                            name="phone_number" id="phone_number" placeholder="Numero di telefono del brand"
                            value="{{ old('phone_number') ?? $brand->phone_number }}" required>
                        @error('phone_number')
                            <div class=" m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="email_address" class="control-label m-1  ">Indirizzo e-mail</label>
                        <input type="text" class="form-control @error('email_address') is-invalid @enderror"
                            name="email_address" id="email_address" placeholder="Indirizzo email del brand"
                            value="{{ old('email_address') ?? $brand->email_address }}" required>
                        @error('email_address')
                            <div class=" m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="logo" class="control-label">Logo del brand</label>
                        @if ($brand->logo != null)
                            <div class="my-3">
                                <img src="{{ asset('storage') . '/' . $brand->logo }}" alt="{{ $brand->name }}"
                                    width="25%">
                            </div>
                        @else
                            <h5>Logo non presente</h5>
                        @endif
                        <input type="file" name="logo" id="logo"
                            class="form-control @error('logo') is-invalid @enderror"
                            value="{{ old('logo') ?? $brand->logo }}">
                        @error('logo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="description" class="control-label m-1  ">Descrizione</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror"
                            name="description" id="description" placeholder="Descrizione del brand"
                            value="{{ old('description') ?? $brand->description }}" required>
                        @error('description')
                            <div class=" m-1">{{ $message }}</div>
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
