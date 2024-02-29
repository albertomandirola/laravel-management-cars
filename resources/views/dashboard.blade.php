@extends('layouts.app')

@section('body-class', 'dashboard-page')

@section('content')
    <div class="form-container my-5 border border-0">
        <h2 class="fs-4 text-secondary mt-3 text-center text-white">
            {{ __('Dashboard') }}
        </h2>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <button class="btn_login_dashboard">
                    <a class="fw-bold" href="{{ route('admin.cars.index') }}">Cars</a>
                </button>
            </div>
        </div>
    </div>
@endsection
