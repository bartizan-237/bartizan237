<!doctype html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >--}}
<head>
    @include("layouts.html_head")
</head>
<body class="bg-237 antialiased leading-none">
@include("components.modal")
<div id="toast"><p></p></div>
<div id="joinRequest" style="max-width: 500px; margin:0 auto;" class="bg-gray-50">
    <header id="header-bar" class="w-full border-b border-gray-200 bg-white fixed top-0 left-0" style="height: 60px; z-index: 10;">
        <div class="w-full" style="padding: 10px; max-width: 500px; margin:0 auto">
            <a onclick="history.back()" class="inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-900 inline-block" style="height: 30px; width: 30px; margin-top:-5px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div class="inline-block">
                <a href="/user/mypage" class="text-gray-900 text-xl" style="height: 40px; line-height: 40px;">
                    마이페이지
                </a>
            </div>
        </div>

        <!-- TAB MENU -->
        <div id="tab_menu" class="w-full flex bg-white" style="padding: 10px 10px 0px 10px; height: 40px; max-width: 500px; margin:0 auto">
            <div class="@if(str_contains($_SERVER['REQUEST_URI'], "/user/my_page" )) current-open-menu @endif py-1 px-3 text-gray-800"
                 onclick="location.href='/user/my_page'"
            >
                기본정보
            </div>
            <div class="@if($_SERVER['REQUEST_URI'] == "/user/bartizan") current-open-menu @endif py-1 px-2 text-gray-800 relative"
                 onclick="location.href='/user/bartizan'"
                 style=" @if(str_contains($_SERVER['REQUEST_URI'], "/user/bartizan") !== false) border-bottom: 2px solid #333; @endif  " >
                나의 망대
            </div>
            <div class="@if(str_contains($_SERVER['REQUEST_URI'], "/user/post" )) current-open-menu @endif py-1 px-2 text-gray-800"
                 onclick="location.href='/user/watchman'"
                 style=" @if(str_contains($_SERVER['REQUEST_URI'], "/user/post") !== false) border-bottom: 2px solid #333; @endif  " >
                작성글
            </div>
            <div class="@if($_SERVER['REQUEST_URI'] == "/user/notification") current-open-menu @endif py-1 px-2 text-gray-800"
                 {{--                 onclick="location.href='/bartizan/{{$bartizan->id}}/watchmen'"--}}
                 onclick="toast('info','준비 중 입니다.')"
                 style=" @if(str_contains($_SERVER['REQUEST_URI'], "/user/notification") !== false) border-bottom: 2px solid #333; @endif  " >
                알림
            </div>
        </div>

    </header>

    <section class="bg-gray-200" style="padding-top:100px; min-height: 100vh;">
        @yield('content')
    </section>

    @include('layouts.bottom_nav', ['now' => 'user'])

</div>
</body>

</html>
