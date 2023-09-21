<div class="mx-auto px-4 bg-white">
    <div class="flex flex-col items-center">
        <h2 class="font-bold text-xl mt-3 tracking-tight">
            세계망대 Q&A
        </h2>
        <p class="text-gray-800 text-xs mt-2">
            세계망대에 대한 질문과 답
        </p>
    </div>
    <div class="grid divide-y divide-neutral-200 mx-auto mt-2">
        @foreach($faqs as $i => $faq)
        <div class="py-3">
            <details class="group">
                <summary class="flex text-gray-900 text-sm font-bold justify-between items-center cursor-pointer list-none">
                    <span style="font-size: 15px; line-height: 20px">
                        Q{{$i+1}}. {{$faq['question']}}
                    </span>
                    <span class="transition duration-1000 group-open:rotate-180"><svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg></span>
                </summary>
                <p class="text-gray-800 mt-3 px-2 group-open:animate-fadeIn" style="font-size: 13px; line-height: 20px; word-break: keep-all">
                    {!! $faq['answer'] !!}
                </p>
            </details>
        </div>
        @endforeach
    </div>
</div>
