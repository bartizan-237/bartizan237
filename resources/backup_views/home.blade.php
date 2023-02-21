@extends('layouts.app')

@section('content')

<link href="{{ mix('css/main.css') }}" rel="stylesheet">

<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="flex flex-wrap  bg-gray-100">
        @for($i=0; $i<5; $i++)
        <div class="xl:w-1/4 md:w-1/2 p-4">
            <div class="bg-white dark:bg-gray-900 p-6 rounded-lg">
                <img class="h-40 rounded w-full object-cover object-center mb-6" src="https://dummyimage.com/720x400" alt="content">
                <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">SUBTITLE</h3>
                <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Chichen Itza</h2>
                <p class="leading-relaxed text-base">Fingerstache flexitarian street art 8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</p>
            </div>
        </div>
        @endfor
    </div>
</main>
@endsection
