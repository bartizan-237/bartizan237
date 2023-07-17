@extends('layouts.app')

@section('content')
    <main class="sm:mx-auto h-full relative" style="max-width: 500px;">
        <div class="bg-gray-200 min-h-full pb-8">
            <form action="/nation/search" method="POST" class="text-center">
                @csrf
                <input type="text" name="search" id="search"/>
                <button type="submit" class="border-2">검색</button>
            </form>
            <div class="p-2 mx-auto">
                @foreach($nations as $nation)
                <div class="w-full flex-col mb-2 bg-white rounded-lg">
                    <div class="w-full px-1" onclick="location.href='/nation/{{$nation->id}}'">
                        <div class="flex border-b border-1 border-gray-100 p-2 relative">
{{--                            <img src="{{env("NCLOUD_FLAG_PATH")}}/{{strtolower($nation->country_code)}}.png" class="inline-block"--}}
{{--                                 style="object-fit: contain; height: 30px; width: 40px;" alt="img.."/>--}}

                            <div class="bg-contain bg-no-repeat bg-center"
                                 style="width :40px; background-image:url('{{env("NCLOUD_FLAG_PATH")}}/{{strtolower($nation->country_code)}}.png')">
                            </div>

                            <div class="flex-col px-2">
                                <p class="text-gray-900 text-sm font-bold">{{$nation->name}}</p>
                                <span class="text-gray-800 text-xs">{{$nation->name_en}}</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-6 w-6 text-gray-900"style="position:absolute; right:6px; top:12px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="py-3 w-full pb-8 mb-8">
                {{ $nations->onEachSide(1)->withQueryString()->links('custom.paginator') }}
            </div>
        </div>
    </main>
@endsection
