@extends('layouts.nation')

@section('content')
    <!-- 개요 -->
    <style>
        .nation_title {
            font-size: 13px;
            font-weight: bold;
            color : #333333;
            margin-bottom: 5px;
        }
    </style>
    <main class="container p-2 bg-gray-200">
        <div class="flex flex-wrap p-1 mb-3 pb-6 relative">
            <button
{{--                    onclick="toast('info', '준비 중 입니다'); return;"--}}
                    onclick="openModal('https://kr.object.ncloudstorage.com/immanuel/bartizan/image/mission/AD.png');"
                    class="absolute right-5 top-5 p-1 text-xs bg-blue-500 text-white rounded">
                +선교정보
            </button>

            <div class="p-3 w-full bg-white rounded-lg mb-3">

                <p class="text-sm pb-1 text-gray-800">
                @switch($nation->continent)
                    @case("Asia") 아시아 @break
                    @case("Oceania") 오세아니아 @break
                    @case("Africa") 아프리카 @break
                    @case("North America") 북아메리카 @break
                    @case("South America") 남아메리카 @break
                    @case("Europe") 유럽 @break
                @endswitch
                </p>
                <p class="text-2xl pb-1 font-bold ">
                    <img src="{{env("NCLOUD_FLAG_PATH")}}/{{strtolower($nation->country_code)}}.png" class="inline-block"
                         style="object-fit: contain; height: 30px; width: 40px; padding-bottom: 5px" alt="img.."/>
                    {{$nation->name}}
                </p>
                <p class="text-gray-900">{{$nation->name_en}}</p>
            </div>

            <div class="pr-2 w-1/2 mb-3">
                <div class="bg-white p-3 rounded-lg">
                    <p class="nation_title">수도</p>
                    {{$nation->capital}}
                </div>
            </div>

            <div class="pl-2 w-1/2 bg-white rounded-lg mb-3">
                <div class="bg-white p-3 rounded-lg">
                    <p class="nation_title">언어</p>
                    @foreach(json_decode($nation->languages) as $language)
                        {{$language}}
                    @endforeach
                </div>
            </div>

            <div class="pr-2 w-1/3 mb-3">
                <div class="bg-white p-3 rounded-lg">
                    <p class="nation_title">면적</p>
                    <span class="text-sm"> {{number_format($nation->area)}} km² </span>
                </div>
            </div>

            <div class="pr-2 w-1/3 mb-3">
                <div class="bg-white p-3 rounded-lg">
                    <p class="nation_title">인구</p>
                    <span class="text-sm"> {{number_format($nation->population)}} 명 </span>
                </div>
            </div>

            <div class=" w-1/3 mb-3">
                <div class="bg-white p-3 rounded-lg">
                    <p class="nation_title">GDP</p>
                    @if($nation->gdp AND $nation->gdp != 0)
                    $ {{number_format($nation->gdp)}}
                    @else
                    -
                    @endif
                </div>
            </div>


            @if(isset($nation->tribes) AND $nation->tribes != "")
            <div class="pr-2 w-full mb-3">
                <div class="bg-white p-3 rounded-lg">
                    <p class="nation_title">종족</p>
                    {{$nation->tribes}}
                </div>
            </div>
            @endif

            @if(isset($nation->total_tribes) AND $nation->total_tribes != "")
            <div class="pr-2 w-1/3 mb-3">
                <div class="bg-white p-3 rounded-lg">
                    <p class="nation_title">전체 종족</p>
                    {{$nation->total_tribes}}
                </div>
            </div>
            @endif

            @if(isset($nation->unreached_tribes) AND $nation->unreached_tribes != "")
            <div class="pr-2 w-1/3 mb-3">
                <div class="bg-white p-3 rounded-lg">
                    <p class="nation_title">미전도 종족</p>
                    {{$nation->unreached_tribes}}
                </div>
            </div>
            @endif

            @if(isset($nation->major_tribes) AND $nation->major_tribes != "")
            <div class="pr-2 w-1/3 mb-3">
                <div class="bg-white p-3 rounded-lg">
                    <p class="nation_title">주요 종족</p>
                    {{$nation->major_tribes}}
                </div>
            </div>
            @endif

            <div class="pr-2 w-2/3 mb-3">
                <div class="bg-white p-3 rounded-lg">
                    <p class="nation_title">방송선교</p>
                    @if($nation->broadcasting_missions AND $nation->broadcasting_missions != "")
                        {{$nation->broadcasting_missions}}
                    @else
                        -
                    @endif
                </div>
            </div>

            <div class="w-1/3 mb-3">
                <div class="bg-white p-3 rounded-lg">
                    <p class="nation_title">렘넌트 시스템</p>
                    @if($nation->remnant_system AND $nation->remnant_system != "" AND $nation->remnant_system == "O")
                        O
                    @else
                        -
                    @endif
                </div>
            </div>

            <div class="w-full mb-3 pb-6">
                <div class="w-full bg-white p-3 rounded-lg border-b border-gray-200">
                    <p class="nation_title">종교</p>
                    <table class="bg-white text-center w-full">
                        <thead class="bg-gray-900 text-white">
                        <tr>
                            <th class="w-1/2 text-xs p-0.5">분류</th>
                            <th class="w-1/2 text-xs p-0.5">비율 <span class="text-xs">(%)</span></th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-900">
                        <tr>
                            <td class="w-1/3 text-sm p-1"> 개신교 </td>
                            <td class="w-1/3 text-sm p-1">
                                @if($nation->protestant)
                                    {{number_format($nation->protestant, 1)}}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr class="bg-gray-100">
                            <td class="w-1/3 text-sm p-1"> 카톨릭 </td>
                            <td class="w-1/3 text-sm p-1">
                                @if($nation->catholicism)
                                    {{number_format($nation->catholicism, 1)}}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/3 text-sm p-1"> 정교 </td>
                            <td class="w-1/3 text-sm p-1">
                                @if($nation->orthodox)
                                    {{number_format($nation->orthodox, 1)}}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr class="bg-gray-100">
                            <td class="w-1/3 text-sm p-1"> 힌두교 </td>
                            <td class="w-1/3 text-sm p-1">
                                @if($nation->buddhism)
                                    {{number_format($nation->buddhism, 1)}}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/3 text-sm p-1"> 이슬람 </td>
                            <td class="w-1/3 text-sm p-1">
                                @if($nation->islam)
                                    {{number_format($nation->islam, 1)}}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr class="bg-gray-100">
                            <td class="w-1/3 text-sm p-1"> 힌두교 </td>
                            <td class="w-1/3 text-sm p-1">
                                @if($nation->hinduism)
                                    {{number_format($nation->hinduism, 1)}}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/3 text-sm p-1"> 이단 종교 </td>
                            <td class="w-1/3 text-sm p-1">
                                @if($nation->heresy)
                                    {{number_format($nation->heresy, 1)}}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr class="bg-gray-100">
                            <td class="w-1/3 text-sm p-1"> 무속 </td>
                            <td class="w-1/3 text-sm p-1">
                                @if($nation->shamanism)
                                    {{number_format($nation->shamanism, 1)}}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/3 text-sm p-1"> 기타 종교 </td>
                            <td class="w-1/3 text-sm p-1">
                                @if($nation->etc_religion)
                                    {{number_format($nation->etc_religion, 1)}}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </main>
@endsection
