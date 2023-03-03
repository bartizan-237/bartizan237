@extends('layouts.app')

@section('content')

    <section class="text-gray-600 body-font relative">
        <div id="my_fields_div" class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">관심분야</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">  </p>
            </div>
            <div class="mx-auto">
                <div class="flex flex-col -m-2">
                    @foreach($fields as $industry => $jobs)
                        {{$industry}} <br/>
                        @foreach($jobs as $job)
                            {{$job->name}} &nbsp;
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <script src="{{ asset('js/user/user.js') }}" defer></script>

@endsection
