@extends('layouts.bartizan')

@section('content')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <main class="container p-2 bg-gray-200">
        <div class="flex flex-col">
{{--            {{$joinList}}--}}
            @foreach($joinList as $request)
            <div class="flex-col bg-white rounded-lg mb-3 px-3 py-2 text-gray-900 text-sm">
                <div id="joinList" class="w-full justify-between text-base">
                    <span>이름 : {{$request->user_name}}</span>
                    <button class="border border-gray-300 px-2 py-1 rounded" onclick="accept({{$bartizan->id}},{{$request->user_id}})">수락</button>
                    <button class="border border-gray-300 px-2 py-1 rounded" onclick="reject()">거부</button>
{{--                    <span class="border border-gray-300 px-2 py-1 rounded"><button @click="">수락</button></span>--}}
{{--                    <span class="border border-gray-300 px-2 py-1 rounded"><button>거부</button></span>--}}
                </div>
            </div>
            @endforeach
        </div>
    </main>


@endsection


{{--    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>--}}
{{--    <script src="{{ asset('js/bartizan/bartizan.js') }}" defer></script>--}}

{{--    <script src="{{ asset('js/bartizan/bartizan.js') }}" defer></script>--}}

    <script>
        function accept(bartizan_id, user_id){ // watchmen 테이블에 user_id와 bartizan_id 삽입
            alert('테스트 '+bartizan_id+ user_id);
        }
        function reject(){ // join_requests 테이블에서 user_id가 있는 부분 삭제
            alert('거부');
        }
    </script>