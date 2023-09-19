@extends('layouts.bartizan')

@section('content')

    <main class="container p-2 bg-gray-200">
        <div class="flex flex-col">
            <div class="flex-col bg-gray-200 rounded-lg mb-3 px-3 py-2 pb-16 text-gray-900">
                <div class="bg-white p-3 mb-3 rounded-lg">
{{--                    <p class="text-left text-gray-900 text-sm">--}}
{{--                        <span class="font-bold text-base">{{$bartizan->name}}</span>을 마음에 담고 작정하신 분들입니다.--}}
{{--                    </p>--}}
                    <p class="text-right text-gray-700 text-xs">업데이트 2023.9.12.</p>
                </div>

                <div class="bg-white p-3 mb-3 rounded-lg border border-blue-500">
                    <h1 class="font-sm font-bold mb-2">망대 대표 (장로)</h1>
                    @forelse($pledges->representative as $represent)
                        <div class="w-full justify-between text-base">
                            <p class="text-gray-900 mb-1">{{$represent->name}} <span class="text-gray-700 text-xs"> {{$represent->district}}</span></p>
                        </div>
                    @empty
                        <div class="w-full justify-between text-base">
                            <p class="text-red-400 text-xs font-bold">아직 작정하신 장로님이 없는 빈 곳입니다</p>
                        </div>
                    @endforelse
                </div>


                <div class="bg-white p-3 mb-3 rounded-lg border border-orange-400">
                    <h1 class="font-sm font-bold mb-2">권사</h1>
                    @forelse($pledges->watchmen as $watchman)
                        @if($watchman->position == "권사")
                        <div class="w-full justify-between text-base">
                            <p class="text-gray-900 mb-1">{{$watchman->name}} <span class="text-gray-700 text-xs"> {{$watchman->district}}</span></p>
                        </div>
                        @endif
                    @empty
                        <div class="w-full justify-between text-base">
                            <p class="text-red-400 text-xs font-bold">아직 작정하신 권사님이 없는 빈 곳입니다</p>
                        </div>
                    @endforelse
                </div>

                <div class="bg-white p-3 mb-3 rounded-lg border border-green-500">
                    <h1 class="font-sm font-bold mb-2">안수집사</h1>
                    @forelse($pledges->tychicus as $tychicus)
                        @if($tychicus->position == "안수집사")
                            <div class="w-full justify-between text-base">
                                <p class="text-gray-900 mb-1">{{$tychicus->name}} <span class="text-gray-700 text-xs"> {{$tychicus->district}}</span></p>
                            </div>
                        @endif
                    @empty
                        <div class="w-full justify-between text-base">
                            <p class="text-red-400 text-xs font-bold">아직 작정하신 안수집사님이 없는 빈 곳입니다</p>
                        </div>
                    @endforelse
                </div>

                <div class="bg-white p-3 mb-3 rounded-lg border border-sky-300">
                    <h1 class="font-sm font-bold mb-2">렘넌트</h1>
                    @forelse($pledges->watchmen as $watchman)
                        @if($watchman->position == "RT")
                            <div class="w-full justify-between text-base">
                                <p class="text-gray-900 mb-1">{{$watchman->name}} <span class="text-gray-700 text-xs"> {{$watchman->district}}</span></p>
                            </div>
                        @endif
                    @empty
                        <div class="w-full justify-between text-base">
                            <p class="text-red-400 text-xs font-bold">아직 작정하신 렘넌트가 없는 빈 곳입니다</p>
                        </div>
                    @endforelse
                </div>

                <div class="bg-white p-3 mb-3 rounded-lg border border-sky-300">
                    <h1 class="font-sm font-bold mb-2">성도</h1>
                    @forelse($pledges->watchmen as $watchman)
                        @if($watchman->position == "성도")
                            <div class="w-full justify-between text-base">
                                <p class="text-gray-900 mb-1">{{$watchman->name}} <span class="text-gray-700 text-xs"> {{$watchman->district}}</span></p>
                            </div>
                        @endif
                    @empty
                        <div class="w-full justify-between text-base">
                            <p class="text-red-400 text-xs font-bold">아직 작정하신 성도님이 없는 빈 곳입니다</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </main>

@endsection

