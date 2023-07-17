@extends('layouts.app')

@section('content')

<link href="{{ mix('css/main.css') }}" rel="stylesheet">

<main class="sm:container sm:mx-auto" style="max-width: 500px">
    <div class="flex flex-col bg-gray-200 h-screen">
    @include('post.home_post', [
        'posts' => $posts
    ])
    </div>
</main>
@endsection
