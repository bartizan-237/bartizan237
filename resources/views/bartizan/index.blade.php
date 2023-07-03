@extends('layouts.app')

@section('content')
    <main class="sm:mx-auto h-full relative" style="max-width: 500px;">
        <div class="h-full bg-gray-200">
            @if(\Auth::user())
            <button class="bg-green-500 text-white rounded-full text-2xl font-bold" style="position: fixed; line-height: 15px; font-size: 15px; width: 30px; height: 30px; right:30px; bottom:100px;" onclick="location.href='/bartizan/create'">+</button>
            @endif
            <div class="p-2 mx-auto">
                @foreach($bartizans as $bartizan)
                    <div class="w-full flex-col mb-2 bg-white rounded-lg">
                        <div class="w-full px-3" onclick="location.href='/bartizan/{{$bartizan->id}}'">
                            <div class="border-b border-1 border-gray-100 p-2 relative">
                                @switch($bartizan->color)
                                    @case("gray") <span class="rounded-lg text-gray-600 bg-gray-200 text-xs p-1">{{$bartizan->category}}</span> @break
                                    @case("pink") <span class="rounded-lg text-pink-600 bg-pink-200 text-xs p-1">{{$bartizan->category}}</span> @break
                                    @case("red") <span class="rounded-lg text-red-600 bg-red-200 text-xs p-1">{{$bartizan->category}}</span> @break
                                    @case("orange") <span class="rounded-lg text-orange-600 bg-orange-200 text-xs p-1">{{$bartizan->category}}</span> @break
                                    @case("yellow") <span class="rounded-lg text-yellow-600 bg-yellow-200 text-xs p-1">{{$bartizan->category}}</span> @break
                                    @case("teal") <span class="rounded-lg text-teal-600 bg-teal-200 text-xs p-1">{{$bartizan->category}}</span> @break
                                    @case("green") <span class="rounded-lg text-green-600 bg-green-200 text-xs p-1">{{$bartizan->category}}</span> @break
                                    @case("sky") <span class="rounded-lg text-sky-600 bg-sky-200 text-xs p-1">{{$bartizan->category}}</span> @break
                                    @case("blue") <span class="rounded-lg text-blue-600 bg-blue-200 text-xs p-1">{{$bartizan->category}}</span> @break
                                    @case("purple") <span class="rounded-lg text-purple-600 bg-purple-200 text-xs p-1">{{$bartizan->category}}</span> @break
                                @endswitch
                                <p class="text-gray-900 text-base font-bold inline-block ml-1">{{$bartizan->name}}<span class="text-sm"></span></p>
                                <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-6 w-6 text-gray-900"
                                     style="position:absolute; right:6px; top:12px;"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                        <div class="text-gray-700 text-sm px-3 py-2">
                            @forelse($bartizan->getRecentPosts(3) as $post)
                                <div onclick="location.href='/bartizan/{{$bartizan->id}}/posts/{{$post->id}}'" class=" p-1 w-full flex text-sm">
                                    <div class="w-1/2 ">{{$post->title}}</div>
                                    <div class="w-1/2 right-0 text-xs text-right">{{$post->created_at->diffForHumans()}}</div>
{{--                                    <div class="w-1/2 right-0 text-xs text-right">{{$post->getCreatedAtAttribute($post->created_at)}}</div>--}}
                                </div>
                            @empty
                                <div class="text-xs p-1">
                                    아직 등록된 포스트가 없습니다😢
                                </div>
                            @endforelse
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </main>
@endsection
