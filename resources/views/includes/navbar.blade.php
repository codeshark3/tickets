

   <nav class="navbar navbar-expand-md navbar-dark bg-primary navbar-laravel navbar-color-on-scroll fixed-top {{-- navbar-transparent --}}" color-on-scroll="100">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'FLASH') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="sr-only">Toggle navigation</span>

                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                     <ul class="navbar-nav">
      <li class="nav-item  {{Request::is('/') ? 'active' : ''}}">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item  {{Request::is('about') ? 'active' : ''}}">
        <a class="nav-link" href="/about">About</a>
      </li>
      <li class="nav-item  {{Request::is('services') ? 'active' : ''}}">
        <a class="nav-link" href="/services">Services</a>
      </li>
       <li class="nav-item  {{Request::is('contact') ? 'active' : ''}}">
        <a class="nav-link" href="/contact">Contact</a>
      </li>
        <li class="nav-item  {{Request::is('create') ? 'active' : ''}}">
        <a class="nav-link" href="/jobs/create">Create</a>
      </li>
       <li class="nav-item  {{Request::is('dashobard') ? 'active' : ''}}">
        <a class="nav-link" href="/dashboard">Dashboard</a>
      </li>
     
    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{-- {{ route('login') }} --}}">{{ __('Login') }}</a>
                            </li>

                     {{--    <button class="btn btn-round btn-primary" data-toggle="modal" data-target="#loginModal">
                            Login<i class="material-icons">assignment</i>

                        </button>
 --}}
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{-- {{ route('register') }} --}}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{-- {{ route('logout') }} --}}"
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
