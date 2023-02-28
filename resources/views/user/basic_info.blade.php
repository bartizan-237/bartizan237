@extends('layouts.app')

@section('content')

{{--    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>--}}
{{--    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>--}}


    <style>
        .required:after {
            content:" *";
            color: red;
        }
    </style>

    <section class="text-gray-600 body-font relative">
        <div id="form_app" class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">내 정보</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base"> 상세 정보를 입력해주세요 </p>
            </div>
            <div class="lg:w-1/4 md:w-1/3 mx-auto">
                <div class="flex flex-col -m-2">
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600 required">이름</label>
                            <input v-model="name" type="text" id="name" name="name"
                                   class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            >
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="nickname" class="leading-7 text-sm text-gray-600 required">닉네임</label>
                            <input v-model="nickname" v-on:blur="validateNickname" type="text" id="nickname" name="nickname"
                                   class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="nickname" class="leading-7 text-sm text-gray-600">생년월일</label>
                            <input v-model="birth" type="date" id="birth" name="birth"
                                   min="1901-01-01" max="2021-12-31"
                                   class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-full text-center">
                        <button
                                @click="submitForm"
                                class="w-full mx-auto items-center text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="inline-block feather feather-save mr-2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                            저장
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/user/basic_info.js') }}" defer></script>

@endsection
