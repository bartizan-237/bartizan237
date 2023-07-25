@extends('layouts.app')

@section('content')
    <main class="sm:mx-auto h-full relative" style="max-width: 500px;">
        <div class="bg-gray-200 min-h-full pb-8">
            <form action="/bartizan" method="GET" class="text-center">
                <div class="flex p-2 bg-white rounded my-2">
{{--                    <div class="rounded inline-block mr-1" style="margin-top: 3px;">--}}
{{--                        <select name="province" id="province" style="height: 32px; line-height: 20px; font-size: 15px; padding:5px">--}}
{{--                            <option value="" >전체</option>--}}
{{--                            <option value="아시아권" @if($province_keyword == "아시아권") selected @endif>아시아권</option>--}}
{{--                            <option value="중화권" @if($province_keyword == "중화권") selected @endif>중화권</option>--}}
{{--                            <option value="아랍권" @if($province_keyword == "아랍권") selected @endif>아랍권</option>--}}
{{--                            <option value="힌두권" @if($province_keyword == "힌두권") selected @endif>힌두권</option>--}}
{{--                            <option value="러시아권" @if($province_keyword == "러시아권") selected @endif>러시아권</option>--}}
{{--                            <option value="EU회원국" @if($province_keyword == "EU회원국") selected @endif>EU회원국</option>--}}
{{--                            <option value="EU비회원국" @if($province_keyword == "EU비회원국") selected @endif>EU비회원국</option>--}}
{{--                            <option value="아프리카1(영어권)" @if($province_keyword == "아프리카1(영어권)") selected @endif>아프리카1</option>--}}
{{--                            <option value="아프리카2(불어,포르투어권)" @if($province_keyword == "아프리카2(불어,포르투어권)") selected @endif>아프리카2</option>--}}
{{--                            <option value="오세아니아" @if($province_keyword == "오세아니아") selected @endif>오세아니아</option>--}}
{{--                            <option value="북아메리카" @if($province_keyword == "북아메리카") selected @endif>북아메리카</option>--}}
{{--                            <option value="중남아메리카" @if($province_keyword == "중남아메리카") selected @endif>중남아메리카</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
                    <div class="rounded inline-block" style="margin-top: 3px;">
                        <input type="text" name="search" id="search" placeholder="검색어를 입력하세요" value="{{$search_keyword ?? ''}}" style="height: 32px; line-height: 20px; font-size: 15px"/>
                    </div>
                    <div class="absolute" style="margin-top:2px; right:5px;">
                        <button type="submit" class="p-2 bg-green-500 text-white rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="inline-block feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                            검색
                        </button>
                    </div>
                </div>
            </form>
{{--            <div id="bartizan_list" class="p-2 mx-auto">--}}
            <div id="bartizan_list" class="p-2 mx-auto grid grid-cols-2 gap-3">
                <template v-for="bartizan in _data.bartizans">
{{--                    <div class="w-full flex-col mb-2 bg-white rounded-lg">--}}
{{--                        <div class="w-full px-1"--}}
{{--                             @click="moveToNationDetail(bartizan.id)"--}}
{{--                        >--}}
{{--                            <div class="flex border-b border-1 border-gray-100 p-2 relative">--}}
{{--                                <div class="bg-contain bg-no-repeat bg-center"--}}
{{--                                     :style="getBackgroundImage(bartizan.country_code)"--}}
{{--                                     style="width :40px;">--}}
{{--                                </div>--}}

{{--                                <div class="flex-col px-2">--}}
{{--                                    <p class="inline text-gray-900 font-bold" v-text="bartizan.name"></p>--}}
{{--                                    <span class="text-sm">망대</span>--}}
{{--                                </div>--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-6 w-6 text-gray-900" style="position:absolute; right:6px; top:18px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="relative bg-white p-3 rounded-3xl my-2 shadow-xl">
                        <div class="flex">
                            <div class="bg-contain bg-no-repeat bg-center rounded-full flex-none"
                                 :style="getRoundFlagImage(bartizan.country_code)"
                                 style="width :40px; height: 40px;">
                            </div>
                            <div class="pl-2">
                                <p class="text-xl font-bold inline" v-text="bartizan.name"></p>
                                <span class="">망대</span>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="flex space-x-2 text-gray-400 text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <p>대표장로</p>
                            </div>
                            <div class="flex space-x-2 text-gray-400 text-sm my-3">
                                <!-- svg  -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p>두기고</p>
                            </div>
                            <div class="border-t-2"></div>
                            <div class="flex justify-between">
                                <div class="my-2">
                                    <p class="font-semibold text-base mb-2">파수꾼</p>
                                    <div class="flex space-x-2">
                                        <img src="https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                             class="w-6 h-6 rounded-full"/>
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/e/ec/Woman_7.jpg"
                                             class="w-6 h-6 rounded-full"/>
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxSqK0tVELGWDYAiUY1oRrfnGJCKSKv95OGUtm9eKG9HQLn769YDujQi1QFat32xl-BiY&usqp=CAU"
                                             class="w-6 h-6 rounded-full"/>
                                    </div>
                                </div>
                                <div class="my-2">
                                    <p class="font-semibold text-base mb-2">정탐꾼</p>
                                    <div class="text-base text-gray-400 font-semibold">
                                        <p>-</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            <div id="scroll_point" class="py-3 w-full pb-8 mb-16"></div>
        </div>
    </main>

    <script>
        const IMAGE_PATH = "{{env("NCLOUD_FLAG_PATH")}}";
    </script>

    <script src="{{ asset('js/bartizan/index.js') }}" defer></script>
@endsection