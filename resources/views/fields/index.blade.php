@extends('layouts.app')

@section('content')

    <section class="bg-white container p-5 mx-auto mt-5">
        <div id="my_fields_div">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">산업 망대</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">  </p>
            </div>

            <x-jobs/>
            {{--            <x-jobs :jobs="{!! json_encode($fields) !!}"/>--}}
            {{--            <div class="mx-auto flex flex-wrap">--}}
            {{--                <div class="w-1/2 border border-1 border-gray-100">--}}
            {{--                    <ul class="bg-gray-100">--}}
            {{--                    @foreach($fields as $industry => $jobs)--}}
            {{--                        <li class=" @if($industry == "기획전략") selected_industry @endif ">--}}
            {{--                            <button class="w-full px-3 py-2 text-left text-sm text-gray-600"> {{$industry}} </button>--}}
            {{--                        </li>--}}
            {{--                    @endforeach--}}
            {{--                    </ul>--}}
            {{--                </div>--}}
            {{--                <div class="w-1/2 overflow-scroll border border-1 border-gray-100">--}}
            {{--                    @foreach($fields as $industry => $jobs)--}}
            {{--                        <ul class=" @if($industry != "기획전략") hidden @endif">--}}
            {{--                        @foreach($jobs as $job)--}}
            {{--                            <li>--}}
            {{--                                <button class="w-full px-3 py-2 text-left text-sm text-gray-900"> {{$job->name}} </button>--}}
            {{--                            </li>--}}
            {{--                        @endforeach--}}
            {{--                        </ul>--}}
            {{--                    @endforeach--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>


    </section>

    <script src="{{ asset('js/user/user.js') }}" defer></script>

@endsection
