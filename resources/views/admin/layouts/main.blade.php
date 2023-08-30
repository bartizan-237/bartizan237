<!DOCTYPE html>
<html x-data="data()" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>세계망대플랫폼 관리자페이지</title>
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

</body>
</html>
