@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div id="register" class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    회원가입
                </header>


                <form id="register_form" class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8"
                      method="POST" action="{{ route('register') }}"
                >
                    @csrf

{{--                    <div class="flex flex-wrap">--}}
{{--                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">--}}
{{--                            이름--}}
{{--                        </label>--}}

{{--                        <input id="name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror"--}}
{{--                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

{{--                        @error('name')--}}
{{--                        <p class="text-red-500 text-xs italic mt-4">--}}
{{--                            {{ $message }}--}}
{{--                        </p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

                        <div class="flex flex-wrap">
                            <label for="member_id" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                아이디
                            </label>

                            <input id="member_id" type="text" v-model="member_id" @blur="validateMemberId"
                                   class="form-input w-full @error('member_id') border-red-500 @enderror" name="member_id"
                                   value="{{ old('member_id') }}" required autocomplete="member_id">

                            @error('member_id')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

{{--                    <div class="flex flex-wrap">--}}
{{--                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">--}}
{{--                            이메일--}}
{{--                        </label>--}}

{{--                        <input id="email" type="email"--}}
{{--                            class="form-input w-full @error('email') border-red-500 @enderror" name="email"--}}
{{--                            value="{{ old('email') }}" required autocomplete="email">--}}
{{--                        <button class="font-bold text-sm underline text-green-500 p-2">인증번호받기</button>--}}

{{--                        @error('email')--}}
{{--                        <p class="text-red-500 text-xs italic mt-4">--}}
{{--                            {{ $message }}--}}
{{--                        </p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

                    <div class="flex flex-wrap">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            비밀번호
                        </label>

                        <input id="password" type="password" v-model="password" @blur="validatePassword"
                            class="form-input w-full @error('password') border-red-500 @enderror" name="password"
                            required autocomplete="new-password">

                        @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            비밀번호확인
                        </label>

                        <input id="password-confirm" type="password" class="form-input w-full" v-model="password_confirm" @blur="validatePasswordConfirm"
                            name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="flex flex-wrap">
                        <button
                                @click="submitForm"
                                class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-green-500 hover:bg-green-700 sm:py-4">
                            가입하기
                        </button>

                        <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                            이미 계정이 있으신가요?
                            <a class="text-green-500 hover:text-green-700 no-underline hover:underline" href="{{ route('login') }}">
                                로그인하기
                            </a>
                        </p>
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>

<script src="{{ asset('js/auth/auth.js') }}" defer></script>
@endsection
