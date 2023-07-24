@extends('layouts.bartizan')

@section('content')

    <main class="container p-2 bg-gray-200">
        <div id="joinList" class="flex flex-col">
{{--            {{$joinList}}--}}
            @foreach($joinList as $row)
            <div class="flex-col bg-white rounded-lg mb-3 px-3 py-2 text-gray-900 text-sm">
                <div class="w-full justify-between text-base">
{{--                    {{dd($row->getJoinRequestUsers()->get()->last()->name)}}--}}
                    <span>이름 : {{$row->getJoinRequestUsers()->get()->last()->name}}</span>
{{--                    <span>이름 : {{$row->user_name}}</span>--}}
{{--                    <button class="border border-gray-300 px-2 py-1 rounded" onclick="accept1()">수락</button>--}}
                    <button class="border border-gray-300 px-2 py-1 rounded" @click="accept({{$row->user_id}},{{$bartizan->id}})">승인</button>
                    <button class="border border-gray-300 px-2 py-1 rounded" @click="reject({{$row->user_id}},{{$bartizan->id}})">반려</button>
{{--                    <button class="border border-gray-300 px-2 py-1 rounded" onclick="accept({{$bartizan->id}},{{$row->user_id}})">수락</button>--}}

                </div>
            </div>
            @endforeach
        </div>
    </main>

    <script src="{{ asset('js/watchman/watchman.js') }}" defer></script>
@endsection


{{--    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>--}}
{{--    <script src="{{ asset('js/bartizan/bartizan.js') }}" defer></script>--}}

{{--    <script>--}}
{{--        function accept(bartizan_id, user_id){ // watchmen 테이블에 user_id와 bartizan_id 삽입--}}
{{--            console.log(bartizan_id);--}}
{{--            console.log(user_id);--}}
{{--            const data = {--}}
{{--                bartizan_id:bartizan_id,--}}
{{--                user_id:user_id--}}
{{--            };--}}
{{--            axios.post('/join/accept',--}}
{{--                {--}}
{{--                    data: data--}}
{{--                })--}}
{{--                .then(res=>{--}}
{{--                    console.log(res.data);--}}
{{--                }).catch(error=>{--}}
{{--                    console.log('Error : ', error);--}}
{{--            });--}}
{{--            // alert('테스트 '+bartizan_id+ user_id);--}}

{{--        }--}}
{{--        function reject(){ // join_requests 테이블에서 user_id가 있는 부분 삭제--}}
{{--            alert('거부');--}}
{{--        }--}}
{{--    </script>--}}
