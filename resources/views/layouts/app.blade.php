<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
{{--        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">--}}

        <!-- Styles -->
{{--        <link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}

        <!-- Scripts -->
{{--        <script src="{{ asset('js/app.js') }}" defer></script>--}}
    </head>
    <body class="font-sans antialiased">

    <div>
        <a href="{{ route('cars.index') }}">
            Cars
        </a>
        &bull;
        @guest
            <a href="{{ route('login') }}">
                Войти
            </a>
            &bull;
            <a href="{{ route('register') }}">
                Регистрация
            </a>
            @else

            {{auth()->user()->name}}

            &bull;

{{--            <a href="{{ route('settings') }}">--}}
{{--                Настройки--}}
{{--            </a>--}}

{{--            &bull;--}}
            <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Выйти</a>

            <form id="logout-form" action="{{route('logout')}}" method="post">@csrf</form>
        @endguest


    </div>

    <hr/>

    @yield('content')
    </body>
</html>
