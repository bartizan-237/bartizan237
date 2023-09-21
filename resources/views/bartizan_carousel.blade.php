<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include("layouts.html_head")

    <!-- Naver Webmaster -->
    <meta name="naver-site-verification" content="9f187befa336e371c6d7a39df8bf86123f9e2a93" />

    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</head>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FB3Y7K9XB3"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-FB3Y7K9XB3');
</script>



<body class="bg-237 antialiased leading-none" style="width: 100vw; height: 100vh">

<div class="carousel rounded-box flex flex-wrap" style="height: 500px;">
    @foreach($bartizans as $bartizan)
    <div class="w-1/3 carousel-item p-3" style="height: 500px;">
        <div class="p-3 w-full rounded-lg mb-3" style="background : rgba(237, 237, 237, 0.1)">
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
                     style="object-fit: contain; height: 50px; width: auto; padding-bottom: 5px" alt="img.."/>

                <div class="flex flex-col">
                    <p class="text-2xl pb-1 font-bold ml-3 ">
                        {{$bartizan->nation->name}}
                    </p>
                    <span class="text-gray-800 text-lg ml-2">{{$bartizan->nation->name_en}}</span>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
</body>


<script>
    $('.carousel').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
    });
</script>
</html>