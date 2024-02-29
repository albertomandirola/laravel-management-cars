<div class="container mt-4">
    <div class="row justify-content-center">

        <div class="form-container w-1300 mb-4">
            <h4 class="text-white">
                {{ __('Informazioni Profilo') }}
            </h4>


            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <p class="mt-1 fs-5 text-white">
                {{ __("Aggiorna le informazioni del profilo e l'indirizzo e-mail del tuo account.") }}
            </p>

            <form method="POST" action="{{ route('profile.update') }}" class="form">
                @csrf
                @method('patch')

                <div class="form-group">
                    <label for="name">{{ __('Nome') }}</label>
                    <input id="name" type="text" class="form-control @error('email') is-invalid @enderror"
                        name="name" value="{{ old('name', $user->name) }}" required autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->get('name') }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control" value="{{ old('email', $user->email) }}"
                        name="email" required autocomplete="username">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-muted">
                                {{ __('Your email address is unverified.') }}

                                <button form="send-verification" class="btn btn-outline-dark">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 text-success">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>
                <div>
                    <button type="submit" class="btn-save mt-2 w-125">
                        {{ __('Salva') }}
                    </button>

                    @if (session('status') === 'profile-updated')
                        <script>
                            const show = true;
                            setTimeout(() => show = false, 2000)
                            const el = document.getElementById('profile-status')
                            if (show) {
                                el.style.display = 'block';
                            }
                        </script>
                        <p id='profile-status' class="fs-6 mt-4 text-white">{{ __('Salvato correttamente.') }}</p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
