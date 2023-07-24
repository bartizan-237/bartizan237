<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
    @include("layouts.html_head")
</head>
<body class="bg-gray-100 antialiased leading-none">
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
                망대
            </div>
            <div class="py-1 px-2 text-gray-800"
{{--                 onclick="location.href='/bartizan/{{$bartizan->id}}/watchmen'"--}}
                 onclick="toast('info','준비 중 입니다.')"
                 style=" @if(str_contains($_SERVER['REQUEST_URI'], "/bartizan/".$bartizan->id."/watchmen") !== false) border-bottom: 2px solid #333; @endif  " >
                파수꾼
            </div>
            <div class="py-1 px-2 text-gray-800"
{{--                 onclick="location.href='/bartizan/{{$bartizan->id}}/posts'"--}}
                 onclick="toast('info','준비 중 입니다.')"
                 style=" @if(str_contains($_SERVER['REQUEST_URI'], "/bartizan/".$bartizan->id."/posts") !== false) border-bottom: 2px solid #333; @endif  " >
                게시판
            </div>
            @if(\Auth::user() !== null AND \Auth::user()->id!==$bartizan->admin_user_id)
{{--                <form action="/bartizan/{{$bartizan->id}}/join" method="POST">--}}
{{--                    @csrf--}}
{{--                    <input type="hidden" name="join_user_id" id="join_user_id" value="{{\Auth::user()->id}}"/>--}}
{{--                    <input type="hidden" name="join_bartizan_id" id="join_bartizan_id" value="{{$bartizan->id}}"/>--}}
                <div id="joinRequest">
                    <button class="py-1 px-2 text-gray-800" @click="join_request({{\Auth::user()->id}},{{$bartizan->id}})">
                        {{--                        style=" @if(str_contains($_SERVER['REQUEST_URI'], "/bartizan/".$bartizan->id."/join") !== false) border-bottom: 2px solid #333; @endif  " >--}}
                        파수꾼 신청
                    </button>
                </div>
{{--                </form>--}}
            @elseif(Auth::user() === null)
                {{-- 망대 관리자만 볼 수 있는 파수꾼 신청 목록이 로그인 상태가 아닐 경우 누구에게나 보이는 문제--}}
            @else
                <div>
                    <button class="py-1 px-2 text-gray-800"
                            onclick="location.href='/bartizan/{{$bartizan->id}}/joinlist'">
                        파수꾼 신청 목록
                    </button>
                </div>

            @endif


        </div>
        @endif
        <script src="{{ asset('js/watchman/watchman.js') }}" defer></script>
    </header>

    <section class="bg-gray-200" style="padding-top:100px; min-height: 100vh;">
        @yield('content')
    </section>


    @include('layouts.bottom_nav', ['now' => 'bartizan'])
</div>
</body>

</html>
