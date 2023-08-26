@extends('layouts.app')

@section('content')

    <main class="sm:mx-auto h-full relative" style="max-width: 500px;">
        {{--        <div class="bg-gray-50 p-2 min-h-full" style="font-family: 'Nanum Myeongjo', serif;">--}}
        <div class="bg-gray-100 p-2 min-h-full" >
            <div class="h-full mb-16">
{{--                <div class=" rounded-lg mx-auto p-3 my-2 mb-3 bg-white">--}}
{{--                    <p style="font-weight:bold; font-size: 15px; line-height: 25px; text-align: center;">--}}
{{--                        나의 237나라, 빈 곳 작정--}}
{{--                    </p>--}}
{{--                </div>--}}

                <div class=" rounded-lg mx-auto p-3 my-2 mb-3 bg-white">
                    <p style="font-size: 13px; line-height: 20px; text-align: center;">
                        세계복음화의 언약이 성취되는 망대를 세우기 위해 <br/>
                        237나라를 12대교구, 38지역으로 나누었습니다. <br/>
                        하나님이 우리에게 약속하신 땅, 237나라 가운데에 <br/>
                        나에게 주신 한 나라는 어디인가요?
                    </p>
                </div>

{{--                @if(str_contains($_SERVER['REQUEST_URI'], "test") !== false)--}}
                <div class="main-search-container">
                    <input id="main_search_input" type="text" class="main-search-input" placeholder="237나라를 검색해보세요!">
                    <button id="main_search_btn" class="main-search-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </button>
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
{{--                @endif--}}

{{--                <div class=" rounded-lg mx-auto p-3 my-2 mb-3 bg-white text-center justify-center">--}}
{{--                    <a target="_blank" href="https://youtu.be/ij12Z5nLu2c" style="font-weight:bold; font-size: 15px; color: #0b5ed7; line-height: 20px; cursor:pointer;">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="inline-block mr-1 text-red-600"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>--}}
{{--                        <span>나의 237찾기(237망대) 강의영상 보러가기</span>--}}
{{--                    </a>--}}
{{--                </div>--}}

                <p class="my-2 font-bold text-xl"> 🌍 5대륙 </p>
                <div class="w-full mb-2" style="overflow :scroll">
                    <div class="continent-container flex" style="width: 850px">
                        <div onclick="location.href='/bartizan?continent=Europe'" style="" class=" continent-card text-center items-center align-items-center justify-center bg-white rounded-lg">
                            <div style="width: 150px; height:100px; background-image : url('/image/europe.jpg'); background-size: cover; border-radius: 5px">
                            </div>
                            <div class="flex flex-col p-3 text-left">
                                <p class="continent-name font-bold">유럽<span style="font-size: 10px; letter-spacing: 0px">(52나라)</span></p>
                                <span class="continent-name-en">EUROPE</span>
{{--                                <span class="continent-country-count">빈 곳 51 나라</span>--}}
                            </div>
                        </div>
                        <div onclick="location.href='/bartizan?continent=Asia'" style="" class=" continent-card text-center items-center align-items-center justify-center bg-white rounded-lg">
                            <div style="width: 150px; height:100px; background-image : url('/image/asia.jpg'); background-size: cover; border-radius: 5px">
                            </div>
                            <div class="flex flex-col p-3 text-left">
                                <span class="continent-name font-bold">아시아<span style="font-size: 10px; letter-spacing: 0px">(47나라)</span></span>
                                <span class="continent-name-en">ASIA</span>
{{--                                <span class="continent-country-count">빈 곳 46 나라</span>--}}
                            </div>
                        </div>
                        <div onclick="location.href='/bartizan?continent=America'" style="" class=" continent-card text-center items-center align-items-center justify-center bg-white rounded-lg">
                            <div style="width: 150px; height:100px; background-image : url('/image/america.jpg'); background-size: cover; border-radius: 5px">
                            </div>
                            <div class="flex flex-col p-3 text-left">
                                <span class="continent-name font-bold">아메리카<span style="font-size: 10px; letter-spacing: 0px">(54나라)</span></span>
                                <span class="continent-name-en">AMERICA</span>
{{--                                <span class="continent-country-count">빈 곳 54 나라</span>--}}
                            </div>
                        </div>
                        <div onclick="location.href='/bartizan?continent=Africa'" style="" class=" continent-card text-center items-center align-items-center justify-center bg-white rounded-lg">
                            <div style="width: 150px; height:100px; background-image : url('/image/africa.jpg'); background-size: cover; border-radius: 5px">
                            </div>
                            <div class="flex flex-col p-3 text-left">
                                <span class="continent-name font-bold">아프리카<span style="font-size: 10px; letter-spacing: 0px">(59나라)</span></span>
                                <span class="continent-name-en">AFRICA</span>
{{--                                <span class="continent-country-count">빈 곳 59 나라</span>--}}
                            </div>
                        </div>
                        <div onclick="location.href='/bartizan?continent=Oceania'" style="" class=" continent-card text-center items-center align-items-center justify-center bg-white rounded-lg">
                            <div style="width: 150px; height:100px; background-image : url('/image/oceania.jpg'); background-size: cover; border-radius: 5px">
                            </div>
                            <div class="flex flex-col p-3 text-left">
                                <span class="continent-name font-bold">오세아니아<span style="font-size: 10px; letter-spacing: 0px">(25나라)</span></span>
                                <span class="continent-name-en">OCEANIA</span>
                                <span class="continent-country-count">빈 곳 25 나라</span>
                            </div>
                        </div>
                    </div>
                </div>

                <p class="mt-5 mb-2 font-bold text-xl"> 🚩 12대교구</p>
                <div class="province-container w-full grid gap-1 grid-cols-3 mb-2">
                    <div onclick="location.href='/bartizan?province=EU회원국'" class="province-card h-16 flex flex-col bg-white p-2 rounded border border-gray-300 text-center items-center align-items-center justify-center">
                        <p class="text-sm font-bold" style="letter-spacing:2px"> <span class="text-xs block my-1">유럽</span>EU회원국 </p>
                    </div>
                    <div onclick="location.href='/bartizan?province=EU비회원국'" class="province-card h-16 flex flex-col bg-white p-2 rounded border border-gray-300 text-center items-center align-items-center justify-center">
                        <p class="text-sm font-bold" style="letter-spacing:2px"> <span class="text-xs block my-1">유럽</span>EU비회원국 </p>
                    </div>
                    <div onclick="location.href='/bartizan?province=러시아권'" class="province-card h-16 flex flex-col bg-white p-2 rounded border border-gray-300 text-center items-center align-items-center justify-center">
                        <p class="text-sm font-bold" style="letter-spacing:2px"> 러시아권 </p>
                    </div>
                    <div onclick="location.href='/bartizan?province=중화권'" class="province-card h-16 flex flex-col bg-white p-2 rounded border border-gray-300 text-center items-center align-items-center justify-center">
                        <p class="text-sm font-bold" style="letter-spacing:2px"> 중화권 </p>
                    </div>
                    <div onclick="location.href='/bartizan?province=힌두권'" class="province-card h-16 flex flex-col bg-white p-2 rounded border border-gray-300 text-center items-center align-items-center justify-center">
                        <p class="text-sm font-bold" style="letter-spacing:2px"> 힌두권 </p>
                    </div>
                    <div onclick="location.href='/bartizan?province=아시아권'" class="province-card h-16 flex flex-col bg-white p-2 rounded border border-gray-300 text-center items-center align-items-center justify-center">
                        <p class="text-sm font-bold" style="letter-spacing:2px"> 아시아권 </p>
                    </div>
                    <div onclick="location.href='/bartizan?province=아랍권'" class="province-card h-16 flex flex-col bg-white p-2 rounded border border-gray-300 text-center items-center align-items-center justify-center">
                        <p class="text-sm font-bold" style="letter-spacing:2px"> 아랍권 </p>
                    </div>
                    <div onclick="location.href='/bartizan?province=아프리카1(영어권)'" class="province-card h-16 flex flex-col bg-white p-2 rounded border border-gray-300 text-center items-center align-items-center justify-center">
                        <p class="text-sm font-bold"> <span class="text-xs block my-1" style="letter-spacing:2px">아프리카</span>영어권 </p>
                    </div>
                    <div onclick="location.href='/bartizan?province=아프리카2(포르투어권)'" class="province-card h-16 flex flex-col bg-white p-2 rounded border border-gray-300 text-center items-center align-items-center justify-center">
                        <p class="text-sm font-bold"> <span class="text-xs block my-1" style="letter-spacing:2px">아프리카</span>불어/포르투어권 </p>
                    </div>
                    <div onclick="location.href='/bartizan?province=오세아니아'" class="province-card h-16 flex flex-col bg-white p-2 rounded border border-gray-300 text-center items-center align-items-center justify-center">
                        <p class="text-sm font-bold" style="letter-spacing:2px"> 오세아니아 </p>
                    </div>
                    <div onclick="location.href='/bartizan?province=북아메리카'" class="province-card h-16 flex flex-col bg-white p-2 rounded border border-gray-300 text-center items-center align-items-center justify-center">
                        <p class="text-sm font-bold" style="letter-spacing:2px"> 북아메리카 </p>
                    </div>
                    <div onclick="location.href='/bartizan?province=중남아메리카'" class="province-card h-16 flex flex-col bg-white p-2 rounded border border-gray-300 text-center items-center align-items-center justify-center">
                        <p class="text-sm font-bold" style="letter-spacing:2px"> 중남아메리카 </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
