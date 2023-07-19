@extends('layouts.bartizan')

@section('content')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <main class="container p-2 bg-gray-200">
        <div class="flex flex-col">
            @foreach($joinList as $list_row)
            <div class="flex-col bg-white rounded-lg mb-3 px-3 py-2 text-gray-900 text-sm">
                <div id="joinList" class="w-full justify-between text-base">
                    <span>이름 : {{$list_row->user_name}}</span>
                    <button class="border border-gray-300 px-2 py-1 rounded" onclick="accept({{$list_row->user_id}})">수락</button>
                    <button class="border border-gray-300 px-2 py-1 rounded" onclick="reject()">거부</button>
{{--                    <span class="border border-gray-300 px-2 py-1 rounded"><button @click="">수락</button></span>--}}
{{--                    <span class="border border-gray-300 px-2 py-1 rounded"><button>거부</button></span>--}}
                </div>
            </div>
            @endforeach
        </div>
    </main>

{{--    <script src="{{ asset('js/bartizan/bartizan.js') }}" defer></script>--}}

    <script>
        function accept(data){
            alert('테스트 '+data);
        }
        function reject(){
            alert('거부');
        }
    </script>

@endsection


{{--<script>--}}
{{--    function accept(user_id, bartizan_id){--}}
{{--        alert('테스트 '+ user_id + bartizan_id);--}}
{{--    }--}}
{{--</script>--}}
