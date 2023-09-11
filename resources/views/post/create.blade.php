@extends('layouts.app')

@section('content')
    <link href="{{ mix('css/bartizan/create.css') }}" rel="stylesheet">

{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>--}}
{{--    <script type="text/javascript" src="/smarteditor2/js/HuskyEZCreator.js"></script>--}}

    <main class="container mx-auto" style="margin-top:10px; max-width: 500px;">
        <div class=" bg-gray-50" style="">
            <div id="form_app" class="bg-white shadow rounded-lg px-3 py-2" style="padding-bottom: 100px;">
                <div class="flex flex-col">
                    <div class="mb-6 p-1">
                        <h3 class="text-gray-900 mb-3 text-xl inline-block mr-1">게시글 쓰기</h3>
                        @if(isset($bartizan))
                            <input type="hidden" id="bartizan_id" value="{{$bartizan->id}}">
                            <p class="text-sm inline-block"> <span class="text-green-700">{{$bartizan->name}}</span> 망대에 글쓰기</p>
                        @else
                            <input type="hidden" id="bartizan_id" value="">
                        @endif

                        <!-- 플랫폼 게시판 이용정책 -->
                        <a tabindex="0" role="link" aria-label="tooltip 1" class="focus:outline-none focus:ring-gray-300 rounded-full focus:ring-offset-2 focus:ring-2 focus:bg-gray-200 relative mt-20 md:mt-0"
                           onmouseover="showTooltip('tooltip1')"
                           onfocus="showTooltip('tooltip1')"
                           onmouseout="hideTooltip('tooltip1')">
                            <div class=" cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info text-gray-800 inline-block"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                                <span class="cursor-pointer underline" style="font-size:12px;">플랫폼 게시판 이용정책</span>
                                <div id="tooltip1" style="width: 400px; border:1px solid lightblue" role="tooltip" class="z-20 mt-2 absolute transition duration-150 ease-in-out  shadow-lg bg-white p-3 rounded hidden">
                                    <p style="font-size: 11px">
                                        <span class="inline-block mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check inline-block"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                            세계망대플랫폼은 237나라에 망대를 세워, 복음 운동과 전도·선교 운동을 위하여 기도와 자료를 소통하는 플랫폼입니다.
                                        </span>
                                        <span class="inline-block mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check inline-block"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                            플랫폼의 목적과 다른 목적의 컨텐츠나 불건전한 컨텐츠를 게시하는 경우에는 작성자의 동의없이 게시글이 삭제될 수 있습니다.
                                        </span>
                                        <span class="inline-block"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check inline-block"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        게시글을 작성하실 때 위 내용에 동의하시는 것으로 간주되며, 세계망대플랫폼에 게시되는 모든 컨텐츠는 운영팀에 의해 관리되고 있습니다.
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="border focus-within:border-blue-500 text-gray-800 focus-within:text-gray-900 mb-6 transition-all duration-500 relative rounded p-1">
                        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                            <p>
                                <label for="title" class="bg-white text-gray-700 px-1 text-base">제목</label>
                            </p>
                        </div>
                        <p>
                            <input id="title" name="title" v-model="title"
                                   autocomplete="false" tabindex="0" type="text" class="py-1 px-1 text-gray-900 outline-none block h-full w-full">
                        </p>
                    </div>

                    <div class="border focus-within:border-blue-500 text-gray-800 focus-within:text-gray-900 mb-6 transition-all duration-500 relative rounded p-1">
                        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                            <p>
                                <label for="content" class="bg-white text-gray-700 px-1 text-base"></label>
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
{{--                                <textarea v-model="content" id="content" rows="20" class="py-1 px-1 outline-none block h-full w-full"></textarea>--}}
                        </p>
                    </div>
                </div>
                <div class="border-t mt-6 pt-3">
                    <button click="submitForm"
                            style="float: right; margin-right: 10px"
                            class="rounded text-gray-100 px-3 py-2 bg-green-500 hover:shadow-inner hover:bg-green-700 transition-all duration-300">
                        저장
                    </button>
                </div>
            </div>
        </div>
    </main>


    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="{{ asset('js/post/create.js') }}" defer></script>
@endsection
