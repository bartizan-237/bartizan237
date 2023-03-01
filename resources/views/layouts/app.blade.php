<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="og:image" content="https://kr.object.ncloudstorage.com/immanuel/ddeul/ddeul237.png">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/main.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <input id="user_id" type="hidden" value="{{Auth::user()->id ?? ''}}">
</head>
<body class="bg-237 antialiased leading-none">


<div id="toast"><p></p></div>

    <div id="app"  style="max-width: 500px; margin:0 auto;" class="bg-237">
        <header id="header-bar" class="flex w-full border-b border border-gray-100 bg-white fixed top-0 left-0" style="height: 60px; z-index: 10;">
            <div class="mx-auto sm:w-full md:w-full lg:w-2/3 xl:w-2/3" style="min-width: 500px;">
                <div class="" style="padding:20px">
                    <a href="/home">
                        <img width="100" height="40" src="https://kr.object.ncloudstorage.com/immanuel/ddeul/ddeul237.png">
                    </a>
                </div>

            </div>

{{--            @auth--}}
{{--                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
{{--                    로그아웃--}}
{{--                </a>--}}
{{--                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                    {{ csrf_field() }}--}}
{{--                </form>--}}
{{--            @else--}}
{{--                <a href="{{ route('login') }}">--}}
{{--                    로그인--}}
{{--                </a>--}}
{{--                <a href="{{ route('register') }}">--}}
{{--                    회원가입--}}
{{--                </a>--}}
{{--            @endauth--}}

        </header>

        <section style="margin-top:60px;  height: calc(100vh - 120px)">
            @yield('content')
        </section>


       @include('layouts.bottom_nav')
    </div>
</body>

</html>
