@extends('layouts.nation')

@section('content')
    <!-- 개요 -->
    <main class="container p-2 bg-gray-200">
        <div class="flex flex-col">
            <div class="flex-col bg-white rounded-lg mb-3 px-3 py-2 text-gray-900 text-sm">

            </div>

            <div class="bg-white rounded-lg mb-3 p-3 text-gray-900 ql-editor ql-snow text-xs">
                {!! $nation->description !!}
            </div>

            <div class="bg-white rounded-lg mb-3 p-3 text-gray-900 text-xs">
                <div class="w-full">
                    <div class="border-b border-1 border-gray-100 pb-2 relative">
                        <p class="text-gray-900 text-sm font-bold inline-block ml-1">최근 포스트</p>
                        <div onclick="location.href='/$nation/{{$nation->id}}/posts'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-5 w-5 text-gray-900"
                                 style="position:absolute; right:6px; top:0px;"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
