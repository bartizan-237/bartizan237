@extends('layouts.bartizan')

@section('content')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <main class="container p-2 bg-gray-200">

        <div class="flex flex-col">

            @if($bartizan->getAdmin() OR $bartizan->getLatestPost())
            <div class="flex-col bg-white rounded-lg mb-3 px-3 py-2 text-gray-900 text-sm">

                @if($bartizan->getAdmin())
                <div class="w-full text-left flex">
                    <span class="text-gray-500 mr-2 text-xs">망대 관리자</span> {{ $bartizan->getAdmin()->nickname }}

{{--                    <span class="ml-auto">--}}
{{--                        <form method="POST" action="{{route()}}">--}}
{{--                            <button onclick="join({{$bartizan->id}})">테스트 버튼</button>--}}
{{--                        </form>--}}
{{--                    </span>--}}
                </div>
                @endif

                @if($bartizan->getLatestPost())
                <div class="w-full text-right">
                    <span class="text-gray-500 mx-2 text-xs">{{ $bartizan->getLatestPost()->created_at->diffForHumans()}}에 게시글이 업데이트 되었습니다. </span>
                </div>
                @endif
            </div>
            @else

            <div class="flex-col bg-white rounded-lg mb-3 px-3 py-2 text-gray-900 text-sm">
                아직 등록된 망대 정보가 없습니다😢
            </div>
            @endif

            @if($bartizan->description)
            <div class="bg-white rounded-lg mb-3 p-3 text-gray-900 ql-editor ql-snow">
                {!! $bartizan->description !!}
            </div>
            @endif

            <div class="bg-white rounded-lg mb-3 p-3 text-gray-900 text-xs">
                <div class="w-full">
                    <div class="border-b border-1 border-gray-100 pb-2 relative">
                        <p class="text-gray-900 text-sm font-bold inline-block ml-1">최근 게시글</p>
                        <div onclick="location.href='/bartizan/{{$bartizan->id}}/posts'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-5 w-5 text-gray-900"
                                 style="position:absolute; right:6px; top:0px;"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </div>
                @forelse($bartizan->getRecentPosts(3) as $post)
                    <div class=" p-1 w-full flex text-sm">
                        <div class="w-5/6 " onclick="location.href='/bartizan/{{$bartizan->id}}/posts/{{$post->id}}'">{{$post->title}}</div>
                        <div class="w-1/6 right-0 text-xs text-right">{{$post->created_at->diffForHumans()}}</div>
                        {{--                                    <div class="w-1/2 right-0 text-xs text-right">{{$post->getCreatedAtAttribute($post->created_at)}}</div>--}}
                    </div>
                @empty
                    <div class=" p-1">
                        아직 등록된 게시글이 없습니다😢
                    </div>
                @endforelse
            </div>
        </div>
    </main>

{{--    <script>--}}
{{--        if({{$join_request}}){--}}
{{--            alert('신청 성공');--}}
{{--            console.log('신청 성공');--}}
{{--        }--}}
{{--    </script>--}}
@endsection
