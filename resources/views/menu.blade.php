{{--
<nav class='main-menu'>
    <ul class='main-menu__list'>
        <li class='main-menu__list-item'><a href='{{route('about')}}' class='main-menu__link'>About</a></li>
        <li class='main-menu__list-item'><a href='{{route('news::index')}}' class='main-menu__link'>News</a></li>
        <li class='main-menu__list-item'><a href='{{route('registration')}}' class='main-menu__link'>Registration</a></li>
        <li class='main-menu__list-item'><a href='{{route('admin::news::index')}}' class='main-menu__link'>Admin news</a></li>
        <li class='main-menu__list-item'><a href='{{route('admin::categories::index')}}' class='main-menu__link'>Admin categories</a></li>
        <li class='main-menu__list-item'><a href='{{route('admin::comments::index')}}' class='main-menu__link'>Admin comments</a></li>
        <li class='main-menu__list-item'><a href='{{route('contactUs')}}' class='main-menu__link'>Contact Us</a></li>
    </ul>
</nav>
--}}

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
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
                <li class='nav-item main-menu__list-item'><a href='{{route('about')}}' class='nav-link main-menu__link'>About</a></li>
                <li class='nav-item main-menu__list-item'><a href='{{route('news::index')}}' class='nav-link main-menu__link'>News</a></li>
               {{-- <li class='nav-item main-menu__list-item'><a href='{{route('registration')}}' class='nav-link main-menu__link'>Registration</a></li>--}}
                <li class='nav-item main-menu__list-item'><a href='{{route('contactUs')}}' class='nav-link main-menu__link'>Contact Us</a></li>
                @guest
                    <li class='nav-item main-menu__list-item'><a href='{{route('social::login-vk')}}' class='nav-link main-menu__link'>Login VK</a></li>
                    <li class='nav-item main-menu__list-item'><a href='{{route('social-fb::login-fb')}}' class='nav-link main-menu__link'>Login FB</a></li>
                @else
                    @if (Auth::user()->is_admin)
                        <li class='nav-item main-menu__list-item'><a href='{{route('admin::news::index')}}' class='nav-link main-menu__link'>Admin news</a></li>
                        <li class='nav-item main-menu__list-item'><a href='{{route('admin::categories::index')}}' class='nav-link main-menu__link'>Admin categories</a></li>
                        <li class='nav-item main-menu__list-item'><a href='{{route('admin::comments::index')}}' class='nav-link main-menu__link'>Admin comments</a></li>
                        <li class='nav-item main-menu__list-item'><a href='{{route('admin::profiles::index')}}' class='nav-link main-menu__link'>Admin profiles</a></li>
                        <li class='nav-item main-menu__list-item'><a href='{{route('admin::parser::index')}}' class='nav-link main-menu__link'>News parser</a></li>
                    @endif
                @endguest
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <a class="dropdown-item" href='{{route('admin::profile::update')}}'>Profile update</a>
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
