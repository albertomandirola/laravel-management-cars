@extends('layouts.app')

@section('content')
    <div class="form-container my-5 border border-0">
        <h2 class="fs-4 text-secondary mt-4 text-center text-white">
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

                        <a href="{{ route('admin.cars.index') }}">Cars</a>
                        <a href="{{ route('admin.optionals.index') }}">Optionals</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
