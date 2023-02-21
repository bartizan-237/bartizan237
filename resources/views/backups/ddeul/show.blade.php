@extends('layouts.ddeul')

@section('content')

    <link href="{{ mix('css/main.css') }}" rel="stylesheet">

    <main class="container p-2 bg-gray-200">
        <div class="flex flex-col">
            <div class="bg-white rounded-lg mb-3 p-3 text-gray-900" style="height: calc(100vh - 160px)">
                {!! $ddeul->description !!}}
            </div>
        </div>
    </main>
@endsection
