@extends('layouts.user')

@section('content')

    <main class="container p-3 bg-gray-200">
        <section class="bg-white rounded p-3 text-gray-900 body-font relative">
            @forelse($bartizans as $i => $bartizan)
                {{$bartizan->name}}
            @empty

            @endforelse
        </section>
    </main>
@endsection
