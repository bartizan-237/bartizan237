<script>
    $(document).ready(function (){
        // 메뉴 진입 시 SideBar 열어두기
        // var url = window.location.href;
        // var menus = $("aside button");
        //     menus[0].click();
    });
</script>

<aside
        id="pc_aside"
        class="z-20 hidden w-64 overflow-y-auto bg-white  md:block flex-shrink-0"
>
    <div class="text-gray-500 ">
        <a
                class="flex h-16 items-center justify-center text-lg font-bold text-gray-800 "
                href="/dashboard"
        >
            <img class="h-6 " src="https://kr.object.ncloudstorage.com/immanuel/bartizan/image/bartizan_logo.png" alt="채티스 로고" />
        </a>
        <ul class="mt-3">
            <li class="relative px-6 py-3">
              <span
                      class="absolute inset-y-0 left-0 w-1 bg-purple-600  rounded-tr-lg rounded-br-lg"
                      aria-hidden="true"
              ></span>
                <a
                        class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800  "
                        href="/dashboard"
                >
                    <svg
                            class="w-5 h-5"
                            aria-hidden="true"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                    >
                        <path
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                        ></path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
        </ul>

        <ul>
            @include('admin.components.side_menu_list')
        </ul>

    </div>
</aside>
<!-- Mobile sidebar -->

<!-- Backdrop -->
<div
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
></div>

<aside
        id="mobile_aside"
        class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white  md:hidden"
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20"
        @click.away="closeSideMenu"
        @keydown.escape="closeSideMenu"
>
    <div class="text-gray-500 ">
        <a class="flex h-16 items-center text-lg font-bold text-gray-800 " href="/dashboard">
            <img class="h-6 pl-6 " src="https://kr.object.ncloudstorage.com/immanuel/bartizan/image/bartizan_logo.png" alt="로고" />
            <img class="h-6 pl-6 hidden " src="https://kr.object.ncloudstorage.com/immanuel/bartizan/image/bartizan_logo.png" alt="로고" />
        </a>
        <ul class="">
            <li class="relative px-6 py-3">
              <span
                      class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                      aria-hidden="true"
              ></span>
                <a
                        class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800  "
                        href="/dashboard"
                >
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" ><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" ></path></svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
        </ul>
        <ul>
           @include('admin.components.side_menu_list')
        </ul>

    </div>
</aside>


<div class="flex flex-col flex-1 w-full">
    <header class="z-10 py-4 bg-white shadow-md ">
        <div
                class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 "
        >
            @if(Route::currentRouteName())
                <h2
                        class="text-2xl font-semibold text-gray-700 "
                >
                    {{Route::currentRouteName()}}
                </h2>
            @endif
            <!-- Mobile hamburger -->
            <button
                    class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
                    @click="toggleSideMenu"
                    aria-label="Menu"
            >
                <svg
                        class="w-6 h-6"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                >
                    <path
                            fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"
                    ></path>
                </svg>
            </button>

                <div class="h-6"> </div>


        </div>
    </header>
