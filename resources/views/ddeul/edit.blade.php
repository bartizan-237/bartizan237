@extends('layouts.app')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    {{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>--}}
    {{--    <script type="text/javascript" src="/smarteditor2/js/HuskyEZCreator.js"></script>--}}

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="{{ mix('css/ddeul/create.css') }}" rel="stylesheet">

    <main class="container mx-auto" style="margin-top:10px; max-width: 500px;">
        <div class=" bg-gray-50" style="">
            <div id="form_app" class="bg-white shadow rounded-lg px-6 py-2">
                <div class="flex flex-col">
                    <div class="mb-6 p-1">
                        <h3 class="text-gray-900 mb-3 text-xl">뜰 정보 수정</h3>
                        <p class="text-gray-800 mb-3">-가이드1</p>
                        <p class="text-gray-800 mb-3">-가이드2</p>
                        <p class="text-gray-800 mb-3">-가이드3</p>
                    </div>

                    <div class="border focus-within:border-blue-500 text-gray-800 focus-within:text-gray-900 mb-6 transition-all duration-500 relative rounded p-1">
                        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                            <p>
                                <label for="name" class="bg-white text-gray-700 px-1 text-base">이름</label>
                            </p>
                        </div>
                        <p>
                            <input id="name" name="name" v-model="name" @blur="validateName"
                                   autocomplete="false" tabindex="0" type="text" class="py-1 px-1 text-gray-900 outline-none block h-full w-full">
                        </p>
                    </div>
                    <div class="w-1/2 border focus-within:border-blue-500 text-gray-800 focus-within:text-gray-900 mb-6 transition-all duration-500 relative rounded p-1">
                        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                            <p>
                                <label for="category" class="bg-white text-gray-700 px-1 text-base">분류</label>
                            </p>
                        </div>
                        <p>
                            <select id="category" name="category" v-model="category"
                                    class="py-1 px-1 outline-none block h-full w-full text-right"
                                    style=" text-align-last: right; "
                            >
                                <option style="direction: rtl; padding-right:10px" value="포럼" selected>포럼</option>
                                <option style="direction: rtl; padding-right:10px" value="취미">취미</option>
                                <option style="direction: rtl; padding-right:10px" value="활동">활동</option>
                                <option style="direction: rtl; padding-right:10px" value="산업 인턴십">산업 인턴십</option>
                                <option style="direction: rtl; padding-right:10px" value="지역 인턴십">지역 인턴십</option>
                            </select>
                        </p>
                    </div>
                    <div class="w-full border focus-within:border-blue-500 text-gray-800 focus-within:text-gray-900 mb-6 transition-all duration-500 relative rounded p-1">
                        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                            <p>
                                <label for="theme_color" class="bg-white text-gray-700 px-1 text-base">테마색</label>
                            </p>
                        </div>
                        <div class="p-3">
                            <input v-model="theme_color" name="theme_color" type="radio" value="gray" class="radio m-2 inline-block rounded-full w-4 h-4 inline-block bg-gray-500 checked:bg-gray-500 shadow-gray-500 ">
                            <input v-model="theme_color" name="theme_color" type="radio" value="red_light" class="radio m-2 inline-block rounded-full w-4 h-4 inline-block bg-red-300 checked:bg-red-300 shadow-red-300 ">
                            <input v-model="theme_color" name="theme_color" type="radio" value="red" class="radio m-2 inline-block rounded-full w-4 h-4 inline-block bg-red-500 checked:bg-red-500 shadow-red-500 ">
                            <input v-model="theme_color" name="theme_color" type="radio" value="red_dark" class="radio m-2 inline-block rounded-full w-4 h-4 inline-block bg-red-700 checked:bg-red-700 shadow-red-700 ">
                            <input v-model="theme_color" name="theme_color" type="radio" value="orange" class="radio m-2 inline-block rounded-full w-4 h-4 inline-block bg-orange-500 checked:bg-orange-500 shadow-orange-500 ">
                            <input v-model="theme_color" name="theme_color" type="radio" value="yellow_light" class="radio m-2 inline-block rounded-full w-4 h-4 inline-block bg-yellow-300 checked:bg-yellow-300 shadow-yellow-300 ">
                            <input v-model="theme_color" name="theme_color" type="radio" value="yellow" class="radio m-2 inline-block rounded-full w-4 h-4 inline-block bg-yellow-500 checked:bg-yellow-500 shadow-yellow-500 ">
                            <input v-model="theme_color" name="theme_color" type="radio" value="green_light" class="radio m-2 inline-block rounded-full w-4 h-4 inline-block bg-green-300 checked:bg-green-300 shadow-green-300 ">
                            <input v-model="theme_color" name="theme_color" type="radio" value="green" class="radio m-2 inline-block rounded-full w-4 h-4 inline-block bg-green-500 checked:bg-green-500 shadow-green-500 ">
                            <input v-model="theme_color" name="theme_color" type="radio" value="green_dark" class="radio m-2 inline-block rounded-full w-4 h-4 inline-block bg-teal-700 checked:bg-teal-700 shadow-teal-700 ">
                            <input v-model="theme_color" name="theme_color" type="radio" value="blue_light" class="radio m-2 inline-block rounded-full w-4 h-4 inline-block bg-blue-300 checked:bg-blue-300 shadow-blue-300 ">
                            <input v-model="theme_color" name="theme_color" type="radio" value="blue" class="radio m-2 inline-block rounded-full w-4 h-4 inline-block bg-blue-500 checked:bg-blue-500 shadow-blue-500 ">
                            <input v-model="theme_color" name="theme_color" type="radio" value="blue_dark" class="radio m-2 inline-block rounded-full w-4 h-4 inline-block bg-blue-700 checked:bg-blue-700 shadow-blue-700 ">
                            <input v-model="theme_color" name="theme_color" type="radio" value="purple" class="radio m-2 inline-block rounded-full w-4 h-4 inline-block bg-purple-500 checked:bg-purple-500 shadow-purple-500 ">
                            <input v-model="theme_color" name="theme_color" type="radio" value="pink" class="radio m-2 inline-block rounded-full w-4 h-4 inline-block bg-pink-500 checked:bg-pink-500 shadow-pink-500 ">
                        </div>
                    </div>
                    <div class="border focus-within:border-blue-500 text-gray-800 focus-within:text-gray-900 mb-6 transition-all duration-500 relative rounded p-1">
                        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                            <p>
                                <label for="description" class="bg-white text-gray-700 px-1 text-base">소개</label>
                            </p>
                        </div>
                        <p>
                        <div id="toolbar">
                            <div class="ql-toolbar ql-snow">
                                <select class="ql-header">
                                    <option value="1">제목1</option>
                                    <option value="2">제목2</option>
                                    <option value="3">제목3</option>
                                    <option selected="selected">본문</option>
                                </select>
                                <span class="ql-formats">
                                        <button type="button" class="ql-bold"><svg viewBox="0 0 18 18"> <path class="ql-stroke" d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z"></path> <path class="ql-stroke" d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z"></path> </svg></button>
                                        <button type="button" class="ql-italic"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="13" y1="4" y2="4"></line> <line class="ql-stroke" x1="5" x2="11" y1="14" y2="14"></line> <line class="ql-stroke" x1="8" x2="10" y1="14" y2="4"></line> </svg></button>
                                        <button type="button" class="ql-underline"><svg viewBox="0 0 18 18"> <path class="ql-stroke" d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3"></path> <rect class="ql-fill" height="1" rx="0.5" ry="0.5" width="12" x="3" y="15"></rect> </svg></button>
                                    </span>

                                <select class="ql-color"></select>

                                <select class="ql-background"></select>

                                <select class="ql-align"></select>

                                <span class="ql-formats">
                                        <button type="button" class="ql-list" value="ordered"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="15" y1="4" y2="4"></line> <line class="ql-stroke" x1="7" x2="15" y1="9" y2="9"></line> <line class="ql-stroke" x1="7" x2="15" y1="14" y2="14"></line> <line class="ql-stroke ql-thin" x1="2.5" x2="4.5" y1="5.5" y2="5.5"></line> <path class="ql-fill" d="M3.5,6A0.5,0.5,0,0,1,3,5.5V3.085l-0.276.138A0.5,0.5,0,0,1,2.053,3c-0.124-.247-0.023-0.324.224-0.447l1-.5A0.5,0.5,0,0,1,4,2.5v3A0.5,0.5,0,0,1,3.5,6Z"></path> <path class="ql-stroke ql-thin" d="M4.5,10.5h-2c0-.234,1.85-1.076,1.85-2.234A0.959,0.959,0,0,0,2.5,8.156"></path> <path class="ql-stroke ql-thin" d="M2.5,14.846a0.959,0.959,0,0,0,1.85-.109A0.7,0.7,0,0,0,3.75,14a0.688,0.688,0,0,0,.6-0.736,0.959,0.959,0,0,0-1.85-.109"></path> </svg></button>
                                        <button type="button" class="ql-list" value="bullet"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="6" x2="15" y1="4" y2="4"></line> <line class="ql-stroke" x1="6" x2="15" y1="9" y2="9"></line> <line class="ql-stroke" x1="6" x2="15" y1="14" y2="14"></line> <line class="ql-stroke" x1="3" x2="3" y1="4" y2="4"></line> <line class="ql-stroke" x1="3" x2="3" y1="9" y2="9"></line> <line class="ql-stroke" x1="3" x2="3" y1="14" y2="14"></line> </svg></button>
                                    </span>
                                <span class="ql-formats">
                                        <button type="button" class="ql-image"><svg viewBox="0 0 18 18"> <rect class="ql-stroke" height="10" width="12" x="3" y="4"></rect> <circle class="ql-fill" cx="6" cy="7" r="1"></circle> <polyline class="ql-even ql-fill" points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12"></polyline> </svg></button>
                                        <button type="button" class="ql-link"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="11" y1="7" y2="11"></line> <path class="ql-even ql-stroke" d="M8.9,4.577a3.476,3.476,0,0,1,.36,4.679A3.476,3.476,0,0,1,4.577,8.9C3.185,7.5,2.035,6.4,4.217,4.217S7.5,3.185,8.9,4.577Z"></path> <path class="ql-even ql-stroke" d="M13.423,9.1a3.476,3.476,0,0,0-4.679-.36,3.476,3.476,0,0,0,.36,4.679c1.392,1.392,2.5,2.542,4.679.36S14.815,10.5,13.423,9.1Z"></path></svg></button>
                                    </span>
                            </div>
                        </div>

                        <div id="editor" rows="20" class="py-1 px-1 outline-none block h-full w-full" style="min-height: 400px"></div>
                        {{--                                <textarea v-model="description" id="description" rows="20" class="py-1 px-1 outline-none block h-full w-full"></textarea>--}}
                        </p>
                    </div>
                </div>
                <div class="border-t mt-6 pt-3">
                    <button @click="submitForm" class="rounded text-gray-100 px-3 py-1 bg-green-500 hover:shadow-inner hover:bg-green-700 transition-all duration-300">
                        저장
                    </button>
                </div>
            </div>
        </div>
    </main>


    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="{{ asset('js/ddeul/ddeul.js') }}" defer></script>
@endsection
