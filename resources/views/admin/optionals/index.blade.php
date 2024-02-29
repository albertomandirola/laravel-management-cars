@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-6">
                <div>
                    <a href="{{ route('admin.optionals.create') }}"><button class="btn btn-primary ">Aggiungi
                            Optional</button></a>
                </div>
                <ul class="list-unstyled">
                    @foreach ($optionals as $optional)
                        <li class="my-3">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button text-capitalize" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne-{{ $optional->id }}"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            {{ $optional->name }}
                                        </button>
                                    </h2>
                                    <div id="collapseOne-{{ $optional->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <ul>
                                                <li>
                                                    <strong>Description:</strong>
                                                    <p>{{ $optional->description }}</p>
                                                </li>
                                                <li>
                                                    <strong>Color:</strong>
                                                    <p>{{ $optional->color }}</p>
                                                </li>
                                                <li>
                                                    <strong>Price:</strong>
                                                    <p>&euro; {{ $optional->price }}</p>
                                                </li>
                                            </ul>
                                            <div class="text-center">
                                                <a
                                                    href="{{ route('admin.optionals.edit', ['optional' => $optional->id]) }}"><button
                                                        class="btn btn-warning">Edit</button></a>
                                                <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete-{{ $optional->id }}"><i
                                                        class="fas fa-trash-can"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </li>
                        @include('admin.optionals.modal')
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
