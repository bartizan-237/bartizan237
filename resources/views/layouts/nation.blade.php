<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
    @include("layouts.html_head")
</head>
<body class="bg-237 antialiased leading-none">
@include("components.modal")
<div id="toast"><p></p></div>
<div id="app" style="max-width: 500px; margin:0 auto;" class="bg-gray-100">
    <header id="header-bar" class="w-full border-b border-gray-100 bg-white fixed top-0 left-0" style="height: 60px; z-index: 10;">
        <div class="w-full" style="padding: 10px; max-width: 500px; margin:0 auto">
            <a onclick="history.back()" class="inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-900 inline-block" style="height: 30px; width: 30px; margin-top:-5px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div class="inline-block">
                <img src="{{env("NCLOUD_FLAG_PATH")}}/{{strtolower($nation->country_code)}}.png" class="inline-block"
                    style="object-fit: contain; height: 30px; width: 40px; padding-bottom: 5px" alt="img.."/>
                <a href="/nation/{{$nation->id}}" class="text-gray-900 text-xl" style="height: 40px; line-height: 40px;">
                    {{$nation->name}}
                    <span class="text-sm">{{$nation->name_en}}</span>
                </a>
            </div>
        </div>


        <div id="tab_menu" class="w-full flex bg-white" style="padding: 10px 10px 0px 10px; height: 40px; max-width: 500px; margin:0 auto">
            <div class="py-1 px-3 text-gray-800"
                 onclick="location.href='/nation/{{$nation->id}}'"
                 style=" @if($_SERVER['REQUEST_URI'] == "/nation/".$nation->id) border-bottom: 2px solid #333; @endif  " >
                정보
            </div>

            <div class="py-1 px-3 text-gray-800"
                 onclick="toast('info', '준비 중 입니다'); return; location.href='/nation/{{$nation->id}}/mission'"
                 style=" @if(str_contains($_SERVER['REQUEST_URI'], "/nation/".$nation->id . "/mission")) border-bottom: 2px solid #333; @endif  " >
                선교현장
            </div>
        </div>
    </header>

    <section class="bg-gray-200" style="padding-top:100px; min-height: 100vh;">
        @yield('content')
    </section>


    @include('layouts.bottom_nav', ['now' => 'nation'])
</div>
</body>

</html>
