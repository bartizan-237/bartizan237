@extends('layouts.app')

@section('content')

<link href="{{ mix('css/main.css') }}" rel="stylesheet">

<main class="sm:container sm:mx-auto" style="max-width: 500px">
    <div class="flex flex-col bg-gray-200 h-screen">
{{--    @include('post.home_post', [--}}
{{--        'posts' => $posts--}}
{{--    ])--}}
        <link href="https://fonts.googleapis.com/css2?family=Bungee&amp;display=swap" rel="stylesheet">

        <!-- LANDING PAGE -->
        <div class="flex flex-col items-center justify-center w-full h-full bg-gray-100">

            <div>
                <p class="text-center text-xl text-green-600 mb-6" style="font-size: 30px; font-family: 'Bungee', cursive">
                    Bartizans 237
                </p>
            </div>
        </div>

    </div>
</main>
@endsection
