<!-- BOTTOM NAV BAR -->
<div class="flex flx-wrap bg-white fixed bottom-0 w-full border-t border-gray-200 flex" style="max-width:500px; margin:0 auto; z-index: 10; height: 60px">
{{--    <a id="nav_main" href="/home" class="nav_btn w-1/5  cursor-pointer flex flex-grow items-center justify-center p-2 @if(str_contains($_SERVER["REQUEST_URI"], "/home")) text-green-500 @else text-gray-800 @endif active:text-theme-01">--}}
    <a id="nav_main" onclick="toast('info', '준비 중 입니다')" class="nav_btn w-1/5  cursor-pointer flex flex-grow items-center justify-center p-2 @if(str_contains($_SERVER["REQUEST_URI"], "/home")) text-green-500 @else text-gray-800 @endif active:text-theme-01">
        <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mb-1" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
            </svg>
            <span class="block text-xs leading-none">홈</span>
        </div>
    </a>

{{--    <a id="" href="#" onclick="toast('normal', '준비중입니다😂')" class="nav_btn w-1/5  cursor-pointer flex flex-grow items-center justify-center p-2 text-gray-800 active:text-theme-01">--}}
{{--        <div class="text-center">--}}
{{--            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mb-1" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />--}}
{{--            </svg>--}}
{{--            <span class="block text-xs leading-none">검색</span>--}}
{{--        </div>--}}
{{--    </a>--}}

    <a id="" href="/bartizan" class="nav_btn w-1/5  cursor-pointer flex flex-grow items-center justify-center p-2
            @if(str_contains($_SERVER["REQUEST_URI"], "/bartizan") AND !str_contains($_SERVER["REQUEST_URI"], "/user")) text-green-500 @else text-gray-800 @endif active:text-theme-01">
{{--    <a id="" onclick="toast('info', '준비 중 입니다')" class="nav_btn w-1/5  cursor-pointer flex flex-grow items-center justify-center p-2 @if(str_contains($_SERVER["REQUEST_URI"], "/bartizan")) text-green-500 @else text-gray-800 @endif active:text-theme-01">--}}
        <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg"  class="h-5 w-5 inline-block mb-1" viewBox="0 0 107.5 122.88" fill="none" stroke="currentColor" stroke-width="5" ><path d="M67.18 16.1v20.53h1.7c.67 0 1.27.27 1.71.71.44.44.71 1.04.71 1.71v8.74h1.8c.82 0 1.48.66 1.49 1.47l5.57 57c1.78.12 3.25.89 4.41 2.05 1.35 1.35 2.25 3.26 2.7 5.29l1.65 7.47c.18.8-.33 1.59-1.13 1.77-.11.02-.21.04-.32.04v.01H18.61a1.494 1.494 0 01-1.43-1.91l1.89-7.42c.51-2.01 1.41-3.91 2.77-5.28 1.13-1.13 2.56-1.88 4.31-2.01l4.93-57.11c.07-.78.72-1.36 1.49-1.36h2.49v-8.74c0-.67.27-1.27.71-1.71.44-.44 1.04-.71 1.71-.71h1.7V16.1h-1.82a1.494 1.494 0 01-1.27-2.27c1.68-3.2 4.15-5.88 7.12-7.75 2.52-1.58 5.4-2.58 8.48-2.83V1.49c0-.82.67-1.49 1.49-1.49s1.49.67 1.49 1.49v1.76c3.08.25 5.96 1.25 8.48 2.83 3.01 1.89 5.49 4.6 7.18 7.85.38.73.09 1.63-.64 2-.22.11-.45.17-.68.17h-1.83zM30.32 92.58l44.74-6.37.28 1.3-.96-9.86-42.62 6.01c-.22.03-.45.03-.67.01l-.77 8.91zm45.45-.7l-45.95 6.55-.67 7.81h48.03l-1.41-14.36zM31.59 77.89L73.37 72c.15-.02.3-.03.45-.02l-.86-8.85-40.56 5.32-.81 9.44zm1.31-15.27l39.5-5.18-.65-6.67H33.93L32.9 62.62zm45.16-30.14a2.223 2.223 0 01-1.46-2.78 2.223 2.223 0 012.78-1.46l26.56 8.32c1.17.36 1.82 1.61 1.46 2.78a2.223 2.223 0 01-2.78 1.46l-26.56-8.32zm1.63-14.77c-1.1.54-2.43.08-2.96-1.02-.54-1.1-.08-2.43 1.02-2.96l25.81-12.64c1.1-.54 2.43-.08 2.96 1.02.54 1.1.08 2.43-1.02 2.96L79.69 17.71zM28.12 28.24c1.17-.36 2.42.29 2.78 1.46.36 1.17-.29 2.42-1.46 2.78L2.88 40.79C1.71 41.15.46 40.5.1 39.33c-.36-1.17.29-2.42 1.46-2.78l26.56-8.31zm1.63-14.51c1.1.54 1.55 1.86 1.02 2.96a2.219 2.219 0 01-2.96 1.02L1.99 5.07a2.215 2.215 0 011.95-3.98l25.81 12.64zm24.91 2.88v19.5h9.55v-19.5h-9.55zm-2.98 19.51v-19.5h-9.55v19.5h9.55z"/></svg>
            <span class="block text-xs leading-none">세계망대</span>
        </div>
    </a>

{{--    <a id="" href="/nation/main" class="nav_btn w-1/5  cursor-pointer flex flex-grow items-center justify-center p-2 @if(str_contains($_SERVER["REQUEST_URI"], "/nation")) text-green-500 @else text-gray-800 @endif active:text-theme-01">--}}
    <a id="" onclick="toast('info', '준비 중 입니다')" class="nav_btn w-1/5  cursor-pointer flex flex-grow items-center justify-center p-2 text-gray-800 active:text-theme-01">
        <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mb-1 feather feather-flag" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line></svg>
            <span class="block text-xs leading-none">237나라</span>
        </div>
    </a>

{{--    <a id="" href="/fields" class="nav_btn w-1/5  cursor-pointer flex flex-grow items-center justify-center p-2 @if(isset($now) AND $now == "fields") text-green-500 @else text-gray-800 @endif active:text-theme-01">--}}
{{--        <div class="text-center">--}}
{{--            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 inline-block mb-1 feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>--}}
{{--            <span class="block text-xs leading-none">관심분야</span>--}}
{{--        </div>--}}
{{--    </a>--}}

{{--    <a id="" href="#" onclick="toast('normal', '준비중입니다😂')" class="nav_btn w-1/5  cursor-pointer flex flex-grow items-center justify-center p-2 text-gray-800 active:text-theme-01">--}}
{{--        <div class="text-center">--}}
{{--            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mb-1" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />--}}
{{--            </svg>--}}
{{--            <span class="block text-xs leading-none">알림</span>--}}
{{--        </div>--}}
{{--    </a>--}}

{{--    <a id="" href="/user/my_page" class="nav_btn w-1/5  cursor-pointer flex flex-grow items-center justify-center p-2 @if(str_contains($_SERVER["REQUEST_URI"], "/user")) text-green-500 @else text-gray-800 @endif active:text-theme-01">--}}
    <a onclick="toast('info', '준비 중 입니다')" class="nav_btn w-1/5  cursor-pointer flex flex-grow items-center justify-center p-2 @if(str_contains($_SERVER["REQUEST_URI"], "/user")) text-green-500 @else text-gray-800 @endif active:text-theme-01">
        <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mb-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
            </svg>
            <span class="block text-xs leading-none" style="font-size: 0.7em">마이페이지</span>
        </div>
    </a>

</div>
