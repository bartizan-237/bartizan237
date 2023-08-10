@extends('layouts.bartizan')

@section('content')

    <main class="container p-2 bg-gray-200">
        <div id="joinRequestList" class="flex flex-col">
            @foreach($joinList as $row)
                <div class="flex-col bg-white rounded-lg mb-3 px-3 py-2 text-gray-900 text-sm">
                    <div class="w-full flex justify-between text-lg items-center">
                        <span class="mr-4 px-5">{{$row->getJoinRequestUsers()->get()->last()->name}}</span>
                        <div class="mr-4 px-6">
                            <button type="button" @click="showReason({{$row->user_id}})" class="border border-gray-300 mr-5 px-4 py-2 rounded">신청사유 보기</button>
{{--                            <button type="button" class="border border-gray-300 mr-5 px-4 py-2 rounded" @click="accept({{$row->user_id}},{{$bartizan->id}})">승인</button>--}}
{{--                            <button type="button" class="border border-gray-300 mr-5 px-4 py-2 rounded" @click="reject({{$row->user_id}},{{$bartizan->id}})">반려</button>--}}
                        </div>
                    </div>
                </div>

                <div id="{{$row->user_id}}" class="flex-col bg-white rounded-lg mb-3 px-3 py-2 text-gray-900 text-sm hidden">
                        <p class="text-center">신청사유</p><br/>
                        <p>{{$row->reason}}</p>
                        <div class="text-center">
                            <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded" @click="accept({{$row->user_id}},{{$bartizan->id}})">승인</button>
                            <button class="bg-red-500 text-white font-bold py-2 px-4 rounded" @click="reject_input({{$row->user_id}})">반려</button>
                        </div>
                </div>

                <div id="reject_{{$row->user_id}}" class="flex-col bg-white rounded-lg mb-3 px-3 py-2 text-gray-900 text-lg hidden">반려사유<br>
                    <textarea id="reason" cols="50" rows="15" placeholder="반려 사유를 입력해 주세요." style="resize:none;"
                              class="w-full h-16"></textarea>
                    <button class="bg-red-500 text-white font-bold py-2 px-4 rounded" @click="reject({{$row->user_id}},{{$bartizan->id}})">반려</button>
                </div>
            @endforeach
        </div>
    </main>

    <script src="{{ asset('js/watchman/join_request_list.js') }}" defer></script>

@endsection

