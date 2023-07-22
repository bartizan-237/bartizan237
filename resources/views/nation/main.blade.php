@extends('layouts.app')

@section('content')
    <main class="sm:mx-auto h-full relative" style="max-width: 500px;">
        <div class="bg-gray-200 p-2 min-h-full">
            <div class="h-full mb-16">
                <div class=" rounded-lg mx-auto p-2 mb-2">
                    <p style="font-size: 15px; line-height: 25px; text-align: center">
                        세계복음화의 언약이 성취되는 망대를 세우기 위해 <br/>
                        237나라를 12대교구, 38지역으로 나누었습니다. <br/>
                        하나님이 우리에게 약속하신 땅, 237나라 중에 <br/>
                        나에게 주신 한 나라는 어디인가요?
                    </p>
                </div>

                <p class="my-2 font-bold text-xl"> 🌍 5대륙 </p>
{{--                <div class="w-full grid gap-3 grid-cols-3 mb-2">--}}
{{--                    <div class="bg-white p-2 h-16 rounded border border-gray-300 text-center items-center align-items-center justify-center">--}}
{{--                        유럽--}}
{{--                        <span class="text-xs block my-1">EUROPE</span>--}}
{{--                    </div>--}}
{{--                    <div class="bg-white p-2 h-16 rounded border border-gray-300 text-center items-center align-items-center justify-center">--}}
{{--                        아시아--}}
{{--                        <span class="text-xs block my-1">ASIA</span>--}}
{{--                    </div>--}}
{{--                    <div class="bg-white p-2 rounded border border-gray-300 text-center items-center align-items-center justify-center row-span-2">--}}
{{--                        아메리카--}}
{{--                        <span class="text-xs block my-1">AMERICA</span>--}}
{{--                    </div>--}}
{{--                    <div class="bg-white p-2 h-16 rounded border border-gray-300 text-center items-center align-items-center justify-center">--}}
{{--                        아프리카--}}
{{--                        <span class="text-xs block my-1">AFRICA</span>--}}
{{--                    </div>--}}
{{--                    <div class="bg-white p-2 h-16 rounded border border-gray-300 text-center items-center align-items-center justify-center">--}}
{{--                        오세아니아--}}
{{--                        <span class="text-xs block my-1">OCEANIA</span>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="continent-container w-full mb-2">
                    <div onclick="location.href='/nation?continent=Europe'" class="continent-card border border-gray-300 flex flex-col bg-white h-16 rounded text-center items-center align-items-center justify-center">
                        <span class="continent-name">유럽</span>
                        <span class="continent-name-en">EUROPE</span>
                    </div>
                    <div onclick="location.href='/nation?continent=Asia'" class="continent-card border border-gray-300 flex flex-col bg-white h-16 rounded text-center items-center align-items-center justify-center">
                        <span class="continent-name">아시아</span>
                        <span class="continent-name-en">ASIA</span>
                    </div>
                    <div onclick="location.href='/nation?continent=America'" class="continent-card border border-gray-300 flex flex-col bg-white h-16 rounded text-center items-center align-items-center justify-center">
                        <span class="continent-name">아메리카</span>
                        <span class="continent-name-en">AMERICA</span>
                    </div>
                    <div onclick="location.href='/nation?continent=Africa'" class="continent-card border border-gray-300 flex flex-col bg-white h-16 rounded text-center items-center align-items-center justify-center">
                        <span class="continent-name">아프리카</span>
                        <span class="continent-name-en">AFRICA</span>
                    </div>
                        <div onclick="location.href='/nation?continent=Oceania'" class="continent-card border border-gray-300 flex flex-col bg-white h-16 rounded text-center items-center align-items-center justify-center">
                        <span class="continent-name">오세아니아</span>
                        <span class="continent-name-en">OCEANIA</span>
                    </div>
                </div>



                <p class="mt-5 mb-2 font-bold text-xl"> 🚩 12대교구</p>
                <div class="province-container w-full grid gap-1 grid-cols-3 mb-2">
                    <div onclick="location.href='/nation?province=EU회원국'" class="province-card h-16 flex flex-col bg-white p-2 rounded border border-gray-300 text-center items-center align-items-center justify-center">
                        <p class="text-sm font-bold" style="letter-spacing:2px"> <span class="text-xs block my-1">유럽</span>EU회원국 </p>
                    </div>
                    <div onclick="location.href='/nation?province=EU비회원국'" class="province-card h-16 flex flex-col bg-white p-2 rounded border border-gray-300 text-center items-center align-items-center justify-center">
                        <p class="text-sm font-bold" style="letter-spacing:2px"> <span class="text-xs block my-1">유럽</span>EU비회원국 </p>
                    </div>
                    <div onclick="location.href='/nation?province=러시아권'" class="province-card h-16 flex flex-col bg-white p-2 rounded border border-gray-300 text-center items-center align-items-center justify-center">
                        <p class="text-sm font-bold" style="letter-spacing:2px"> 러시아권 </p>
                    </div>
                    <div onclick="location.href='/nation?province=중화권'" class="province-card h-16 flex flex-col bg-white p-2 rounded border border-gray-300 text-center items-center align-items-center justify-center">
                        <p class="text-sm font-bold" style="letter-spacing:2px"> 중화권 </p>
                    </div>
                    <div onclick="location.href='/nation?province=힌두권'" class="province-card h-16 flex flex-col bg-white p-2 rounded border border-gray-300 text-center items-center align-items-center justify-center">
                        <p class="text-sm font-bold" style="letter-spacing:2px"> 힌두권 </p>
                    </div>
                    <div onclick="location.href='/nation?province=아시아권'" class="province-card h-16 flex flex-col bg-white p-2 rounded border border-gray-300 text-center items-center align-items-center justify-center">
                        <p class="text-sm font-bold" style="letter-spacing:2px"> 아시아권 </p>
                    </div>
                    <div onclick="location.href='/nation?province=아랍권'" class="province-card h-16 flex flex-col bg-white p-2 rounded border border-gray-300 text-center items-center align-items-center justify-center">
                        <p class="text-sm font-bold" style="letter-spacing:2px"> 아랍권 </p>
                    </div>
                    <div onclick="location.href='/nation?province=아프리카1(영어권)'" class="province-card h-16 flex flex-col bg-white p-2 rounded border border-gray-300 text-center items-center align-items-center justify-center">
                        <p class="text-sm font-bold" style="letter-spacing:2px"> <span class="text-xs block my-1">아프리카</span>영어권 </p>
                    </div>
                    <div onclick="location.href='/nation?province=아프리카2(포르투어권)'" class="province-card h-16 flex flex-col bg-white p-2 rounded border border-gray-300 text-center items-center align-items-center justify-center">
                        <p class="text-sm font-bold" style="letter-spacing:2px"> <span class="text-xs block my-1">아프리카</span>불어/포르투어권 </p>
                    </div>
                    <div onclick="location.href='/nation?province=오세아니아'" class="province-card h-16 flex flex-col bg-white p-2 rounded border border-gray-300 text-center items-center align-items-center justify-center">
                        <p class="text-sm font-bold" style="letter-spacing:2px"> 오세아니아 </p>
                    </div>
                    <div onclick="location.href='/nation?province=북아메리카'" class="province-card h-16 flex flex-col bg-white p-2 rounded border border-gray-300 text-center items-center align-items-center justify-center">
                        <p class="text-sm font-bold" style="letter-spacing:2px"> 북아메리카 </p>
                    </div>
                    <div onclick="location.href='/nation?province=중남아메리카'" class="province-card h-16 flex flex-col bg-white p-2 rounded border border-gray-300 text-center items-center align-items-center justify-center">
                        <p class="text-sm font-bold" style="letter-spacing:2px"> 중남아메리카 </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
