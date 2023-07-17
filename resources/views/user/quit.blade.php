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
            <a class="text-gray-700 font-bold py-2 px-8 hover:text-green-900 rounded text-lg hover:underline hover:underline-offset-4"
               href="{{ route('quit') }}" onclick="if(!confirm('정말로 회원 탈퇴하시겠습니까?')) { event.preventDefault(); document.getElementById('quit-form').submit(); }">
                회원 탈퇴
            </a>
        </div>

        <form id="quit-form" action="{{ route('quit') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </section>


    <script>

    </script>

@endsection
