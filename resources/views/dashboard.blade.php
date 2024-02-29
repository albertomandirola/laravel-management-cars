@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('User Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>
                            <a href="{{ route('admin.cars.index') }}">Cars</a>
                        </div>
                        <div>
                            <a href="{{ route('admin.brands.index') }}">Brands</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
