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
    <div class="w-1/3 carousel-item bg-red-100" style="height: 500px;">

    </div>
    <div class="w-1/3 carousel-item bg-yellow-100" style="height: 500px;">

    </div>
    <div class="w-1/3 carousel-item bg-green-100" style="height: 500px;">

    </div>
    <div class="w-1/3 carousel-item bg-blue-100" style="height: 500px;">

    </div>
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