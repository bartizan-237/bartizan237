@extends('layouts.app')

@section('content')
    <main class="sm:mx-auto h-full relative" style="max-width: 500px;">
        <div class="bg-gray-200 p-3 min-h-full">
            <div class="p-2 h-full">
                <div class="bg-white rounded-lg mx-auto p-2 mb-2">
                    <p>
                        [가이드텍스트] 세계 살릴 망대를 세우기 위해 <br/>
                        237나라를 12대교구, 38지역으로 나누었습니다. <br/>
                        하나님이 나에게 약속하신 땅, 237나라 중 한 나라는 어디인가요?
                    </p>
                </div>

                <p> 🌍 5대륙 </p>
{{--                <div class="w-full grid gap-3 grid-cols-3 mb-2">--}}
{{--                    <div class="bg-white p-2 h-16 rounded-lg text-center items-center align-items-center justify-center">--}}
{{--                        유럽--}}
{{--                        <span class="text-xs block my-1">EUROPE</span>--}}
{{--                    </div>--}}
{{--                    <div class="bg-white p-2 h-16 rounded-lg text-center items-center align-items-center justify-center">--}}
{{--                        아시아--}}
{{--                        <span class="text-xs block my-1">ASIA</span>--}}
{{--                    </div>--}}
{{--                    <div class="bg-white p-2 rounded-lg text-center items-center align-items-center justify-center row-span-2">--}}
{{--                        아메리카--}}
{{--                        <span class="text-xs block my-1">AMERICA</span>--}}
{{--                    </div>--}}
{{--                    <div class="bg-white p-2 h-16 rounded-lg text-center items-center align-items-center justify-center">--}}
{{--                        아프리카--}}
{{--                        <span class="text-xs block my-1">AFRICA</span>--}}
{{--                    </div>--}}
{{--                    <div class="bg-white p-2 h-16 rounded-lg text-center items-center align-items-center justify-center">--}}
{{--                        오세아니아--}}
{{--                        <span class="text-xs block my-1">OCEANIA</span>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="continent-container w-full mb-2">
                    <div class="continent-card border border-gray-300 p-2 bg-white h-32 rounded text-center items-center align-items-center justify-center">
                        <span class="continent-name">유럽</span>
                        <span class="continent-name-en">EUROPE</span>
                    </div>
                    <div class="continent-card border border-gray-300 p-2 bg-white h-32 rounded text-center items-center align-items-center justify-center">
                        <span class="continent-name">아시아</span>
                        <span class="continent-name-en">ASIA</span>
                    </div>
                    <div class="continent-card border border-gray-300 p-2 bg-white h-32 rounded text-center items-center align-items-center justify-center">
                        <span class="continent-name">아메리카</span>
                        <span class="continent-name-en">AMERICA</span>
                    </div>
                    <div class="continent-card border border-gray-300 p-2 bg-white h-32 rounded text-center items-center align-items-center justify-center">
                        <span class="continent-name">아프리카</span>
                        <span class="continent-name-en">AFRICA</span>
                    </div>
                    <div class="continent-card border border-gray-300 p-2 bg-white h-32 rounded text-center items-center align-items-center justify-center">
                        <span class="continent-name">오세아니아</span>
                        <span class="continent-name-en">OCEANIA</span>
                    </div>
                </div>



                <p> 🚩 12대교구</p>
                <div class="w-full grid gap-3 grid-cols-4 mb-2">
                    <div class="bg-white p-2 rounded-lg text-center items-center align-items-center justify-center">
                        <span class="text-xs block my-1">유럽</span>
                        EU회원국
                    </div>
                    <div class="bg-white p-2 rounded-lg text-center items-center align-items-center justify-center">
                        <span class="text-xs block my-1">유럽</span>
                        EU비회원국
                    </div>
                    <div class="bg-white p-2 rounded-lg text-center items-center align-items-center justify-center">러시아권</div>
                    <div class="bg-white p-2 rounded-lg text-center items-center align-items-center justify-center">중화권</div>
                    <div class="bg-white p-2 rounded-lg text-center items-center align-items-center justify-center">힌두권</div>
                    <div class="bg-white p-2 rounded-lg text-center items-center align-items-center justify-center">아시아권</div>
                    <div class="bg-white p-2 rounded-lg text-center items-center align-items-center justify-center">아랍권</div>
                    <div class="bg-white p-2 rounded-lg text-center items-center align-items-center justify-center">
                        <span class="text-xs block my-1">아프리카</span>
                        영어권
                    </div>
                    <div class="bg-white p-2 rounded-lg text-center items-center align-items-center justify-center">
                        <span class="text-xs block my-1">아프리카</span>
                        불어/포르투어권
                    </div>
                    <div class="bg-white p-2 rounded-lg text-center items-center align-items-center justify-center">오세아니아</div>
                    <div class="bg-white p-2 rounded-lg text-center items-center align-items-center justify-center">북아메리카</div>
                    <div class="bg-white p-2 rounded-lg text-center items-center align-items-center justify-center">중남아메리카</div>
                </div>
            </div>
        </div>
    </main>

@endsection
