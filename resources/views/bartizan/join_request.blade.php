@extends('layouts.bartizan')

@section('content')

    <main class="container p-2 bg-gray-200">
        <div id="joinRequest" class="flex flex-col">
            <div class="flex-col bg-white rounded-lg mb-3 px-3 py-2 text-gray-900 text-lg">
                신청자 : <span type="text" id="name" style="border: none;" readonly
                         class="text-lg d">{{\Auth::user()->name}}</span>
            </div>
            <div class="flex-col bg-white rounded-lg mb-3 px-3 py-2 text-gray-900 text-lg">신청사유<br>
                <textarea id="reason" cols="50" rows="15" placeholder="파수꾼 신청 사유를 입력해 주세요." style="resize:none;"
                            class="w-full"></textarea>
            </div>
            <button type="button" @click="request({{\Auth::user()->id}},{{$bartizan->id}})"
                    class="bg-blue-500 text-white font-bold py-2 px-4 rounded">신청</button>
        </div>
    </main>

    <script src="{{ asset('js/watchman/join_request.js') }}" defer></script>

@endsection


