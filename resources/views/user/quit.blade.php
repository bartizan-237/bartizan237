@extends('layouts.app')

@section('content')


    <style>
        .required:after {
            content:" *";
            color: red;
        }
    </style>

    <section class="w-full mt-12">
        <div class="p-2 mx-auto text-center items-center ">
            <a class="text-red-500 font-bold py-2 px-8 hover:text-red-300 rounded text-lg hover:underline hover:underline-offset-4"
               href="{{ route('quit') }}"
               onclick="confirmQuit()">
                회원 탈퇴하기
            </a>
        </div>

        <form id="quit-form" action="{{ route('quit') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </section>


    <script>
        function confirmQuit(event) {
            if (!confirm('정말로 회원 탈퇴하시겠습니까?')) {
                return false;
            }
            event.preventDefault();
            document.getElementById('quit-form').submit();
        }

    </script>

@endsection
