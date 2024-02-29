@extends('layouts.app')

@section('body-class', 'dashboard-page')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="form-container">
                <h4 class="text-center text-white">
                    Reset Password
                </h4>
                <form method="POST" action="{{ route('password.email') }}" class="form">
                    @csrf
                    <div class="form-group">
                        <label for="email">{{ __('E-Mail') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn_login mt-2">
                        {{ __('Reset Password') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
