<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="og:image" content="https://kr.object.ncloudstorage.com/immanuel/ddeul/logo.png">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400&display=swap" rel="stylesheet">


</head>
<body class="bg-gray-100 antialiased leading-none">
<div id="toast"><p></p></div>
<div id="app" style="" class="bg-gray-100">
    <header id="header-bar" class="w-full border-b border-gray-100 bg-white fixed top-0 left-0" style="height: 60px; z-index: 10;">
        <div class="w-full" style="padding: 10px">
            <a onclick="window.history.back()" class="inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-900 inline-block" style="height: 30px; width: 30px; margin-top:-5px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div class="inline-block">
                <h1 class="text-gray-900 text-xl" style="height: 40px; line-height: 40px;">
                    {{$ddeul->name}}
                </h1>
            </div>
        </div>

        <!-- TAB MENU -->
        <div class="w-full flex bg-white" style="padding: 10px 10px 0px 10px; height: 40px">
            <div class="py-1 px-3 text-gray-800"
                 onclick="location.href='/ddeul/{{$ddeul->id}}'"
                 style=" @if($_SERVER['REQUEST_URI'] == "/ddeul/".$ddeul->id) border-bottom: 2px solid #333; @endif  " >
                뜰
            </div>
            <div class="py-1 px-3 text-gray-800"
                 onclick="location.href='/ddeul/{{$ddeul->id}}/posts'"
                 style=" @if(str_contains($_SERVER['REQUEST_URI'], "/ddeul/".$ddeul->id."/posts") !== false) border-bottom: 2px solid #333; @endif  " >
                글 목록
            </div>
        </div>
    </header>

    <section style="margin-top:100px;">
        @yield('content')
    </section>


    <!-- BOTTOM NAV BAR -->
    <div class="bg-white fixed bottom-0 w-full border-t border-gray-50 flex" style="z-index: 10; margin-top:60px">
        <a id="nav_main" href="/home" class="nav_btn cursor-pointer flex flex-grow items-center justify-center p-2 text-gray-800 active:text-theme-01">
            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mb-1" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
                <span class="block text-xs leading-none">HOME</span>
            </div>
        </a>
        <a id="" href="#" class="nav_btn cursor-pointer flex flex-grow items-center justify-center p-2 text-gray-800 active:text-theme-01">
            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mb-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
                <span class="block text-xs leading-none">검색</span>
            </div>
        </a>
        <a id="" href="/ddeul" class="nav_btn cursor-pointer flex flex-grow items-center justify-center p-2 text-gray-800 active:text-theme-01">
            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mb-1 feather feather-flag" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line>
                </svg>
                <span class="block text-xs leading-none">뜰</span>
            </div>
        </a>
        <a id="" href="#" class="nav_btn cursor-pointer flex flex-grow items-center justify-center p-2 text-gray-800 active:text-theme-01">
            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mb-1" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                </svg>
                <span class="block text-xs leading-none">알림</span>
            </div>
        </a>
        <a id="" href="/user/my_page" class="nav_btn cursor-pointer flex flex-grow items-center justify-center p-2 text-gray-800 active:text-theme-01">
            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mb-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                </svg>
                <span class="block text-xs leading-none">마이페이지</span>
            </div>
        </a>

    </div>
</div>
</body>

<script>
    // Burger menus
    document.addEventListener('DOMContentLoaded', function() {
        // open
        const burger = document.querySelectorAll('.navbar-burger');
        const menu = document.querySelectorAll('.navbar-menu');

        if (burger.length && menu.length) {
            for (var i = 0; i < burger.length; i++) {
                burger[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }

        // close
        const close = document.querySelectorAll('.navbar-close');
        const backdrop = document.querySelectorAll('.navbar-backdrop');

        if (close.length) {
            for (var i = 0; i < close.length; i++) {
                close[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }

        if (backdrop.length) {
            for (var i = 0; i < backdrop.length; i++) {
                backdrop[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }


    });
</script>
</html>
