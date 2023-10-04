@extends('admin.layouts.main')

@section('content')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <h2
                    class="my-6 text-2xl font-semibold text-gray-700 "
            >
                망대 목록
            </h2>


            {{--<h6 class="my-2 flex items-center justify-between text-sm  font-semibold text-gray-600 ">
                카페24 앱스토어 [카카오톡 상담 + 쿠폰 리워드] 앱 관리하기
            </h6>--}}

            <div class="duration-150 px-4 py-3 mb-8 bg-white rounded-lg shadow-md ">
                <form role="search" action="/admin/bartizans" method="GET">
                    <select id="search_field" name="search_field" class="mr-2 border rounded p-1   ">
                        <option value="name" selected>국가명</option>
                    </select>

                    <label class="inline-block text-sm">
                        <div class="flex items-center justify-between text-gray-500 focus-within:text-purple-600">

                            <input
                                    type="text"
                                    id="search_keyword" name="search_keyword"
                                    value="@if(isset($search_keyword)) {{$search_keyword}} @endif"
                                    style="@if(isset($search_field) AND ($search_field=='active' OR $search_field=='deleted_at')) display: none; @else display: block; @endif"
                                    class="inline-block w-64 mr-3 text-sm text-black    focus:border-purple-400 focus:outline-none focus:shadow-outline-purple  form-input border rounded p-1"
                                    placeholder="검색어"/>

                            <button type="submit"
                                    class="inline-block inset-y-0 px-4 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                            >검색</button>
                        </div>
                    </label>
                </form>
            </div>


            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="table_hover w-full whitespace-no-wrap" style="min-width: 1200px;">
                        <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-white uppercase border-b  bg-green-900" >
                            <th rowspan="2" class="px-4 py-3 text-center">망대번호</th>
                            <th rowspan="2" class="px-4 py-3 text-center">국가명</th>
                            <th rowspan="2" class="px-4 py-3 text-center">대륙</th>
                            <th rowspan="2" class="px-4 py-3 text-center">대교구</th>
                            <th colspan="5" class="px-4 py-3 text-center">파수꾼</th>
                        </tr>
                        <tr class="text-xs font-semibold tracking-wide text-left text-white uppercase border-b  bg-green-900" >
                            <th class="px-4 py-3 text-center">장로</th>
                            <th class="px-4 py-3 text-center">권사</th>
                            <th class="px-4 py-3 text-center">안수집사</th>
                            <th class="px-4 py-3 text-center">렘넌트</th>
                            <th class="px-4 py-3 text-center">성도</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y  ">
                        @if(isset($bartizans))
                            @foreach($bartizans as $i => $bartizan)
                                <tr class="text-gray-700 @if($i%2 == 0) bg-green-50 @endif ">
                                    <td class="px-4 py-3 text-sm text-center">
                                        {{ ($loop->index + 1) }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-center">
                                        {{$bartizan->name}}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-center">
                                        @switch($bartizan->continent)
                                            @case("Asia") 아시아 @break
                                            @case("America") 아메리카 @break
                                            @case("Africa") 아프리카 @break
                                            @case("Europe") 유럽 @break
                                            @case("Oceania") 오세아니아 @break
                                            @default -
                                        @endswitch
                                    </td>
                                    <td class="px-4 py-3 text-sm text-center">
                                        {{$bartizan->province}}
                                    </td>

                                    <td class="px-4 py-3 text-xs">
                                    @foreach(json_decode($bartizan->watchman_infos) as $role => $member_info)
                                        @foreach($member_info as $member)
                                            @if($member->position == "장로")
                                                {{$member->name ?? ""}} <span style="font-size:10px;">{{$member->position ?? ""}}</span>
                                                <br/>
                                           @endif
                                        @endforeach
                                    @endforeach
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                   @foreach(json_decode($bartizan->watchman_infos) as $role => $member_info)
                                        @foreach($member_info as $member)
                                            @if($member->position == "권사")
                                                {{$member->name ?? ""}} <span style="font-size:10px;">{{$member->position ?? ""}}</span>
                                                <br/>
                                           @endif
                                        @endforeach
                                    @endforeach
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                   @foreach(json_decode($bartizan->watchman_infos) as $role => $member_info)
                                        @foreach($member_info as $member)
                                            @if($member->position == "안수집사")
                                                {{$member->name ?? ""}} <span style="font-size:10px;">{{$member->position ?? ""}}</span>
                                                <br/>
                                           @endif
                                        @endforeach
                                    @endforeach
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                   @foreach(json_decode($bartizan->watchman_infos) as $role => $member_info)
                                        @foreach($member_info as $member)
                                            @if($member->position == "RT")
                                                {{$member->name ?? ""}} <span style="font-size:10px;">{{$member->position ?? ""}}</span>
                                                <br/>
                                           @endif
                                        @endforeach
                                    @endforeach
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                   @foreach(json_decode($bartizan->watchman_infos) as $role => $member_info)
                                        @foreach($member_info as $member)
                                            @if($member->position == "성도")
                                                {{$member->name ?? ""}} <span style="font-size:10px;">{{$member->position ?? ""}}</span>
                                                <br/>
                                           @endif
                                        @endforeach
                                    @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        <script>
                            $(".chatis_admin_btn").click(function (){

                            });
                        </script>




                        </tbody>
                    </table>
                </div>

                <div class="py-8">
                    <ul id="navigation_area" class="flex items-center justify-center">
                        {{ $bartizans->appends(request()->except('page'))->links() }}
                    </ul>
                </div>

            </div>





        </div>
    </main>
@endsection
