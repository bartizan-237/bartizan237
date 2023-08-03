@extends('layouts.user')

@section('content')

    <style>
        .required:after {
            content:" *";
            color: red;
        }
    </style>

    <main class="container p-3 bg-gray-200">
        <section class="bg-white rounded p-3 text-gray-900 body-font relative">
            <div id="my_page_form" class="container px-5 py-6 mx-auto mb-6">
                <div class="flex flex-col text-center w-full mb-6">
                    {{--                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">마이페이지</h1>--}}
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base"></p>
                </div>
                <div class="mx-auto">
                    <div class="flex flex-col -m-2">
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="nickname" class="leading-7 text-sm text-gray-900 required">닉네임</label>
                                <input type="hidden" id="preset_nickname" value="{{$user->nickname}}">
                                <input v-model="nickname" v-on:blur="validateNickname" type="text" id="nickname" name="nickname"
                                       class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-900">이름</label>
                                <input type="hidden" id="preset_name" value="{{$user->name}}">
                                <input v-model="name" type="text" id="name" name="name"
                                       class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                >
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="birth" class="leading-7 text-sm text-gray-900">생년월일</label>
                                <input type="hidden" id="preset_birth" value="{{$user->birth}}">
                                <input v-model="birth" type="date" id="birth" name="birth"
                                       min="1901-01-01" max="2021-12-31"
                                       class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="officer" class="leading-7 text-sm text-gray-900">직분</label>
                                <input type="hidden" id="preset_officer" value="{{$user->officer}}">
                                <p>
                                    <select id="officer" name="officer" v-model="officer"
                                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                            style=" text-align-last: left; text-align: left; padding-right: 35px;">
                                        <option style="direction: rtl; padding-right:30px" value="목사">목사</option>
                                        <option style="direction: rtl; padding-right:30px" value="전도사">전도사</option>
                                        <option style="direction: rtl; padding-right:30px" value="장로">장로</option>
                                        <option style="direction: rtl; padding-right:30px" value="명예장로">명예장로</option>
                                        <option style="direction: rtl; padding-right:30px" value="권사">권사</option>
                                        <option style="direction: rtl; padding-right:30px" value="안수집사">안수집사</option>
                                        <option style="direction: rtl; padding-right:30px" value="집사">집사</option>
                                        <option style="direction: rtl; padding-right:30px" value="성도">성도</option>
                                        <option style="direction: rtl; padding-right:30px" value="청년">청년</option>
                                        <option style="direction: rtl; padding-right:30px" value="렘넌트">렘넌트</option>
                                    </select>
                                </p>

                                <label for="birth" class="leading-7 text-sm text-gray-700">
                                    임직 대상
                                    <input type="hidden" id="preset_appointment" value="{{$user->appointment}}">
                                    <input v-model="appointment" type="checkbox" id="appointment" name="appointment"
                                           class="bg-gray-100 bg-opacity-50 rounded border border-green-700 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-green-700 ml-1 p-2 transition-colors duration-200 ease-in-out">
                                </label>
                                <p class="text-red-500 text-xs">2023년 임직대상인 분들은 체크해주세요!</p>
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <button
                                    @click="submitForm"
                                    class="mx-auto w-full text-center items-center text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="inline-block feather feather-save mr-2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                                저장
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    {{--    <script src="{{ asset('js/user/basic_info.js') }}" defer></script>--}}
    <script src="{{ asset('js/user/user.js') }}" defer></script>

@endsection
