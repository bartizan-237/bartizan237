<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include("layouts.html_head")

    <!-- Naver Webmaster -->
    <meta name="naver-site-verification" content="9f187befa336e371c6d7a39df8bf86123f9e2a93" />
    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="w-full h-screen antialiased leading-none">
    <div class="h-full bg-gradient-to-tl from-green-400 to-indigo-900 w-full py-16 px-4">
        <div class="flex flex-col items-center justify-center">
            <div class="bg-white shadow rounded lg:w-1/3  md:w-1/2 w-full p-10 mt-16">
                <form id="form">
                    @csrf
                    <div class="mb-3">
                        <label id="name" class="text-sm font-medium leading-none text-gray-800">
                            이름
                        </label>
                        <input type="text" name="name" class="bg-gray-200 border rounded text-xs font-medium leading-none text-gray-800 py-3 w-full pl-3 mt-2"/>
                    </div>
                    <div class="mb-3">
                        <label id="district" class="text-sm font-medium leading-none text-gray-800">
                            권역/지교회
                        </label>
                        <input type="text" name="district" class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 py-3 w-full pl-3 mt-2"/>
                    </div>
                    <div class="mb-3">
                        <label id="position" class="text-sm font-medium leading-none text-gray-800">
                            직분
                        </label>
                        <div>
                            <label class="ml-2 my-2 block ">
                                <input type="radio" name="position" value="장로" class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 p-2"/>
                                장로
                            </label>

                            <label class="ml-2 my-2 block ">
                                <input type="radio" name="position" value="권사" class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 p-2"/>
                                권사
                            </label>

                            <label class="ml-2 my-2 block ">
                                <input type="radio" name="position" value="안수집사" class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 p-2"/>
                                안수집사
                            </label>

                            <label class="ml-2 my-2 block ">
                                <input type="radio" name="position" value="RT" class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 p-2"/>
                                렘넌트
                            </label>

                            <label class="ml-2 my-2 block ">
                                <input type="radio" name="position" value="성도" class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 p-2"/>
                                성도
                            </label>
                        </div>

                    </div>
                    <div class="mb-3">
                        <label id="bartizan_id" class="text-sm font-medium leading-none text-gray-800">
                            나의 237 나라
                        </label>
                        <select type="text" name="bartizan_id" class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 py-3 w-full pl-3 mt-2">
                            @foreach($bartizans as $bartizan)
                                <option value="{{$bartizan->id}}">{{$bartizan->dashboard_id}} {{$bartizan->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-8">
                        <button role="button" class="focus:ring-2 focus:ring-offset-2 focus:ring-green-700 text-sm font-semibold leading-none text-white focus:outline-none bg-green-700 border rounded hover:bg-green-600 py-4 w-full">
                            작정 등록하기
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

<script>
    $('#form').submit(function(event){
        event.preventDefault();

        var formData = $(this).serialize();
        console.log("formData", formData);
        $.ajax({
            url: '/watchman',
            type: 'POST',
            data: formData,
            success: function(response) {
                console.log("SUCCESS", response);
                alert(response.message);
                location.reload()
            },
            error: function(error) {
                console.log('에러 발생: ' + error.statusText);
            }
        });
    });
</script>

</html>
