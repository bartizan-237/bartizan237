@extends('layouts.app')

@section('content')

    <link href="{{ mix('css/main.css') }}" rel="stylesheet">

    <main class="sm:container sm:mx-auto relative" style="max-width: 500px;">
        <div class="bg-gray-200 h-screen">
            @if(\Auth::user())
            <button class="bg-green-500 text-white rounded-full text-2xl font-bold" style="position: fixed; line-height: 15px; font-size: 15px; width: 30px; height: 30px; right:30px; bottom:100px;" onclick="location.href='/ddeul/create'">+</button>
            @endif
            <div class="p-2 mx-auto">
                @foreach($ddeuls as $ddeul)
                    <div class="w-full flex-col mb-3 bg-white rounded-lg">
                        <div class="w-full px-3" onclick="location.href='/ddeul/{{$ddeul->id}}'">
                            <div class="border-b border-1 border-gray-100 p-2 relative">
                                <span class="rounded-lg text-gray-50 bg-{{$ddeul->color}}-500 text-xs p-1">{{$ddeul->category}}</span>
                                <p class="text-gray-900 text-lg font-bold inline-block ml-1">{{$ddeul->name}}</p>
                                <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-6 w-6 text-gray-900"
                                     style="position:absolute; right:6px; top:12px;"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                        <div class="text-gray-700 text-sm px-3 py-2">
                            <p class=" p-1">
                                최근 게시글 1
                            </p>
                            <p class=" p-1">
                                최근 게시글 2
                            </p>
                            <p class=" p-1">
                                최근 게시글 3
                            </p>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </main>
@endsection
