@extends('layouts.app')

@section('content')

    <link href="{{ mix('css/main.css') }}" rel="stylesheet">

    <main class="sm:container sm:mx-auto" style="max-width: 500px">
        <div class="flex flex-col bg-gray-200 h-screen">

            <div class="flex flex-col items-center justify-center w-full h-full bg-gray-100">

                <div>
                    <p class="text-center text-xl text-green-600 mb-6" style="font-size: 20px;">
                        환영합니다!
                    </p>
                    <p class="text-center text-green-600 mb-6" style="font-size: 30px;">
                        @if(\Auth::user())
                            <span class="text-3xl font-bold text-green-700">{{\Auth::user()->member_id}}</span> 님
                        @endif
                    </p>
                    <p class="text-center text-xl text-green-600 mb-6" style="font-size: 20px;">
                        회원가입이 완료되었습니다.
                    </p>
                </div>
            </div>

        </div>
    </main>
@endsection
