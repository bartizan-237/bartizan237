<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include("layouts.html_head")

    <!-- Naver Webmaster -->
    <meta name="naver-site-verification" content="9f187befa336e371c6d7a39df8bf86123f9e2a93" />

    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
</head>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FB3Y7K9XB3"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-FB3Y7K9XB3');
</script>



<body class="antialiased leading-none" style="width: 100vw; height: 100vh;   background-color: #0093E9; background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);">
<div id="header" class="w-full" style="height: 10vh"> 세계망대 파수꾼 작정현황 </div>
<div class="w-full wrapper relative" style="overflow: scroll; height: 80vh; display: flex; justify-content: center;">
    <div class="grid grid-cols-4 gap-5 absolute" style="width: 90%; margin : 0px auto">
        @foreach($bartizans as $bartizan)
        <div class="p-3 relative " style="height: 40vh;">
            <div class="absolute h-3 w-3 rounded-full bg-{{$bartizan->getColor()}}-500 text-gray-900 font-bold text-center"
                 style="height: 30px; width: 30px; padding: 5px; line-height: 20px; left:0px; top:0px;
                        @if($bartizan->dashboard_id < 10)
                            font-size: 15px;
                        @elseif($bartizan->dashboard_id > 10 AND $bartizan->dashboard_id < 100)
                            font-size: 14px;
                        @else
                            font-size: 12px;
                        @endif
                 ">
                {{$bartizan->dashboard_id}}
            </div>
            <div class="p-3 w-full rounded-lg mb-3 border-{{$bartizan->getColor()}}-500 border rounded shadow bg-gray-200 ">
                <div class="bg-white rounded-lg p-3">
                    <p class="text-sm pb-1 text-gray-800">
                        @switch($bartizan->nation->continent)
                            @case("Asia") 아시아 @break
                            @case("Oceania") 오세아니아 @break
                            @case("Africa") 아프리카 @break
                            @case("North America") 북아메리카 @break
                            @case("South America") 남아메리카 @break
                            @case("Europe") 유럽 @break
                        @endswitch
                        <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 inline text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                        {{$bartizan->nation->province}}
                    </span>
                    </p>
                    <div class="flex">
                        {{--                <img src="{{env("NCLOUD_FLAG_PATH")}}/{{strtolower($bartizan->nation->country_code)}}.png" class="inline-block"--}}
                        <img src="{{env("NCLOUD_FLAG_PATH")}}/{{strtolower($bartizan->nation->country_code)}}.svg" class="inline-block"
                             style="border:1px solid #ddd; object-fit: contain; height: 64px; width: auto; " alt="img.."/>

                        <div class="flex flex-col" style="height: 64px;">
                            <p class="text-2xl pb-1 font-bold ml-3 ">
                                {{$bartizan->nation->name}}
                            </p>
                            <span class="text-gray-800 text-lg ml-3">{{$bartizan->nation->name_en}}</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap mt-2">
                    <div class="flex flex-col w-1/2 p-1">
                        <div class="bg-white p-1 mb-1 rounded-lg">
                            <h1 class="text-xs font-bold mb-1">망대 대표 (장로)</h1>
                            @forelse($bartizan->pledges->representative as $represent)
                                <div class="w-full justify-between text-sm">
                                    <p class="text-gray-900 mb-1">{{$represent->name}} <span class="text-gray-800 text-xs"> {{$represent->district}}</span></p>
                                </div>
                            @empty
                                <div class="w-full justify-between text-sm">
                                    -
                                </div>
                            @endforelse
                        </div>

                        <div class="bg-white p-1 mb-1 rounded-lg">
                            <h1 class="text-xs font-bold mb-1">권사</h1>
                            @forelse($bartizan->pledges->watchmen as $watchman)
                                @if($watchman->position == "권사")
                                    <div class="w-full justify-between text-sm">
                                        <p class="text-gray-900 mb-1">{{$watchman->name}} <span class="text-gray-700 text-xs"> {{$watchman->district}}</span></p>
                                    </div>
                                @endif
                            @empty
                                <div class="w-full justify-between text-sm">
                                    -
                                </div>
                            @endforelse
                        </div>

                        <div class="bg-white p-1 mb-1 rounded-lg">
                            <h1 class="text-xs font-bold mb-1">안수집사</h1>
                            @forelse($bartizan->pledges->tychicus as $tychicus)
                                @if($tychicus->position == "안수집사")
                                    <div class="w-full justify-between text-sm">
                                        <p class="text-gray-900 mb-1">{{$tychicus->name}} <span class="text-gray-700 text-xs"> {{$tychicus->district}}</span></p>
                                    </div>
                                @endif
                            @empty
                                <div class="w-full justify-between text-sm">
                                    -
                                </div>
                            @endforelse
                        </div>
                    </div>


                    <div class="flex flex-col w-1/2 p-1">
                        <div class="bg-white p-1 mb-1 rounded-lg">
                            <h1 class="text-xs font-bold mb-1">렘넌트</h1>
                            @forelse($bartizan->pledges->watchmen as $watchman)
                                @if($watchman->position == "RT")
                                    <div class="w-full justify-between text-sm">
                                        <p class="text-gray-900 mb-1">{{$watchman->name}} <span class="text-gray-700 text-xs"> {{$watchman->district}}</span></p>
                                    </div>
                                @endif
                            @empty
                                <div class="w-full justify-between text-sm">
                                    -
                                </div>
                            @endforelse
                        </div>

                        <div class="bg-white p-1 mb-1 rounded-lg">
                            <h1 class="text-xs font-bold mb-1">성도</h1>
                            @forelse($bartizan->pledges->watchmen as $watchman)
                                @if($watchman->position == "성도")
                                    <div class="w-full justify-between text-sm">
                                        <p class="text-gray-900 mb-1">{{$watchman->name}} <span class="text-gray-700 text-xs"> {{$watchman->district}}</span></p>
                                    </div>
                                @endif
                            @empty
                                <div class="w-full justify-between text-sm">
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
</div>

<div id="FOOTER" style="height: 10vh">
    메시지 흐름 ...
</div>
</body>


<script>

</script>
</html>