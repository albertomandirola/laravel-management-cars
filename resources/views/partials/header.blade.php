<header>
    <nav class="navbar navbar-expand-md navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <div class="logo_car">
                    <img src="./img/logo.png" alt="">
                </div>
                {{-- config('app.name', 'Laravel') --}}
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <h3 class="text-white"> Royals Cars</h3>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <button><a class="link-offset-2 link-underline link-underline-opacity-0"
                                    href="{{ route('login') }}">{{ __('Accedi') }}</a></button>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <button><a class="link-offset-2 link-underline link-underline-opacity-0"
                                        href="{{ route('register') }}">{{ __('Registrati') }}</a></button>
                            </li>
                        @endif
                    @else
                        <label class="popup">
                            <input type="checkbox">
                            <div class="burger" tabindex="0">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <nav class="popup-window">
                                <ul>
                                    <li>
                                        <button>
                                            <span><a class="dropdown-item"
                                                    href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></span>
                                        </button>
                                    </li>
                                    <li>
                                        <button>
                                            <span><a class="dropdown-item"
                                                    href="{{ url('profile') }}">{{ __('Profile') }}</a></span>
                                        </button>
                                    </li>
                                    <li>
                                        <button>
                                            <span><a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a></span>
                                        </button>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                    <li>
                                </ul>
                            </nav>
                        </label>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
