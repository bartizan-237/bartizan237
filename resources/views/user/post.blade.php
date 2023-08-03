@extends('layouts.user')

@section('content')

    <main class="container p-3 bg-gray-200">
        <section class="bg-white rounded p-3 text-gray-900 relative">
            <p class="p-2 mb-3">내가 작성한 게시글</p>
            @foreach($posts as $post)
                <div class="w-full mb-3">
                    <div class="px-3 py-1 bg-gray-100 rounded cursor-pointer" onclick="location.href='/post/{{$post->id}}'">
                        <p style="font-size : 14px; line-height: 20px" class="text-gray-900 font-medium title-font p-1">
                            <span class="inline-block text-xs p-1 mx-1 rounded text-white font-bold bg-{{$post->bartizan->getThemeColor()}}">{{$post->bartizan->name}}</span>
                            {{$post->title}}
                        </p>
                        <div class="flex border-t border-gray-100 p-1 text-gray-700">
                            <div class="w-1/2 left-0">
                                <a style="font-size:12px;" class="inline-block mr-2">{{$post->getCreatedAt()}}</a>
                            </div>
                            <div class="w-1/2 right-0 text-right">
                                <a style="font-size:12px;" class="inline-block mr-2  ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    {{number_format($post->hit)}}
                                </a>
                                <a style="font-size:12px;" class="inline-block mr-2  ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                    </svg>
                                    {{number_format($post->like)}}
                                </a>
                                <a style="font-size:12px;" class="inline-block mr-2  ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                    </svg>
                                    {{number_format($post->getCommentsCount())}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="py-3 w-full pb-3 mb-6">
                {{ $posts->onEachSide(1)->withQueryString()->links('custom.paginator') }}
            </div>
        </section>
    </main>

@endsection
