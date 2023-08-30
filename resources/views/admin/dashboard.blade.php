@extends('admin.layouts.main')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2
                    class="my-6 text-2xl font-semibold text-gray-700 "
            >
                세계망대 플랫폼
            </h2>
            <!-- CTA -->
            {{--<a
                    class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
                    href="https://github.com/estevanmaito/windmill-dashboard"
            >
                <div class="flex items-center">
                    <svg
                            class="w-5 h-5 mr-2"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                    >
                        <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                        ></path>
                    </svg>
                    <span>Star this project on GitHub</span>
                </div>
                <span>View more &RightArrow;</span>
            </a>--}}
            <!-- Cards -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                <!-- Card -->
                <a
                        class="flex items-center p-4 bg-white rounded-lg shadow-xs "
                        href="/install"
                >
                    <div
                            class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full "
                    >
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                            ></path>
                        </svg>
                    </div>
                    <div>
                        <p
                                class="mb-2 text-sm font-medium text-gray-600 "
                        >
                            총 회원 수
                        </p>
                        <p
                                class="text-lg font-semibold text-gray-700 "
                        >
                        </p>
                    </div>
                </a>
                <!-- Card -->
                <a
                        class="flex items-center p-4 bg-white rounded-lg shadow-xs "
                        href="/new_install"
                >
                    <div
                            class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full "
                    >
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                    fill-rule="evenodd"
                                    d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                    clip-rule="evenodd"
                            ></path>
                        </svg>
                    </div>
                    <div>
                        <p
                                class="mb-2 text-sm font-medium text-gray-600 "
                        >
                            게시글 수
                        </p>
                        <p
                                class="text-lg font-semibold text-gray-700 "
                        >
                        </p>
                    </div>
                </a>
                <!-- Card -->
                <a
                        class="flex items-center p-4 bg-white rounded-lg shadow-xs "
                        href="/sales"
                >
                    <div
                            class="p-3 mr-4 text-green-500 bg-green-100 rounded-full "
                    >
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                    fill-rule="evenodd"
                                    d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd"
                            ></path>
                        </svg>
                    </div>
                    <div>
                        <p
                                class="mb-2 text-sm font-medium text-gray-600 "
                        >
                            방문자 수
                        </p>
                        <p
                                class="text-lg font-semibold text-gray-700 "
                        >
                        </p>
                    </div>
                </a>
                <!-- Card -->
                <a
                        class="flex items-center p-4 bg-white rounded-lg shadow-xs "
                        href="/new_sales"
                >
                    <div
                            class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full "
                    >
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                    d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"
                            ></path>
                        </svg>
                    </div>
                    <div>
                        <p
                                class="mb-2 text-sm font-medium text-gray-600 "
                        >
                            신규회원 수
                        </p>
                        <p
                                class="text-lg font-semibold text-gray-700 "
                        >

                        </p>
                    </div>
                </a>
                <!-- Card -->

            </div>

{{--            <h2 class="my-6 text-2xl font-semibold text-gray-700 ">Chart</h2>--}}
{{--            <div class="grid gap-6 mb-8 md:grid-cols-2">--}}
{{--                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs ">--}}
{{--                    <h4 class="mb-4 font-semibold text-gray-800 ">주요 앱 점유율</h4>--}}
{{--                    <div class="">--}}
{{--                        <canvas id="app_install_pie" width="600" height="300"></canvas>--}}
{{--                        <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 ">--}}
{{--                            <!-- Chart legend -->--}}
{{--                            <div class="flex items-center">--}}
{{--                                <span class="inline-block w-3 h-3 mr-1 rounded-full" style="background-color: #f2c611"></span>--}}
{{--                                <span>KQ</span>--}}
{{--                            </div>--}}
{{--                            <div class="flex items-center">--}}
{{--                                <span class="inline-block w-3 h-3 mr-1 rounded-full" style="background-color: #e8812d"></span>--}}
{{--                                <span>KL</span>--}}
{{--                            </div>--}}
{{--                            <div class="flex items-center">--}}
{{--                                <span class="inline-block w-3 h-3 mr-1 rounded-full" style="background-color: #5fa55b"></span>--}}
{{--                                <span>NB</span>--}}
{{--                            </div>--}}
{{--                            <div class="flex items-center">--}}
{{--                                <span class="inline-block w-3 h-3 mr-1 rounded-full" style="background-color: #50679b"></span>--}}
{{--                                <span>SR</span>--}}
{{--                            </div>--}}
{{--                            <div class="flex items-center">--}}
{{--                                <span class="inline-block w-3 h-3 mr-1 rounded-full" style="background-color: #8b57bc"></span>--}}
{{--                                <span>IS</span>--}}
{{--                            </div>--}}
{{--                            <div class="flex items-center">--}}
{{--                                <span class="inline-block w-3 h-3 mr-1 rounded-full" style="background-color: #EF4444"></span>--}}
{{--                                <span>SK</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs ">--}}
{{--                    --}}{{--순위--}}
{{--                    <div class="flex-initial flex-wrap">--}}
{{--                        @foreach($sorted_install as $idx => $sorted_install_row)--}}
{{--                            <div class="group mb-2 flex justify-between items-center p-2 rounded hover:bg-purple-50 duration-300 ">--}}
{{--                                    <span class="">--}}
{{--                                        <span class="inline-block bg-gray-200 rounded w-8 p-1 text-center mr-2 ">{{$idx + 1}}</span>--}}
{{--                                        <span class="text-wrap group-hover:text-gray-800"> {{$sorted_install_row['name']}}</span>--}}
{{--                                    </span>--}}
{{--                                <span class="text-right font-bold px-2 group-hover:text-gray-800"><i>{{$sorted_install_row['count']}}</i></span>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


            <!-- 사용 유지율 -->
{{--            <h2 class="my-6 text-2xl font-semibold text-gray-700 ">Chart</h2>--}}
{{--            <div class="grid gap-6 mb-8 md:grid-cols-2">--}}
{{--                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs ">--}}
{{--                    <h4 class="mb-4 font-semibold text-gray-800 ">앱 점유율</h4>--}}
{{--                    <div class="flex items-center">--}}
{{--                        <div class="flex-1">--}}
{{--                            <canvas id="app_active_pie"></canvas>--}}
{{--                            <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 ">--}}
{{--                                <!-- Chart legend -->--}}
{{--                                <div class="flex items-center">--}}
{{--                                    <span class="inline-block w-3 h-3 mr-1 rounded-full" style="background-color: #f2c611"></span>--}}
{{--                                    <span>KQ</span>--}}
{{--                                </div>--}}
{{--                                <div class="flex items-center">--}}
{{--                                    <span class="inline-block w-3 h-3 mr-1 rounded-full" style="background-color: #e8812d"></span>--}}
{{--                                    <span>KL</span>--}}
{{--                                </div>--}}
{{--                                <div class="flex items-center">--}}
{{--                                    <span class="inline-block w-3 h-3 mr-1 rounded-full" style="background-color: #5fa55b"></span>--}}
{{--                                    <span>KB</span>--}}
{{--                                </div>--}}
{{--                                <div class="flex items-center">--}}
{{--                                    <span class="inline-block w-3 h-3 mr-1 rounded-full" style="background-color: #50679b"></span>--}}
{{--                                    <span>SR</span>--}}
{{--                                </div>--}}
{{--                                <div class="flex items-center">--}}
{{--                                    <span class="inline-block w-3 h-3 mr-1 rounded-full" style="background-color: #8b57bc"></span>--}}
{{--                                    <span>IS</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        --}}{{--순위--}}
{{--                        <div class="flex-initial flex-wrap">--}}
{{--                            <?php $i=1 ?>--}}
{{--                            @foreach($sorted_active as $sorted_active_row)--}}
{{--                                <div class="group mb-3 text-sm ">--}}
{{--                                    <span class="inline-block bg-gray-200 rounded w-6 h-6 text-center ">{{$i}}</span>--}}
{{--                                    <span class="text-wrap"> {{$sorted_active_row['name']}}</span>--}}
{{--                                </div>--}}
{{--                                    <?php $i++ ?>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div--}}
{{--                        class="min-w-0 p-4 bg-white rounded-lg shadow-xs "--}}
{{--                >--}}
{{--                    <h4 class="mb-4 font-semibold text-gray-800 ">--}}
{{--                        Traffic--}}
{{--                    </h4>--}}
{{--                    <canvas id="line"></canvas>--}}
{{--                    <div--}}
{{--                            class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 "--}}
{{--                    >--}}
{{--                        <!-- Chart legend -->--}}
{{--                        <div class="flex items-center">--}}
{{--                    <span--}}
{{--                            class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"--}}
{{--                    ></span>--}}
{{--                            <span>Organic</span>--}}
{{--                        </div>--}}
{{--                        <div class="flex items-center">--}}
{{--                    <span--}}
{{--                            class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"--}}
{{--                    ></span>--}}
{{--                            <span>Paid</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </main>

    <script>
        {{--$(document).ready(function(){--}}
        {{--    const AppInstallPieConfig = {--}}
        {{--        type: 'doughnut',--}}
        {{--        data: {--}}
        {{--            datasets: [--}}
        {{--                {--}}
        {{--                    data: [{{$kq_install}}, {{$kl_install}}, {{$nb_install}}, {{$sr_install}}, {{$is_install}}, {{$sk_install}}],--}}
        {{--                    /**--}}
        {{--                     * These colors come from Tailwind CSS palette--}}
        {{--                     * https://tailwindcss.com/docs/customizing-colors/#default-color-palette--}}
        {{--                     */--}}
        {{--                    backgroundColor: ['#f2c611', '#e8812d', '#5fa55b', '#50679b', '#8b57bc', '#EF4444'],--}}
        {{--                    label: 'Dataset 1',--}}
        {{--                },--}}
        {{--            ],--}}
        {{--            labels: ['KQ', 'KL', 'NB', 'SR', 'IS', 'SK'],--}}
        {{--        },--}}
        {{--        options: {--}}
        {{--            responsive: true,--}}
        {{--            cutoutPercentage: 50,--}}
        {{--            /**--}}
        {{--             * Default legends are ugly and impossible to style.--}}
        {{--             * See examples in charts.html to add your own legends--}}
        {{--             *  */--}}
        {{--            legend: {--}}
        {{--                display: false,--}}
        {{--            },--}}
        {{--        },--}}
        {{--    }--}}

        {{--    // change this to the id of your chart element in HMTL--}}
        {{--    const AppInstallPie = document.getElementById('app_install_pie');--}}
        {{--    window.myPie = new Chart(AppInstallPie, AppInstallPieConfig);--}}
        {{--});--}}
        {{--$(document).ready(function(){--}}
        {{--    const AppInstallPieConfig = {--}}
        {{--        type: 'doughnut',--}}
        {{--        data: {--}}
        {{--            datasets: [--}}
        {{--                {--}}
        {{--                    data: [{{$kq_active}}, {{$kl_active}}, {{$kb_active}}, {{$sr_active}}, {{$is_active}}],--}}
        {{--                    /**--}}
        {{--                     * These colors come from Tailwind CSS palette--}}
        {{--                     * https://tailwindcss.com/docs/customizing-colors/#default-color-palette--}}
        {{--                     */--}}
        {{--                    backgroundColor: ['#f2c611', '#e8812d', '#5fa55b', '#50679b', '#8b57bc'],--}}
        {{--                    label: 'Dataset 1',--}}
        {{--                },--}}
        {{--            ],--}}
        {{--            labels: ['KQ', 'KL', 'KB', 'SR', 'IS'],--}}
        {{--        },--}}
        {{--        options: {--}}
        {{--            responsive: true,--}}
        {{--            cutoutPercentage: 50,--}}
        {{--            /**--}}
        {{--             * Default legends are ugly and impossible to style.--}}
        {{--             * See examples in charts.html to add your own legends--}}
        {{--             *  */--}}
        {{--            legend: {--}}
        {{--                display: false,--}}
        {{--            },--}}
        {{--        },--}}
        {{--    }--}}

        {{--    // change this to the id of your chart element in HMTL--}}
        {{--    const AppInstallPie = document.getElementById('app_active_pie');--}}
        {{--    window.myPie = new Chart(AppInstallPie, AppInstallPieConfig);--}}
        {{--});--}}
    </script>
@endsection
