@extends('layouts.app')

@section('content')
    <main class="sm:mx-auto h-full relative" style="max-width: 500px;">
        <div class="bg-gray-200 min-h-full pb-8">
            {{--            <form action="/nation/search" method="POST" class="text-center">--}}
            <form action="/nation" method="GET" class="text-center">
                {{--                @csrf--}}
                <div class="flex p-2 bg-white rounded my-2">
                    <div class="rounded inline-block mr-1" style="margin-top: 3px;">
                        <select name="province" id="province" style="height: 32px; line-height: 20px; font-size: 15px; padding:5px">
                            <option selected>전체</option>
                            <option>아시아권</option>
                            <option>중화권</option>
                            <option>아랍권</option>
                            <option>아랍권</option>
                        </select>
                    </div>
                    <div class="rounded inline-block mr-1" style="margin-top: 3px;">
                        <input type="text" name="search" id="search" placeholder="검색어를 입력하세요" value="{{$search_keyword ?? ''}}" style="height: 32px; line-height: 20px; font-size: 15px"/>
                    </div>
                    <button type="submit" class="p-2 bg-green-500 text-white rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="inline-block feather feather-search mr-1"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        검색
                    </button>
                </div>
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
            <div class="py-3 w-full pb-8 mb-16">
                {{ $nations->onEachSide(1)->withQueryString()->links('custom.paginator') }}
            </div>
        </div>
    </main>
@endsection
