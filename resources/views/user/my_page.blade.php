@extends('layouts.user')

@section('content')

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
                                <input type="text" id="nickname" name="nickname" value="{{$user->nickname}}" readonly
                                       class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-900">이름</label>
                                <input type="text" id="name" name="name"  value="{{$user->name}}" readonly
                                       class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                >
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="birth" class="leading-7 text-sm text-gray-900">생년월일</label>
                                <input type="date" id="birth" name="birth" value="{{$user->birth}}"
                                       min="1901-01-01" max="2021-12-31" readonly
                                       class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="officer" class="leading-7 text-sm text-gray-900">직분</label>
                                <p>
                                    <select id="officer" name="officer" readonly
                                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                            style=" text-align-last: left; text-align: left; padding-right: 35px;">
                                        <option style="direction: rtl; padding-right:30px" value="목사" @if($user->officer == "목사") selected @endif>목사</option>
                                        <option style="direction: rtl; padding-right:30px" value="전도사" @if($user->officer == "전도사") selected @endif>전도사</option>
                                        <option style="direction: rtl; padding-right:30px" value="장로" @if($user->officer == "장로") selected @endif>장로</option>
                                        <option style="direction: rtl; padding-right:30px" value="명예장로" @if($user->officer == "명예장로") selected @endif>명예장로</option>
                                        <option style="direction: rtl; padding-right:30px" value="권사" @if($user->officer == "권사") selected @endif>권사</option>
                                        <option style="direction: rtl; padding-right:30px" value="안수집사" @if($user->officer == "안수집사") selected @endif>안수집사</option>
                                        <option style="direction: rtl; padding-right:30px" value="집사" @if($user->officer == "집사") selected @endif>집사</option>
                                        <option style="direction: rtl; padding-right:30px" value="성도" @if($user->officer == "성도") selected @endif>성도</option>
                                        <option style="direction: rtl; padding-right:30px" value="청년" @if($user->officer == "청년") selected @endif>청년</option>
                                        <option style="direction: rtl; padding-right:30px" value="렘넌트" @if($user->officer == "렘넌트") selected @endif>렘넌트</option>
                                    </select>
                                </p>

                                <label for="birth" class="leading-7 text-sm text-gray-700">
                                    임직 대상
                                    <input type="checkbox" id="appointment" name="appointment" readonly
                                           @if($user->appointment) checked @endif
                                           class="bg-gray-100 bg-opacity-50 rounded border border-green-700 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-green-700 ml-1 p-2 transition-colors duration-200 ease-in-out">
                                </label>
                            </div>
                        </div>

                        <div class="p-2 mt-6 w-full">
                            <button
                                    onclick="location.href='/user/my_page/edit'"
                                    class="mx-auto w-full text-center items-center text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="inline-block mr-2 feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                수정하기
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@auth
    <section class="w-full mt-12">
        <div class="p-2 mx-auto text-center items-center ">
            <a class="text-gray-700 font-bold py-2 px-8 hover:text-green-900 rounded text-lg hover:underline hover:underline-offset-4"
                href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                로그아웃
            </a>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </section>
@else
    <section class="w-full mt-12">
        <div class="p-2 mx-auto text-center items-center ">
            <a class="text-gray-700 font-bold py-2 px-8 hover:text-green-900 rounded text-lg hover:underline hover:underline-offset-4"
                href="{{ route('login') }}">
            로그인
            </a>
        </div>
        <div class="p-2 mx-auto text-center items-center mt-6">
            <a class="mx-auto w-full text-center items-center text-green-500 font-bold py-2 px-8 hover:text-green-700 rounded text-lg"
               href="{{ route('register') }}">
                회원가입
            </a>
        </div>
    </section>
@endauth

    </main>

{{--    <script src="{{ asset('js/user/basic_info.js') }}" defer></script>--}}
<script src="{{ asset('js/user/user.js') }}" defer></script>

@endsection
