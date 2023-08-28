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
                        <div onclick="location.href='/bartizan?continent=Europe'" style=""
                             class="continent-card text-center items-center align-items-center justify-center bg-white rounded-lg">
                            <div class="continent-bg-image" style="background-image : url('/image/europe.jpg'); "></div>
                            <div class="continent-name-en" style="">
                                EUROPE
                            </div>
                            <div class="flex flex-col p-3 text-left">
                                <p class="continent-name font-bold">유럽</p>
                                <span style="font-size: 12px;">52 나라</span>
                            </div>
                        </div>
                        <div onclick="location.href='/bartizan?continent=Asia'" style="" class=" continent-card text-center items-center align-items-center justify-center bg-white rounded-lg">
                            <div class="continent-bg-image" style="background-image : url('/image/asia.jpg');"></div>
                            <div class="continent-name-en" style="">
                                ASIA
                            </div>
                            <div class="flex flex-col p-3 text-left">
                                <span class="continent-name font-bold">아시아</span>
                                <span style="font-size: 12px;">47 나라</span>
                            </div>
                        </div>
                        <div onclick="location.href='/bartizan?continent=America'" style="" class=" continent-card text-center items-center align-items-center justify-center bg-white rounded-lg">
                            <div class="continent-bg-image" style="background-image : url('/image/america.jpg');"></div>
                            <div class="continent-name-en" style="">
                                AMERICA
                            </div>
                            <div class="flex flex-col p-3 text-left">
                                <span class="continent-name font-bold">아메리카</span>
                                <span style="font-size: 12px;">54 나라</span>
                            </div>
                        </div>
                        <div onclick="location.href='/bartizan?continent=Africa'" style="" class=" continent-card text-center items-center align-items-center justify-center bg-white rounded-lg">
                            <div class="continent-bg-image" style="width: 150px; height:100px; background-image : url('/image/africa.jpg'); background-size: cover; border-radius: 5px"></div>
                            <div class="continent-name-en" style="">
                                AFRICA
                            </div>
                            <div class="flex flex-col p-3 text-left">
                                <span class="continent-name font-bold">아프리카</span>
                                <span style="font-size: 12px;">59 나라</span>
                            </div>
                        </div>
                        <div onclick="location.href='/bartizan?continent=Oceania'" style="" class=" continent-card text-center items-center align-items-center justify-center bg-white rounded-lg">
                            <div class="continent-bg-image" style="width: 150px; height:100px; background-image : url('/image/oceania.jpg'); background-size: cover; border-radius: 5px"></div>
                            <div class="continent-name-en" style="">
                                OCEANIA
                            </div>
                            <div class="flex flex-col p-3 text-left">
                                <span class="continent-name font-bold">오세아니아</span>
                                <span style="font-size: 12px;">25 나라</span>
                            </div>
                        </div>
                    </div>
                </div>

                <p class="mt-5 mb-2 font-bold text-xl"> 🚩 12대교구</p>
                <div class="province-container w-full grid gap-1 grid-cols-1" style="margin-bottom: 150px ">
                    <div class="bg-white rounded-lg mb-0.5 px-3 py-2 text-gray-900 border border-gray-200">
                        <div class="w-full">
                            <div class="border-b border-1 border-gray-200 pb-2 relative">
                                <p class="text-gray-900 font-bold inline-block ml-1"> 유럽 EU회원국 <span class="text-gray-700 text-xs font-medium ml-2"> 22개 나라</span> </p>
                                <div onclick="location.href='/bartizan?province=EU회원국'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-5 w-5 text-gray-900" style="position:absolute; right:6px; top:0px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="p-1 w-full flex text-sm text-gray-700">
                            유럽 대륙의 국가 중 EU(유럽연합)에 속해있는 국가
                        </div>
                    </div>


                    <div class="bg-white rounded-lg mb-0.5 px-3 py-2 text-gray-900 border border-gray-200">
                        <div class="w-full">
                            <div class="border-b border-1 border-gray-200 pb-2 relative">
                                <p class="text-gray-900 font-bold inline-block ml-1"> 유럽 EU비회원국 <span class="text-gray-700 text-xs font-medium ml-2"> 25개 나라</span> </p>
                                <div onclick="location.href='/bartizan?province=EU비회원국'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-5 w-5 text-gray-900" style="position:absolute; right:6px; top:0px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class=" p-1 w-full flex text-sm text-gray-700">
                            유럽 대륙의 국가 중 EU에 속해있지 않은 국가
                        </div>
                    </div>


                    <div class="bg-white rounded-lg mb-0.5 px-3 py-2 text-gray-900 border border-gray-200">
                        <div class="w-full">
                            <div class="border-b border-1 border-gray-200 pb-2 relative">
                                <p class="text-gray-900 font-bold inline-block ml-1"> 러시아권 <span class="text-gray-700 text-xs font-medium ml-2"> 9개 나라</span></p>
                                <div onclick="location.href='/bartizan?province=러시아권'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-5 w-5 text-gray-900" style="position:absolute; right:6px; top:0px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class=" p-1 w-full flex text-sm text-gray-700">
                            동유럽과 북아시아 지역에서 러시아어가 주로 사용되는 지역
                        </div>
                    </div>


                    <div class="bg-white rounded-lg mb-0.5 px-3 py-2 text-gray-900 border border-gray-200">
                        <div class="w-full">
                            <div class="border-b border-1 border-gray-200 pb-2 relative">
                                <p class="text-gray-900 font-bold inline-block ml-1"> 중화권 <span class="text-gray-700 text-xs font-medium ml-2"> 6개 나라</span> </p>
                                <div onclick="location.href='/bartizan?province=중화권'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-5 w-5 text-gray-900" style="position:absolute; right:6px; top:0px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class=" p-1 w-full flex text-sm text-gray-700">
                            동아시아 지역에서 주로 중국과 주변 국가들로 이루어진 문화적·역사적 지역
                        </div>
                    </div>


                    <div class="bg-white rounded-lg mb-0.5 px-3 py-2 text-gray-900 border border-gray-200">
                        <div class="w-full">
                            <div class="border-b border-1 border-gray-200 pb-2 relative">
                                <p class="text-gray-900 font-bold inline-block ml-1"> 힌두권 <span class="text-gray-700 text-xs font-medium ml-2"> 4개 나라</span> </p>
                                <div onclick="location.href='/bartizan?province=힌두권'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-5 w-5 text-gray-900" style="position:absolute; right:6px; top:0px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class=" p-1 w-full flex text-sm text-gray-700">
                            힌두교가 국가 종교의 주류를 이루거나 큰 부분을 차지하는 국가
                        </div>
                    </div>


                    <div class="bg-white rounded-lg mb-0.5 px-3 py-2 text-gray-900 border border-gray-200">
                        <div class="w-full">
                            <div class="border-b border-1 border-gray-200 pb-2 relative">
                                <p class="text-gray-900 font-bold inline-block ml-1"> 아시아권 <span class="text-gray-700 text-xs font-medium ml-2"> 12개 나라</span> </p>
                                <div onclick="location.href='/bartizan?province=아시아권'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-5 w-5 text-gray-900" style="position:absolute; right:6px; top:0px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class=" p-1 w-full flex text-sm text-gray-700">
                            대한민국, 일본 등 동아시아와 동남아시아, 그리고 이스라엘을 포함한 지역
                        </div>
                    </div>


                    <div class="bg-white rounded-lg mb-0.5 px-3 py-2 text-gray-900 border border-gray-200">
                        <div class="w-full">
                            <div class="border-b border-1 border-gray-200 pb-2 relative">
                                <p class="text-gray-900 font-bold inline-block ml-1"> 아랍권 <span class="text-gray-700 text-xs font-medium ml-2"> 32개 나라</span> </p>
                                <div onclick="location.href='/bartizan?province=아랍권'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-5 w-5 text-gray-900" style="position:absolute; right:6px; top:0px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class=" p-1 w-full flex text-sm text-gray-700">
                            아랍 언어와 이슬람 종교를 공유하는 중동 및 북아프리카 지역
                        </div>
                    </div>

                    <div class="bg-white rounded-lg mb-0.5 px-3 py-2 text-gray-900 border border-gray-200">
                        <div class="w-full">
                            <div class="border-b border-1 border-gray-200 pb-2 relative">
                                <p class="text-gray-900 font-bold inline-block ml-1"> 아프리카 영어권 <span class="text-gray-700 text-xs font-medium ml-2"> 25개 나라</span></p>
                                <div onclick="location.href='/bartizan?province=아프리카1(영어권)'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-5 w-5 text-gray-900" style="position:absolute; right:6px; top:0px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class=" p-1 w-full flex text-sm text-gray-700">
                            아프리카 국가 중 영어를 주언어로 사용하는 남부 아프리카 및 일부 동부 지역
                        </div>
                    </div>

                    <div class="bg-white rounded-lg mb-0.5 px-3 py-2 text-gray-900 border border-gray-200">
                        <div class="w-full">
                            <div class="border-b border-1 border-gray-200 pb-2 relative">
                                <p class="text-gray-900 font-bold inline-block ml-1"> 아프리카 불어/포르투어권 <span class="text-gray-700 text-xs font-medium ml-2"> 23개 나라</span></p>
                                <div onclick="location.href='/bartizan?province=아프리카2(포르투어권)'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-5 w-5 text-gray-900" style="position:absolute; right:6px; top:0px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class=" p-1 w-full flex text-sm text-gray-700">
                            아프리카 국가 중 불어/포르투갈어를 주언어로 사용하는 서부 및 북부 아프리카 지역
                        </div>
                    </div>


                    <div class="bg-white rounded-lg mb-0.5 px-3 py-2 text-gray-900 border border-gray-200">
                        <div class="w-full">
                            <div class="border-b border-1 border-gray-200 pb-2 relative">
                                <p class="text-gray-900 font-bold inline-block ml-1"> 오세아니아 <span class="text-gray-700 text-xs font-medium ml-2"> 25개 나라</span> </p>
                                <div onclick="location.href='/bartizan?province=오세아니아'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-5 w-5 text-gray-900" style="position:absolute; right:6px; top:0px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class=" p-1 w-full flex text-sm text-gray-700">
                            호주, 뉴질랜드, 파푸아뉴기니, 바누아투 등 태평양의 섬나라 국가들을 포함한 지역
                        </div>
                    </div>


                    <div class="bg-white rounded-lg mb-0.5 px-3 py-2 text-gray-900 border border-gray-200">
                        <div class="w-full">
                            <div class="border-b border-1 border-gray-200 pb-2 relative">
                                <p class="text-gray-900 font-bold inline-block ml-1"> 북아메리카 <span class="text-gray-700 text-xs font-medium ml-2"> 7개 나라</span></p>
                                <div onclick="location.href='/bartizan?province=북아메리카'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-5 w-5 text-gray-900" style="position:absolute; right:6px; top:0px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class=" p-1 w-full flex text-sm text-gray-700">
                            미국, 캐나다, 멕시코와 북미의 섬나라를 포함한 지역
                        </div>
                    </div>

                    <div class="bg-white rounded-lg mb-0.5 px-3 py-2 text-gray-900 border border-gray-200">
                        <div class="w-full">
                            <div class="border-b border-1 border-gray-200 pb-2 relative">
                                <p class="text-gray-900 font-bold inline-block ml-1"> 중남아메리카 <span class="text-gray-700 text-xs font-medium ml-2"> 47개 나라</span></p>
                                <div onclick="location.href='/bartizan?province=중남아메리카'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-5 w-5 text-gray-900" style="position:absolute; right:6px; top:0px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class=" p-1 w-full flex text-sm text-gray-700">
                            스페인어와 포르투칼어를 주로 사용하며, 라틴아메리카와 남아메리카를 포함한 지역
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

@endsection
