@extends('layouts.bartizan')

@section('content')

    <main class="container p-2 bg-gray-200">
        <div id="joinRequestList" class="flex flex-col">
            @foreach($joinList as $row)
                <div class="flex-col bg-white rounded-lg mb-3 px-3 py-2 text-gray-900 text-sm">
                    <div class="w-full flex justify-between text-lg items-center">
                        <span class="mr-4 px-5">이름 &nbsp;&nbsp;:&nbsp;&nbsp;{{$row->getJoinRequestUsers()->get()->last()->name}}</span>
                        <div class="mr-4 px-6">
                            <button type="button" class="border border-gray-300 mr-5 px-4 py-2 rounded" @click="accept({{$row->user_id}},{{$bartizan->id}})">승인</button>
                            <button type="button" class="border border-gray-300 mr-5 px-4 py-2 rounded" @click="reject({{$row->user_id}},{{$bartizan->id}})">반려</button>
                        </div>
                    </div>
                </div>
            @endforeach
            <button type="button" @click="test">테스트 버튼</button> {{-- 버튼이 안눌러짐 --}}
        </div>
    </main>

    <script src="{{ asset('js/watchman/watchman.js') }}" defer></script>
@endsection


