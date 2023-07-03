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
<body class="bg-gray-100 antialiased leading-none">
<div id="toast"><p></p></div>
<div id="app" style="max-width: 500px; margin:0 auto;" class="bg-gray-100">
    <header id="header-bar" class="w-full border-b border-gray-100 bg-white fixed top-0 left-0" style="height: 60px; z-index: 10;">
        <div class="w-full" style="padding: 10px; max-width: 500px; margin:0 auto">
            <a onclick="location.href='/bartizan'" class="inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-900 inline-block" style="height: 30px; width: 30px; margin-top:-5px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div class="inline-block">
                <a href="/bartizan/{{$bartizan->id}}" class="text-gray-900 text-xl" style="height: 40px; line-height: 40px;">
                    {{$bartizan->name}}<span class="text-base"> 망대</span>
                </a>
            </div>
        </div>

        <!-- TAB MENU -->
        @if(!isset($show_post))
        <div id="tab_menu" class="w-full flex bg-white" style="padding: 10px 10px 0px 10px; height: 40px; max-width: 500px; margin:0 auto">
            <div class="py-1 px-3 text-gray-800"
                 onclick="location.href='/bartizan/{{$bartizan->id}}'"
                 style=" @if($_SERVER['REQUEST_URI'] == "/bartizan/".$bartizan->id) border-bottom: 2px solid #333; @endif  " >
                뜰
            </div>
{{--            <div class="py-1 px-2 text-gray-800"--}}
{{--                 onclick="location.href='/bartizan/{{$bartizan->id}}/notices'"--}}
{{--                 style=" @if(str_contains($_SERVER['REQUEST_URI'], "/bartizan/".$bartizan->id."/notices") !== false) border-bottom: 2px solid #333; @endif  " >--}}
{{--                공지--}}
{{--            </div>--}}
            <div class="py-1 px-2 text-gray-800"
                 onclick="location.href='/bartizan/{{$bartizan->id}}/posts'"
                 style=" @if(str_contains($_SERVER['REQUEST_URI'], "/bartizan/".$bartizan->id."/posts") !== false) border-bottom: 2px solid #333; @endif  " >
                포스트
            </div>
        </div>
        @endif
    </header>

    <section class="bg-gray-200" style="padding-top:100px; min-height: 100vh;">
        @yield('content')
    </section>


    @include('layouts.bottom_nav', ['now' => 'bartizan'])
</div>
</body>

</html>
