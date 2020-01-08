<nav class="navbar navbar-expand-md sticky-top navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('img/logo.png') }}" class="w-50">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                  <a class="nav-link text-andel {{ Request::path() == '/' ? 'active' : '' }}" href="{{ route('site.index') }}">
                    <i class="fal fa-home"></i> Accueil
                  </a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link text-andel dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      <i class="fal fa-users"></i> L'Association
                  </a>

                  <div class="dropdown-menu dropdown-menu-left rounded-0 shadow" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">
                        Présentation
                      </a>
                      <a class="dropdown-item" href="#">
                        Le bureau
                      </a>
                  </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link text-andel" href="#">
                    <i class="fal fa-calendar-check"></i> Evenements
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link text-andel" href="#">
                    <i class="fal fa-video"></i>  Médias
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link text-andel" href="#">
                     Annauaire
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link text-andel {{ Request::path() == 'contact' ? 'active' : '' }}" href="{{ route('site.contact') }}">
                    <i class="fal fa-envelope"></i> Contact
                  </a>
              </li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->

                @guest
                    <li class="nav-item">
                        <a class="nav-link text-andel" href="{{ route('login') }}"><i class="fal fa-sign-in-alt"></i> {{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-andel" href="{{ route('register') }}"><i class="fal fa-user-plus"></i> {{ __('Register') }}</a>
                        </li>
                    @endif
                @else

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fal fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @if(auth()->user()->role_id ==1)
                            <a href="{{route('admin.index')}}" class="dropdown-item">Gestion</a>
                        @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
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
