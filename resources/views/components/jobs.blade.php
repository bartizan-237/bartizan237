<div class="mx-auto flex flex-wrap">
    <div class="w-1/2 border border-1 border-gray-100">
        <ul class="bg-gray-100">
            @foreach($fields as $industry => $jobs)
                <li class=" @if($industry == "기획전략") selected_industry @endif ">
                    <button class="w-full px-3 py-2 text-left text-sm text-gray-600"> {{$industry}} </button>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="w-1/2 overflow-scroll border border-1 border-gray-100">
        @foreach($fields as $industry => $jobs)
            <ul class=" @if($industry != "기획전략") hidden @endif">
                @foreach($jobs as $job)
                    <li>
                        <button class="w-full px-3 py-2 text-left text-sm text-gray-900"> {{$job->name}} </button>
                    </li>
                @endforeach
            </ul>
        @endforeach
    </div>
</div>
