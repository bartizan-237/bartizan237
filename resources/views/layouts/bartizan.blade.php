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
{{--            <a onclick="history.back()" class="inline-block">--}}
            <!-- 23.8.26. 뒤로가기 수정 -->
            <a onclick="location.href='/bartizan?province=전체'" class="inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-900 inline-block" style="height: 30px; width: 30px; margin-top:-5px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div class="inline-block">
                <a href="/bartizan/{{$bartizan->id}}" class="text-gray-900 text-xl" style="height: 40px; line-height: 40px;">
                    {{$bartizan->name}}<span class="text-base"> 망대</span>
                </a>

                @if(\Auth::user() AND \Auth::user()->id == $bartizan->admin_user_id)
                    <!-- 망대 정보 수정 -->
                    <button class="bg-green-500 text-white rounded-full" style="line-height: 15px; font-size: 15px; width: 30px; height: 30px;"
                            onclick="location.href='/bartizan/{{$bartizan->id}}/edit'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit" style="margin: auto; "><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                    </button>
                @endif
            </div>
        </div>

        <!-- TAB MENU -->
        @if(!isset($show_post))
        <div id="tab_menu" class="w-full flex bg-white" style="padding: 10px 10px 0px 10px; height: 40px; max-width: 500px; margin:0 auto">
            <div class="@if($_SERVER['REQUEST_URI'] == "/bartizan/".$bartizan->id."/nation") current-open-menu @endif py-1 px-2 text-gray-800 relative"
                 onclick="location.href='/bartizan/{{$bartizan->id}}/nation'"
                 style=" @if(str_contains($_SERVER['REQUEST_URI'], "/bartizan/".$bartizan->id."/watchmen") !== false) border-bottom: 2px solid #333; @endif  " >
                나라 정보
                <span aria-hidden="true" class="absolute top-0 right-0 inline-block transform translate-x-1 -translate-y-1 bg-red-500 rounded-full " style="height: 5px; width: 5px; top: 5px; right: 5px"></span>
            </div>

            <div class="@if($_SERVER['REQUEST_URI'] == "/bartizan/".$bartizan->id."/pledges") current-open-menu @endif py-1 px-2 text-gray-800 relative"
                 onclick="location.href='/bartizan/{{$bartizan->id}}/pledges'"
                 style=" @if(str_contains($_SERVER['REQUEST_URI'], "/bartizan/".$bartizan->id."/watchmen") !== false) border-bottom: 2px solid #333; @endif  " >
                작정 목록
                <span aria-hidden="true" class="absolute top-0 right-0 inline-block transform translate-x-1 -translate-y-1 bg-red-500 rounded-full " style="height: 5px; width: 5px; top: 5px; right: 5px"></span>
            </div>

            <div class="@if($_SERVER['REQUEST_URI'] == "/bartizan/".$bartizan->id) current-open-menu @endif py-1 px-3 text-gray-800"
                 onclick="location.href='/bartizan/{{$bartizan->id}}'"
            >
                망대
            </div>
            
            <div class="@if(str_contains($_SERVER['REQUEST_URI'], "/bartizan/".$bartizan->id."/posts" )) current-open-menu @endif py-1 px-2 text-gray-800"
{{--                 onclick="location.href='/bartizan/{{$bartizan->id}}/posts'"--}}
                  onclick="toast('info','준비 중 입니다.')"
                 style=" @if(str_contains($_SERVER['REQUEST_URI'], "/bartizan/".$bartizan->id."/posts") !== false) border-bottom: 2px solid #333; @endif  " >
                게시판
            </div>
{{--            <div class="@if($_SERVER['REQUEST_URI'] == "/bartizan/".$bartizan->id."/watchmen") current-open-menu @endif py-1 px-2 text-gray-800"--}}
{{--                 onclick="location.href='/bartizan/{{$bartizan->id}}/watchmen'"--}}
{{--                 onclick="toast('info','준비 중 입니다.')"--}}
{{--                 style=" @if(str_contains($_SERVER['REQUEST_URI'], "/bartizan/".$bartizan->id."/watchmen") !== false) border-bottom: 2px solid #333; @endif  " >--}}
{{--                파수꾼--}}
{{--            </div>--}}

            @if(\Auth::user() !== null AND \Auth::user()->id!==$bartizan->admin_user_id)
                <div>
                    <button class="py-1 px-2 text-gray-800"
                            onclick="location.href='/bartizan/{{$bartizan->id}}/join_request'">
                        파수꾼 신청
                    </button>
                </div>
            @elseif(Auth::user() === null)

            @else
                <div>
                    <button class="py-1 px-2 text-gray-800"
                            onclick="location.href='/bartizan/{{$bartizan->id}}/join_request_list'">
                        파수꾼 신청 목록
                    </button>
                </div>
            @endif
        </div>
        @endif

        <!-- 23.7.25
         아래 asset('js/watchman/watchman.js') 에서 에러발생으로 다른 페이지(/bartizan/9/posts) 에서 Vue Component가 로드되지 않아서 임시로 주석처리함 -->
{{--        <script src="{{ asset('js/watchman/watchman.js') }}" defer></script>--}}
{{--        <script src="{{ asset('js/join_request/join_request.js') }}" defer></script>--}}
    </header>

    <section class="bg-gray-200" style="padding-top:100px; min-height: 100vh;">
        @yield('content')
    </section>


    @include('layouts.bottom_nav', ['now' => 'bartizan'])

</div>
</body>

</html>


{{--파수꾼 신청 모달창--}}
{{--<div id="watchmen-modal" class="watchmen-modal">--}}
{{--    <div class="modal-content">--}}
{{--        <p class="text-center">파수꾼 신청을 하시겠습니까?</p><br/>--}}
{{--        <div class="text-center">--}}
{{--            <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded" @click="join_request({{\Auth::user()->id}},{{$bartizan->id}})">예</button>--}}
{{--            <button class="bg-red-500 text-white font-bold py-2 px-4 rounded" @click="onCancel">아니오</button>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--파수꾼 신청 모달창--}}
