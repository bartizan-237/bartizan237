@extends('layouts.ddeul')

@section('content')

    <main class="container py-2">
        <button class="bg-green-500 text-white rounded-full text-2xl font-bold" style="position: fixed; line-height: 15px; font-size: 15px; width: 30px; height: 30px; right:30px; bottom:100px;" onclick="location.href='/post/create?ddeul_id={{$ddeul->id}}'">+</button>
        <div class="flex flex-col">
            @forelse($posts as $post)
                <div class="w-full mb-3" onclick="location.href='/ddeul/{{$ddeul->id}}/posts/{{$post->id}}'">
                    <div class="p-3 bg-gray-50">
                        <!-- TITLE -->
                        <p style="font-size : 14px; line-height: 20px" class="text-gray-900 font-medium title-font px-3 py-2">{{$post->title}}</p>
                        <div style="font-size : 11px; line-height: 15px; height: 34px; width: 100%; overflow:hidden; text-overflow:ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;"
                           class="text-gray-700 px-3 py-1">
                            {{strip_tags($post->content)}}
                        </div>
                        <div class="flex border-t border-gray-100 px-3 py-2 text-gray-700">
                            <div class="w-1/2 left-0">
                                <p style="font-size:12px;" class="inline-block mr-2  ">{{$post->getCreatedAt()}}</p>
                            </div>
                            <div class="w-1/2 right-0 text-right">
                                <a style="font-size:12px;" class="inline-block mr-2  ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    {{$post->hit}}
                                </a>
                                <a style="font-size:12px;" class="inline-block mr-2  ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                    </svg>
                                    {{$post->like}}
                                </a>
                                <a style="font-size:12px;" class="inline-block mr-2  ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                    </svg>
                                    0
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                등록된 포스트가 없습니다😢
            @endforelse
        </div>
    </main>
@endsection
