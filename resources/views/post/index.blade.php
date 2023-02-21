@extends('layouts.app')

@section('content')

    <link href="{{ mix('css/main.css') }}" rel="stylesheet">

    <main class="sm:container sm:mx-auto" style="max-width: 500px;">
        <div class="bg-gray-200 h-screen">
            @if(\Auth::user())
            <button class="bg-green-500 text-white p-5 text-xl m-5" onclick="location.href='/ddeul/create'">뜰만들기</button>
            @endif
            @include('post.home_post', [
               'mainTitle' => "404, page not found ",
               'mainContent' => "sorry, but the requested page does not exist"
               ]
           )
        </div>
    </main>
@endsection
