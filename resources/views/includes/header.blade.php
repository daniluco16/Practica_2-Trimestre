<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <strong>Manager Jobs</strong>
            <!--{{ config('app.name', 'Laravel') }}-->
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><strong>{{ __('Login') }}</strong></a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}"><strong>{{ __('auth.Registro') }}</strong></a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="{{ (Auth::user()->image_path ?? 'https://image.flaticon.com/icons/svg/236/236831.svg') }}" width="40" height="40">&nbsp;<strong>{{ Auth::user()->name }}</strong> <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        
                        <a class="dropdown-item" href="{{ route('perfil', ['id' => Auth::user()->id]) }}">
                            <i class="fas fa-user-circle"></i>&nbsp;{{ __('Perfil') }}
                        </a>
                                               
                        <a class="dropdown-item" href="{{ route('bandeja_entrada') }}">
                            <i class="fas fa-inbox"></i>&nbsp;{{ __('Bandeja de entrada') }}
                        </a>
                        
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>&nbsp;{{ __('Logout') }}
                        </a>
                        
                        

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

