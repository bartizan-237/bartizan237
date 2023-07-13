@extends('layouts.app')

@section('content')
    <main class="sm:mx-auto h-full relative" style="max-width: 500px;">
        <div class="h-full bg-gray-200">
            <div class="p-2 mx-auto">
                @foreach($nations as $nation)
                    <div class="w-full flex-col mb-2 bg-white rounded-lg">
                        <div class="w-full px-3" onclick="location.href='/nation/{{$nation->id}}'">
                            <div class="border-b border-1 border-gray-100 p-2 relative">
                                <p class="text-gray-900 text-base font-bold inline-block ml-1">{{$nation->name}}<span class="text-sm"></span></p>
                                <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-6 w-6 text-gray-900"
                                     style="position:absolute; right:6px; top:12px;"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                        <div class="text-gray-700 text-sm px-3 py-2">
                            <p class="text-gray-900 text-base font-bold inline-block ml-1">{{$nation->name_en}}<span class="text-sm"></span></p>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </main>
@endsection
