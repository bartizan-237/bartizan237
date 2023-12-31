@extends('layouts.app')

@section('content')

<main class="sm:mx-auto h-full relative" style="max-width: 500px;">
    <div class="bg-gray-200 min-h-full pb-8">
        <form action="/bartizan" method="GET" class="text-center">
            <div class="flex p-2 bg-white rounded my-2">
                <div class="rounded inline-block mr-1" style="margin-top: 3px;">
                    <select name="province" id="province" style="height: 32px; line-height: 20px; font-size: 15px; padding:5px">
                        <option value="전체" >전체</option>
                        <option value="아시아권" @if($province_keyword == "아시아권") selected @endif>아시아권</option>
                        <option value="중화권" @if($province_keyword == "중화권") selected @endif>중화권</option>
                        <option value="아랍권" @if($province_keyword == "아랍권") selected @endif>아랍권</option>
                        <option value="힌두권" @if($province_keyword == "힌두권") selected @endif>힌두권</option>
                        <option value="러시아권" @if($province_keyword == "러시아권") selected @endif>러시아권</option>
                        <option value="EU회원국" @if($province_keyword == "EU회원국") selected @endif>EU회원국</option>
                        <option value="EU비회원국" @if($province_keyword == "EU비회원국") selected @endif>EU비회원국</option>
                        <option value="아프리카1(영어권)" @if($province_keyword == "아프리카1(영어권)") selected @endif>아프리카1</option>
                        <option value="아프리카2(불어,포르투어권)" @if($province_keyword == "아프리카2(불어,포르투어권)") selected @endif>아프리카2</option>
                        <option value="오세아니아" @if($province_keyword == "오세아니아") selected @endif>오세아니아</option>
                        <option value="북아메리카" @if($province_keyword == "북아메리카") selected @endif>북아메리카</option>
                        <option value="중남아메리카" @if($province_keyword == "중남아메리카") selected @endif>중남아메리카</option>
                    </select>
                </div>
                <div class="rounded inline-block" style="margin-top: 3px;">
                    <input type="text" name="search" id="search" placeholder="검색어를 입력하세요" value="{{$search_keyword ?? ''}}" style="height: 32px; line-height: 20px; font-size: 15px"/>
                </div>
                <div class="absolute" style="margin-top:2px; right:5px;">
                    <button type="submit" class="p-2 bg-green-500 text-white rounded"
                            style="color:white; font-size : 16px; background-color: #0093E9; background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="inline-block feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        검색
                    </button>
                </div>
            </div>
        </form>


        <script>
        // 23.8.26. 셀렉트박스 선택 시, 바로 해당 대교구 목록으로 이동
        const selectBox = document.getElementById("province");
        selectBox.addEventListener("change", function() {
            const selectedValue = selectBox.value;
            const selectedText = selectBox.options[selectBox.selectedIndex].text;
            console.log(`Selected Value: ${selectedValue}, Selected Text: ${selectedText}`);

            location.href = "/bartizan?province=" + selectedValue;
        });

        </script>

{{--            <div id="bartizan_list" class="p-2 mx-auto">--}}
        <div id="bartizan_list" class="relative p-2 mx-auto grid grid-cols-2 gap-3">
            <template v-for="bartizan in _data.bartizans" class="">
                <div  @click="moveToBartizanDetail(bartizan.id)"
                      class="relative bg-white p-3 rounded-3xl my-2 shadow-xl">
                    <div class="flex">
                        <div class="bg-contain bg-no-repeat bg-center rounded-full flex-none"
                             :style="getRoundFlagImage(bartizan.country_code)"
                             style="width :40px; height: 40px;">
                        </div>
                        <div class="flex flex-col">
                            <div class="pl-2">
                                <p class="font-bold inline" v-html="refineBartizanName(bartizan.name, bartizan.district)"></p>
                                <span class="text-xs">망대</span>
                            </div>
                            <div class="pl-2">
                                <span class="text-xs" v-text="bartizan.name_en"></span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="flex space-x-1 text-gray-700 text-xs">
                            <img width="16" height="16" style="margin-top:2px; margin-right: 2px" src="https://kr.object.ncloudstorage.com/immanuel/bartizan/image/icon/flag.png">
                            <p style="padding-top:2px">대표장로</p>
{{--                                <p class="pl-1 text-gray-900 text-sm" v-text="getRepresentativeName(bartizan)"></p>--}}
                            <div v-if="bartizan.watchman_obj.representative">
                                <template v-for="represent in bartizan.watchman_obj.representative">
                                    <img v-if="represent.profile_image != '' && represent.profile_image != null" src="https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                         class="w-6 h-6 rounded-full inline-block" style="margin-right:2px;"/>
                                    <p v-else :title="represent.name + ' ' + represent.position" v-text="represent.name.substr(0,1)"
                                       :class="getBgColor(represent.position)"
                                       class="circle text-xs text-white" style="margin-right:2px;"></p>
                                </template>
                            </div>
                            <div v-else>
                                -
                            </div>
                        </div>
                        <div class="flex space-x-1 text-gray-700 text-xs my-2">
                            <img width="16" height="16" style="margin-top:2px; margin-right: 2px" src="https://kr.object.ncloudstorage.com/immanuel/bartizan/image/icon/antenna.png">
                            <p style="padding-top:2px">두기고</p>
                            <p class="pl-1 text-gray-900 text-sm" v-text="getTychicusName(bartizan)"></p>
                        </div>
                        <div class="border-t-2"></div>
                        <div class="flex justify-between">
                            <div class="my-1">
                                <p class="mb-1">파수꾼</p>
                                <div class="flex space-x-1">
{{--                                        <img src="https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"--}}
{{--                                             class="w-6 h-6 rounded-full"/>--}}
                                    <div v-if="bartizan.watchman_obj.watchmen">
                                        <template v-for="watchman in bartizan.watchman_obj.watchmen">
                                            <img v-if="watchman.profile_image != '' && watchman.profile_image != null" src="https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                                 class="w-6 h-6 rounded-full inline-block" style="margin-right:2px;"/>
                                            <p v-else :title="watchman.name + ' ' + watchman.position" v-text="watchman.name.substr(0,1)"
                                               :class="getBgColor(watchman.position)"
                                               class="circle text-xs text-white" style="margin-right:2px;"></p>
                                        </template>
                                    </div>
                                    <div v-else>
                                        -
                                    </div>
                                </div>
                            </div>
{{--                                <div class="my-1">--}}
{{--                                    <p class="mb-1">정탐꾼</p>--}}
{{--                                    <div class="flex space-x-1">--}}
{{--                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxSqK0tVELGWDYAiUY1oRrfnGJCKSKv95OGUtm9eKG9HQLn769YDujQi1QFat32xl-BiY&usqp=CAU"--}}
{{--                                                 class="w-6 h-6 rounded-full"/>--}}

{{--                                        <div v-if="bartizan.watchman_obj.spy">--}}
{{--                                            <template v-for="spy in bartizan.watchman_obj.spy">--}}
{{--                                                <img v-if="spy.profile_image != ''" src="https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"--}}
{{--                                                     class="w-6 h-6 rounded-full"/>--}}
{{--                                                <p v-else :title="spy.name" v-text="spy.name.substr(0,1)"--}}
{{--                                                   :class="getBgColor(spy.position)"--}}
{{--                                                   class="circle text-xs text-white"></p>--}}
{{--                                            </template>--}}
{{--                                        </div>--}}
{{--                                        <div v-else>--}}
{{--                                            ---}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                        </div>
                    </div>
                </div>
            </template>
            <div id="scroll_point" class="py-3 w-full pb-8 mb-16"></div>
        </div>
    </div>
</main>

<script>
    const IMAGE_PATH = "{{env("NCLOUD_FLAG_PATH")}}";
</script>

<script src="{{ asset('js/bartizan/index.js') }}?v=1.1" defer></script>
@endsection
