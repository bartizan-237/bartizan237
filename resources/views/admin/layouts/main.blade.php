<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Chatis Dashboard</title>
    <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
            rel="stylesheet"
    />
    {{--<link rel="stylesheet" href="./assets/css/tailwind.output.css" />--}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"
    />
{{--    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">--}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/jerry_custom.css') }}">
    <link rel="stylesheet" href="/css/fab.css">
    <link rel="stylesheet" href="/css/dark_custom.css">

    <style>
        html{font-family: 'Noto Sans KR', sans-serif;}
        /* 상단 검색 영역 없애기 */
        header>.container>div>div{display:none;}
        /*.fab_wrapper{bottom:30px; right: 30px; position: relative; width: 180px; height: 230px;}
        .fab{width: 50px; height: 50px; bottom: 0; right: 0;}
        .fab_wheel{position: static;}*/
    </style>
    <script
            src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
            defer
    ></script>
    <script src="/assets/js/init-alpine.js"></script>
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />

    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
            defer
    ></script>
    <script src="/assets/js/charts-lines.js" defer></script>
    <script src="/assets/js/charts-pie.js" defer></script>
    <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>

</head>
<body>
<div
        class="flex h-screen bg-gray-50 "
        :class="{ 'overflow-hidden': isSideMenuOpen }"
>
    @include('admin.layouts.sidebar')

    @yield('content')

</div>
</div>


<div class="fab_wrapper flex-col" style="position:fixed;">
    <input id="fab_checkbox" type="checkbox" class="fab_checkbox" />
    <label id="kakao_quick_btn" class="fab cursor-pointer" for="fab_checkbox">
        <span class="fab_dots fab_dots_1"></span>
        <span class="fab_dots fab_dots_2"></span>
        <span class="fab_dots fab_dots_3"></span>
    </label>

    <div class="fab_wheel">
        <a id="btn_3" class="btn_wrap  cursor-pointer">
            <div class="fab_action_text">[KQ] Mall_ID : <input id="kq_quick_mall_id" type="text" value=""/> </div>
            <div id="kq_quick_btn" class="fab_action">
                <i class="fas fa-search"></i>
            </div>
        </a>
        <a id="btn_2" class="btn_wrap  cursor-pointer">
            <div class="fab_action_text">[SR] Mall_ID : <input id="sr_quick_mall_id" type="text" value=""/> </div>
            <div id="sr_quick_btn" class="fab_action">
                <i class="fas fa-search"></i>
            </div>
        </a>
        <a id="btn_1" class="btn_wrap  cursor-pointer">
            <div class="fab_action_text">[IS] Mall_ID : <input id="is_quick_mall_id" type="text" value=""/> </div>
            <div id="is_quick_btn" class="fab_action">
                <i class="fas fa-search"></i>
            </div>
        </a>
    </div>
</div>

<script>
    $("#is_quick_btn").click(function(){
       location.href = '/app/is?search_field=mall_id&search_keyword=' + $("#is_quick_mall_id").val();
    });
    $("#sr_quick_btn").click(function(){
        location.href = '/app/sr?search_field=mall_id&search_keyword=' + $("#sr_quick_mall_id").val();
    });
    $("#kq_quick_btn").click(function(){
        location.href = '/app/kq?search_field=mall_id&search_keyword=' + $("#kq_quick_mall_id").val();
    });

    $("#is_quick_mall_id").on("keyup", function (e){
        if(e.keyCode == 13){
            $('#is_quick_btn').trigger('click');
        }
    });
    $("#sr_quick_mall_id").on("keyup", function (e){
        if(e.keyCode == 13){
            $('#sr_quick_btn').trigger('click');
        }
    });
    $("#kq_quick_mall_id").on("keyup", function (e){
        if(e.keyCode == 13){
            $('#kq_quick_btn').trigger('click');
        }
    });
</script>

</body>
</html>
