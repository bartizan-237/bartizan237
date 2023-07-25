@extends('layouts.bartizan')

@section('content')

    <main class="container p-2 bg-gray-200">
        <div class="flex flex-col">
            @foreach($watchmen as $watchman)
                <div class="w-full justify-between text-base">
                    <span>이름 : {{$watchman->getUsers()->get()->last()->name}}</span>
                </div>
            @endforeach
        </div>
    </main>

{{--    <script src="{{ asset('js/watchman/watchman.js') }}" defer></script>--}}
@endsection

