<header>
    <ul>
        <li>
            <a href="{{route('home')}}"><img src="{{asset('icons/logo.svg')}}" alt=""></a>
        </li>
        <li>
            <a href="">Каталог</a>
        </li>
        <li>
            <a href="">О нас</a>
        </li>
    </ul>
    <ul>
        @guest
            <li>
                <a href="{{route('auth.signin')}}">Вход</a>
            </li>
            <li>
                <a href="{{ route('auth.signup') }}">Регистрация</a>
            </li>
        @endguest

        @auth
            <li>
                <a href="">{{Auth::user()->name}}</a>
            </li>
            <li>
                <a href="{{ route('auth.logout') }}">Выход</a>
            </li>
        @endauth
    </ul>
</header>
