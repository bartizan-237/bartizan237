<!-- BOTTOM NAV BAR -->
<div class="flex flx-wrap bg-white fixed bottom-0 w-full border-t border-gray-50 flex" style="max-width:500px; margin:0 auto; z-index: 10; height: 60px">
    <a id="nav_main" href="/home" class="nav_btn w-1/5  cursor-pointer flex flex-grow items-center justify-center p-2 text-gray-800 active:text-theme-01">
        <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mb-1" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
            </svg>
            <span class="block text-xs leading-none">홈</span>
        </div>
    </a>
    <a id="" href="#" onclick="toast('normal', '준비중입니다😂')" class="nav_btn w-1/5  cursor-pointer flex flex-grow items-center justify-center p-2 text-gray-800 active:text-theme-01">
        <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mb-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
            <span class="block text-xs leading-none">검색</span>
        </div>
    </a>
    <a id="" href="/ddeul" class="nav_btn w-1/5  cursor-pointer flex flex-grow items-center justify-center p-2 @if(isset($now) AND $now == "ddeul") text-green-500 @else text-gray-800 @endif active:text-theme-01">
        <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mb-1 feather feather-flag" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line>
            </svg>
            <span class="block text-xs leading-none">뜰</span>
        </div>
    </a>
    <a id="" href="#" onclick="toast('normal', '준비중입니다😂')" class="nav_btn w-1/5  cursor-pointer flex flex-grow items-center justify-center p-2 text-gray-800 active:text-theme-01">
        <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mb-1" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
            </svg>
            <span class="block text-xs leading-none">알림</span>
        </div>
    </a>
    <a id="" href="/user/my_page" class="nav_btn w-1/5  cursor-pointer flex flex-grow items-center justify-center p-2 text-gray-800 active:text-theme-01">
        <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mb-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
            </svg>
            <span class="block text-xs leading-none" style="font-size: 0.7em">마이페이지</span>
        </div>
    </a>

</div>
