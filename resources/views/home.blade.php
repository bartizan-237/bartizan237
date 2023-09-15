@extends('layouts.app')

@section('content')

<link href="{{ mix('css/main.css') }}" rel="stylesheet">
<!-- SWIPER -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<!-- SWIPER -->

<style>
    .ytp-chrome-top {
        display: none;
    }
    .ytp-watermark {
        display: none;
    }
</style>

<main class="h-full relative" style="max-width: 500px;">
    <div class="bg-gray-100 p-2 min-h-full pb-16" >
{{--    @include('post.home_post', [--}}
{{--        'posts' => $posts--}}
{{--    ])--}}


        <div class="main-search-container">
            <form method="GET" action="/bartizan">
                <input id="main_search_input" name="search" type="text" class="main-search-input" placeholder="237나라를 검색해보세요!">
                <input type="hidden" name="province" value="전체">
                <button type="submit" id="main_search_btn" class="main-search-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </button>
            </form>
        </div>
        <script>
            const searchButton = document.getElementById("main_search_btn");
            // <select> 요소의 선택이 변경될 때 실행되는 함수
            searchButton.addEventListener("click", function() {
                // 선택된 옵션의 값과 텍스트를 가져옴
                const searchInput = document.getElementById("main_search_input");
                const searchValue = searchInput.value;
                location.href = "https://platform.237.co.kr/bartizan?province=전체&search=" + searchValue;
            });
        </script>


        <!-- Slider main container -->
        <div class="bg-white w-full shadow rounded mx-auto py-3 my-3">
            <div class="mb-2 px-3">
                <p class="font-bold text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600 inline-block mr-1 " viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>
                    홍보 영상
                </p>
            </div>
            <div class="swiper" style="width: 100%; height: 300px">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    @foreach($youtubes as $youtube)
                        <div class="swiper-slide">
                            @include("components.youtube", [
                                "short_code" => $youtube->short_code,
                                "width" => "100%"
                            ])
                        </div>
                    @endforeach
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <div class=" rounded-full swiper-button-prev items-center justify-center " style="width: 35px; height: 35px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                </div>
                <div class=" rounded-full swiper-button-next items-center justify-center " style="width: 35px; height: 35px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </div>

                <!-- If we need navigation buttons -->
{{--                <div class="swiper-button-prev"></div>--}}
{{--                <div class="swiper-button-next"></div>--}}

                <!-- If we need scrollbar -->
    {{--            <div class="swiper-scrollbar"></div>--}}
            </div>
        </div>

{{--        <div class="w-full mb-2" style="overflow :scroll">--}}
{{--            <div class="mb-2">--}}
{{--                <p class="font-bold text-gray-900">--}}
{{--                    홍보 영상--}}
{{--                </p>--}}
{{--            </div>--}}
{{--            <div class="continent-container flex" style="width: 850px">--}}
{{--                @foreach($youtubes as $youtube)--}}
{{--                <div class="continent-card bg-white rounded-lg p-3" style="width: 90%; height: 180px">--}}
{{--                    @include("components.youtube", [--}}
{{--                        "short_code" => $youtube->short_code,--}}
{{--                        "width" => "100%"--}}
{{--                    ])--}}
{{--                </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="bg-white w-full shadow rounded mx-auto p-3 mt-3">--}}
{{--            <div class="mb-2">--}}
{{--                <p class="font-bold text-gray-900">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" /></svg>--}}
{{--                    인기 게시글--}}
{{--                </p>--}}
{{--            </div>--}}
{{--            @include('post.home_post', ['posts' => $hot_posts])--}}
{{--        </div>--}}

        <div class="bg-white w-full shadow rounded mx-auto p-3 my-3">
            <div class="mb-2">
                <p class="font-bold text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 inline-block mr-1 " viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    최근 게시글
                </p>
            </div>
            @include('post.home_post', ['posts' => $new_posts])
        </div>

                {{--        <link href="https://fonts.googleapis.com/css2?family=Bungee&amp;display=swap" rel="stylesheet">--}}

{{--        <!-- LANDING PAGE -->--}}
{{--        <div class="flex flex-col items-center justify-center w-full h-full bg-gray-100">--}}

{{--            <div>--}}
{{--                <p class="text-center text-xl text-green-600 mb-6" style="font-size: 30px; font-family: 'Bungee', cursive">--}}
{{--                    Bartizans 237--}}
{{--                </p>--}}
{{--            </div>--}}
{{--        </div>--}}

    </div>
</main>

    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            // direction: 'vertical',
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            // scrollbar: {
            //     el: '.swiper-scrollbar',
            // },
        });
    </script>
@endsection
