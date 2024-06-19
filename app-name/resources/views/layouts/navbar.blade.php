<nav class="navbar navbar-expand-md navbar-light shadow-sm">
    <div class="container">
        <a href="{{ url('/') }}"> Strona Głowna </a>
        <a href="{{ route('comments') }}"> Komentarze </a>
        <!-- Authentication Links -->
        @auth
            <a href="{{ url('/profile') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Profil</a>
        @endauth
        @guest
            <a href="{{ route('login') }}">Zaloguj</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
            @endif
        @endguest
    </div>
</nav>
