<li class="relative px-6 py-3">
    @if(strpos($_SERVER['REQUEST_URI'], "/admin/bartizan") !== false)
        <span class="absolute inset-y-0 left-0 w-1 bg-green-600  rounded-tr-lg rounded-br-lg" aria-hidden="true" ></span>
    @endif

    <button
            class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 "
            @click="togglePagesMenu1"
            aria-haspopup="true"
    >
                <span class="inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg"  class="h-5 w-5 inline-block mb-1" viewBox="0 0 107.5 122.88" fill="none" stroke="currentColor" stroke-width="5" ><path d="M67.18 16.1v20.53h1.7c.67 0 1.27.27 1.71.71.44.44.71 1.04.71 1.71v8.74h1.8c.82 0 1.48.66 1.49 1.47l5.57 57c1.78.12 3.25.89 4.41 2.05 1.35 1.35 2.25 3.26 2.7 5.29l1.65 7.47c.18.8-.33 1.59-1.13 1.77-.11.02-.21.04-.32.04v.01H18.61a1.494 1.494 0 01-1.43-1.91l1.89-7.42c.51-2.01 1.41-3.91 2.77-5.28 1.13-1.13 2.56-1.88 4.31-2.01l4.93-57.11c.07-.78.72-1.36 1.49-1.36h2.49v-8.74c0-.67.27-1.27.71-1.71.44-.44 1.04-.71 1.71-.71h1.7V16.1h-1.82a1.494 1.494 0 01-1.27-2.27c1.68-3.2 4.15-5.88 7.12-7.75 2.52-1.58 5.4-2.58 8.48-2.83V1.49c0-.82.67-1.49 1.49-1.49s1.49.67 1.49 1.49v1.76c3.08.25 5.96 1.25 8.48 2.83 3.01 1.89 5.49 4.6 7.18 7.85.38.73.09 1.63-.64 2-.22.11-.45.17-.68.17h-1.83zM30.32 92.58l44.74-6.37.28 1.3-.96-9.86-42.62 6.01c-.22.03-.45.03-.67.01l-.77 8.91zm45.45-.7l-45.95 6.55-.67 7.81h48.03l-1.41-14.36zM31.59 77.89L73.37 72c.15-.02.3-.03.45-.02l-.86-8.85-40.56 5.32-.81 9.44zm1.31-15.27l39.5-5.18-.65-6.67H33.93L32.9 62.62zm45.16-30.14a2.223 2.223 0 01-1.46-2.78 2.223 2.223 0 012.78-1.46l26.56 8.32c1.17.36 1.82 1.61 1.46 2.78a2.223 2.223 0 01-2.78 1.46l-26.56-8.32zm1.63-14.77c-1.1.54-2.43.08-2.96-1.02-.54-1.1-.08-2.43 1.02-2.96l25.81-12.64c1.1-.54 2.43-.08 2.96 1.02.54 1.1.08 2.43-1.02 2.96L79.69 17.71zM28.12 28.24c1.17-.36 2.42.29 2.78 1.46.36 1.17-.29 2.42-1.46 2.78L2.88 40.79C1.71 41.15.46 40.5.1 39.33c-.36-1.17.29-2.42 1.46-2.78l26.56-8.31zm1.63-14.51c1.1.54 1.55 1.86 1.02 2.96a2.219 2.219 0 01-2.96 1.02L1.99 5.07a2.215 2.215 0 011.95-3.98l25.81 12.64zm24.91 2.88v19.5h9.55v-19.5h-9.55zm-2.98 19.51v-19.5h-9.55v19.5h9.55z"/></svg>
                  <span class="ml-4">망대 관리</span>
                </span>
        <svg
                class="w-4 h-4"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
        >
            <path
                    fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"
            ></path>
        </svg>
    </button>
    <template x-if="isPagesMenuOpen1">
        <ul
                x-transition:enter="transition-all ease-in-out duration-300"
                x-transition:enter-start="opacity-25 max-h-0"
                x-transition:enter-end="opacity-100 max-h-xl"
                x-transition:leave="transition-all ease-in-out duration-300"
                x-transition:leave-start="opacity-100 max-h-xl"
                x-transition:leave-end="opacity-0 max-h-0"
                class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50  "
                aria-label="submenu"
        >
            <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800  @if($_SERVER['REQUEST_URI'] == "/admin/bartizan")  text-green-600 font-bold @endif" >
                <a class="w-full" href="/admin/bartizan">
                    전체
                </a>
            </li>
            <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800  @if(strpos($_SERVER['REQUEST_URI'], "/admin/bartizans?continent=asia") !== false)  text-green-600 font-bold @endif" >
                <a class="w-full" href="/admin/bartizan?continent=asia">
                    아시아
                </a>
            </li>
            <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800  @if(strpos($_SERVER['REQUEST_URI'], "/admin/bartizan/europe") !== false)  text-green-600 font-bold @endif" >
                <a class="w-full" href="/admin/bartizan?continent=europe">
                    유럽
                </a>
            </li>
            <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800  @if(strpos($_SERVER['REQUEST_URI'], "/admin/bartizan?continent=america") !== false)  text-green-600 font-bold @endif" >
                <a class="w-full" href="/admin/bartizan?continent=america">
                    아메리카
                </a>
            </li>
            <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800  @if(strpos($_SERVER['REQUEST_URI'], "/admin/bartizan?continent=oceania") !== false)  text-green-600 font-bold @endif" >
                <a class="w-full" href="/admin/bartizan?continent=oceania">
                    오세아니아
                </a>
            </li>
            <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800  @if(strpos($_SERVER['REQUEST_URI'], "/admin/bartizan?continent=africa") !== false)  text-green-600 font-bold @endif" >
                <a class="w-full" href="/admin/bartizan?continent=africa">
                    아프리카
                </a>
            </li>
        </ul>
    </template>
</li>
