<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include("layouts.html_head")

    <!-- Naver Webmaster -->
    <meta name="naver-site-verification" content="9f187befa336e371c6d7a39df8bf86123f9e2a93" />

    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gowun+Batang:wght@400;700&family=Nanum+Myeongjo:wght@400;700&family=Song+Myung&display=swap" rel="stylesheet">

    <style>
        html {
            font-family: 'Gowun Batang', serif;
        }
        #nation_container {
            -ms-overflow-style: none; /* IE and Edge */
            scrollbar-width: none; /* Firefox */
        }
        #nation_container::-webkit-scrollbar {
            display: none; /* Chrome, Safari, Opera*/
        }
    </style>
</head>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FB3Y7K9XB3"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-FB3Y7K9XB3');
</script>



<body class="w-full h-full antialiased leading-none"
      {{--        style="background-color: #138237; background-image: linear-gradient(160deg, #138237 0%, rgb(237,237,237) 100%);">--}}
      style="background-color: #0093E9; background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);">

{{--<div id="header" class="w-full fixed" style="top:0; z-index:10; height: 10vh"> 세계망대 파수꾼 작정현황 </div>--}}

{{--<div id="nation_container" class="grid grid-cols-4 w-full px-8" style="padding-top:10vh; max-width: 1900px; justify-content: center; overflow: scroll; height: 100vh; margin : 0px auto; gap:15px;">--}}
<div id="nation_container" class="slick w-full px-8" style="padding: 5vh 3vh; max-width: 1900px; justify-content: center; overflow: scroll; height: 100vh; margin : 0px auto;">
    @foreach($bartizans as $i => $bartizan)
        <div class="nation_card p-5 m-3 relative rounded-lg" style="height:80vh">
            <div class="absolute h-3 w-3 rounded-full bg-{{$bartizan->getColor()}}-600 text-gray-100 font-bold text-center"
                 style="height: 50px; width: 50px; padding: 10px; line-height: 30px; left:0px; top:0px;
                    @if($bartizan->dashboard_id < 10)
                        font-size: 25px;
                    @elseif($bartizan->dashboard_id > 10 AND $bartizan->dashboard_id < 100)
                        font-size: 20px;
                    @else
                        font-size: 18px;
                    @endif
             ">
                {{$bartizan->dashboard_id}}
            </div>
            <div class="p-5 w-full rounded-lg border-{{$bartizan->getColor()}}-500 border-2 rounded shadow bg-gray-200 h-full ">
                <div class="bg-white rounded-lg p-5">
                    <p class="text-xl pb-1 text-gray-800">
                        @switch($bartizan->nation->continent)
                            @case("Asia") 아시아 @break
                            @case("Oceania") 오세아니아 @break
                            @case("Africa") 아프리카 @break
                            @case("America") 아메리카 @break
                            @case("North America") 북아메리카 @break
                            @case("South America") 남아메리카 @break
                            @case("Europe") 유럽 @break
                        @endswitch
                        <span>
                        <svg xmlns="http://www.w3.org/2000/svg" style="margin-bottom: 5px" class="h-6 w-6 inline text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                        {{$bartizan->nation->province}}
                    </span>
                    </p>
                    <div class="flex">
                        <img src="{{env("NCLOUD_FLAG_PATH")}}/{{strtolower($bartizan->nation->country_code)}}.svg" class="inline-block"
                             style="border:2px solid #ddd; object-fit: contain; height: 100px; width: auto; " alt="img.."/>

                        <div class="flex flex-col" style="height: 50px;">
                            <p class="text-2xl pb-1 font-bold ml-3 ">
                                {{$bartizan->nation->name}}
                            </p>
                            <span class="text-gray-800 text-xl ml-3">{{$bartizan->nation->name_en}}</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap mt-2">
                    <div class="flex flex-col w-1/2 p-1">
                        <div class="bg-white p-3 mb-3 rounded">
                            <h1 class="text-base font-bold mb-1">망대 대표 (장로)</h1>
                            @forelse($bartizan->pledges->representative as $represent)
                                <div class="w-full justify-between text-2xl">
                                    <p class="text-gray-900 font-bold mb-1">{{$represent->name}} <span class="text-gray-800 font-medium text-base"> {{$represent->district}}</span></p>
                                </div>
                            @empty
                                <div class="w-full justify-between text-2xl">
                                    -
                                </div>
                            @endforelse
                        </div>

                        <div class="bg-white p-3 mb-3 rounded">
                            <h1 class="text-base font-bold mb-1">권사</h1>
                            @forelse($bartizan->pledges->watchmen as $watchman)
                                @if($watchman->position == "권사")
                                    <div class="w-full justify-between text-2xl">
                                        <p class="text-gray-900 font-bold mb-1">{{$watchman->name}} <span class="text-gray-800 font-medium text-base"> {{$watchman->district}}</span></p>
                                    </div>
                                @endif
                            @empty
                                <div class="w-full justify-between text-2xl">
                                    -
                                </div>
                            @endforelse
                        </div>

                        <div class="bg-white p-3 mb-3 rounded">
                            <h1 class="text-base font-bold mb-1">안수집사</h1>
                            @forelse($bartizan->pledges->tychicus as $tychicus)
                                @if($tychicus->position == "안수집사")
                                    <div class="w-full justify-between text-2xl">
                                        <p class="text-gray-900 font-bold mb-1">{{$tychicus->name}} <span class="text-gray-800 font-medium text-base"> {{$tychicus->district}}</span></p>
                                    </div>
                                @endif
                            @empty
                                <div class="w-full justify-between text-2xl">
                                    -
                                </div>
                            @endforelse
                        </div>

                    </div>

                    <div class="flex flex-col w-1/2 p-1">
                        <div class="bg-white p-3 mb-3 rounded">
                            <h1 class="text-base font-bold mb-1">렘넌트</h1>
                            @forelse($bartizan->pledges->watchmen as $watchman)
                                @if($watchman->position == "RT")
                                    <div class="w-full justify-between text-2xl">
                                        <p class="text-gray-900 font-bold mb-1">{{$watchman->name}} <span class="text-gray-800 font-medium text-base"> {{$watchman->district}}</span></p>
                                    </div>
                                @endif
                            @empty
                                <div class="w-full justify-between text-2xl">
                                    -
                                </div>
                            @endforelse
                        </div>

                        <div class="bg-white p-3 mb-3 rounded">
                            <h1 class="text-base font-bold mb-1">성도</h1>
                            @forelse($bartizan->pledges->watchmen as $watchman)
                                @if($watchman->position == "성도")
                                    <div class="w-full justify-between text-2xl">
                                        <p class="text-gray-900 font-bold mb-1">{{$watchman->name}} <span class="text-gray-800 font-medium text-base"> {{$watchman->district}}</span></p>
                                    </div>
                                @endif
                            @empty
                                <div class="w-full justify-between text-2xl">
                                    -
                                </div>
                            @endforelse
                        </div>
                    </div>

                </div>

            </div>
        </div>
    @endforeach
</div>

{{--<div id="FOOTER" style="height: 5vh">--}}
{{--    메시지 흐름 ...--}}
{{--</div>--}}
</body>


<script>

    $('.slick').slick({
        slidesToShow: 3,
        autoplay: true,
        autoplaySpeed: 2000,
    });
</script>
</html>
