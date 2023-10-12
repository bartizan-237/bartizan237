<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>임마누엘교회 세계망대</title>
<meta name="description" content="237나라에 망대를 세우는 세계망대플랫폼입니다.">
<meta property="og:type" content="website">
<meta property="og:title" content="임마누엘교회 세계망대">
<meta property="og:description" content="237나라에 망대를 세우는 임마누엘교회의 세계망대플랫폼입니다.">
<meta property="og:image" content="https://kr.object.ncloudstorage.com/immanuel/bartizan/image/ogimage.png">
{{--<meta name="og:image" content="https://kr.object.ncloudstorage.com/immanuel/bartizan/image/bartizan_logo.png">--}}
{{--<meta name="og:image" content="https://platform.237.co.kr/image/ogimage.png">--}}
<meta property="og:url" content="https://platform.237.co.kr">

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Styles -->
<link href="{{ mix('css/app.css') }}" rel="stylesheet">
<link href="{{ mix('css/main.css') }}" rel="stylesheet">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Nanum+Myeongjo:wght@400;700&display=swap" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<input id="user_id" type="hidden" value="{{Auth::user()->id ?? ''}}">

<style>
    .watchmen-modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 30% auto;
        padding: 20px;
        /*border: 1px solid #888;*/
        width: 51%;
    }

    /* 버튼 스타일 */
    /*button {*/
    /*    margin-right: 10px;*/
    /*}*/
</style>
