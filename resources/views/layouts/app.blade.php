<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include("layouts.html_head")
</head>
<body class="bg-237 antialiased leading-none">

{{--<body class="bg-gray-200 antialiased leading-none">--}}

@include("components.modal")
<div id="toast"><p></p></div>

    <div id="app"  style="max-width: 500px; margin:0 auto;" class="bg-237">
        <header id="header-bar" class="flex w-full border-b border border-gray-100 bg-white fixed top-0 left-0" style="height: 60px; z-index: 10;">
            <div class="mx-auto sm:w-full md:w-full lg:w-2/3 xl:w-2/3" style="min-width: 500px;">
                <div class="" style="padding:20px">
                    <a href="/home">
                        <img width="150" height="60" src="https://kr.object.ncloudstorage.com/immanuel/bartizan/image/bartizan_logo.png">
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

        <section style="margin-top:60px;  height: calc(100vh - 120px);" class="bg-237">
            @yield('content')
        </section>


        <section>
            @include('layouts.bottom_nav')
        </section>
    </div>
</body>

</html>
