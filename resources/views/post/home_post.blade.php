@foreach($posts as $post)
<div class="w-full mb-2 ">
    <div class="py-1 bg-white border-b border-gray-100">
        <!-- TITLE -->
        <p style="font-size : 14px; line-height: 20px" class="text-gray-900 font-medium title-font">
            <span style="font-size: 11px; padding : 3px 5px; border-radius: 4px" class="text-xs font-bold mr-1 text-white bg-{{$post->getBartizan()->getThemeColor()}}">{{$post->getBartizan()->name}}</span>
            {{$post->title}}
        </p>
{{--        <div style="font-size : 11px; line-height: 20px; height: 40px; width: 100%; overflow:hidden; text-overflow:ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;"--}}
{{--             class="text-gray-700 px-3 py-1">--}}
{{--            {{strip_tags($post->content)}}--}}
{{--        </div>--}}
        <div class="flex py-2 text-gray-700">
            <div class="w-1/2 left-0">
                <a style="font-size:12px;" class="inline-block mr-2">{{$post->getCreatedAt()}}</a>
            </div>
            <div class="w-1/2 right-0 text-right">
                <a style="font-size:12px;" class="inline-block mr-2  ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    {{number_format($post->hit)}}
                </a>
                <a style="font-size:12px;" class="inline-block mr-2  ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                    </svg>
                    {{number_format($post->like)}}
                </a>
                <a style="font-size:12px;" class="inline-block mr-2  ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                    {{number_format($post->getCommentsCount())}}
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach