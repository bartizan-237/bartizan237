@extends('layouts.app')

@section('content')

<link href="{{ mix('css/main.css') }}" rel="stylesheet">

<main class="h-full relative" style="max-width: 500px;">
    <div class="bg-gray-100 p-2 min-h-full" >
{{--    @include('post.home_post', [--}}
{{--        'posts' => $posts--}}
{{--    ])--}}
        <div class="bg-white w-full shadow rounded mx-auto p-3">
            <div class="flex justify-start items-center py-5 relative">
                <input class="text-sm leading-none text-left text-gray-700 px-4 py-3 w-full border rounded border-gray-900 rounded-full outline-none"
                       type="text" placeholder="관심있는 내용을 검색해보세요!"/>
                <svg class="absolute right-3 z-10 cursor-pointer" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 17C13.866 17 17 13.866 17 10C17 6.13401 13.866 3 10 3C6.13401 3 3 6.13401 3 10C3 13.866 6.13401 17 10 17Z" stroke="#4B5563" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M21 21L15 15" stroke="#4B5563" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
        </div>

        <div class="bg-white w-full shadow rounded mx-auto p-3 mt-3">
            <div class="mb-2">
                <p class="font-bold text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" /></svg>
                    인기 게시글
                </p>
            </div>
            @include('post.home_post', ['posts' => $hot_posts])
        </div>

        <div class="bg-white w-full shadow rounded mx-auto p-3 mt-3">
            <div class="mb-2">
                <p class="font-bold text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 inline-block mr-1 " viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    최근 게시글
                </p>
            </div>
            @include('post.home_post', ['posts' => $new_posts])
        </div>

                {{--        <link href="https://fonts.googleapis.com/css2?family=Bungee&amp;display=swap" rel="stylesheet">--}}

{{--        <!-- LANDING PAGE -->--}}
{{--        <div class="flex flex-col items-center justify-center w-full h-full bg-gray-100">--}}

{{--            <div>--}}
{{--                <p class="text-center text-xl text-green-600 mb-6" style="font-size: 30px; font-family: 'Bungee', cursive">--}}
{{--                    Bartizans 237--}}
{{--                </p>--}}
{{--            </div>--}}
{{--        </div>--}}

    </div>
</main>
@endsection
