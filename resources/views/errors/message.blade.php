@extends('layouts.app')

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Bungee&amp;display=swap" rel="stylesheet">

    <div class="flex flex-col items-center justify-center w-full h-full bg-gray-100">
        <div>
            <p class="text-center text-4xl text-green-600 mb-6" style="font-size: 100px; font-family: 'Bungee', cursive">ERROR</p>
            <p class="text-center text-xl text-gray-900">{{$message ?? "서버에 일시적인 오류가 발생했습니다🥲"}} </p>

        </div>
        <div class="mt-12">
            <a onclick="history.back()" class="text-center text-green-900">
                뒤로가기
            </a>
        </div>
    </div>
@endsection