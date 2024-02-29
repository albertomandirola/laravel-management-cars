@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center ">
                    <h2 class="text-uppercase text-danger ">Lista brand:</h2>
                    <a href="{{ route('admin.brands.create') }}" class="btn btn-sm btn-success">
                        <i class="fa-solid fa-plus me-2"></i>Aggiungi nuovo brand
                    </a>
                </div>
                <table class="table table-striped border border-2 my-3 shadow">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nome brand</th>
                            <th>N° auto per brand</th>
                            <th>Paese</th>
                            <th>Anno di fondazione</th>
                            <th>Telefono</th>
                            <th>E-mail</th>
                            <th>Descrizione</th>
                            <th>Strumenti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $brand->id }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>{{ count($brand->cars) }}</td>
                                <td>{{ $brand->country }}</td>
                                <td>{{ $brand->year }}</td>
                                <td>{{ $brand->phone_number }}</td>
                                <td>{{ $brand->email_address }}</td>
                                <td>{{ $brand->description }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.brands.show', ['brand' => $brand->id]) }}"
                                            class="btn btn-sm btn-outline-secondary">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                        <a href="{{ route('admin.brands.edit', ['brand' => $brand->id]) }}"
                                            class="btn btn-sm btn-outline-warning ms-1">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.brands.destroy', ['brand' => $brand->id]) }}"
                                            class="btn btn-sm btn-outline-danger ms-1" data-bs-toggle="modal"
                                            data-bs-target="#modal_brand_delete-{{ $brand->slug }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                        @include('admin.brands.partials.modal_delete')
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
