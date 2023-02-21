@extends('layouts.app')

@section('content')

    <link href="{{ mix('css/main.css') }}" rel="stylesheet">

    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="flex flex-col bg-gray-200 h-screen">
            @include('post.home_post', [
                'mainTitle' => "404, page not found ",
                'mainContent' => "sorry, but the requested page does not exist"
                ]
            )

        </div>
    </main>
@endsection
