@extends('layouts.bartizan')

@section('content')
    <link href="{{ mix('css/bartizan/create.css') }}" rel="stylesheet">
    <input type="hidden" id="bartizan_id" value="{{$bartizan->id}}">
    <input type="hidden" id="post_id" value="{{$post->id}}">

    <main class="container py-2" style="margin-top:-50px; padding-bottom: 50px;">
        <button class="bg-green-500 text-white rounded-full text-2xl font-bold" style="position: fixed; line-height: 15px; font-size: 15px; width: 30px; height: 30px; right:30px; bottom:100px;" onclick="location.href='/post/create?bartizan_id='{{$bartizan->id}}">+</button>
        <article class="flex flex-col bg-white w-full" style="padding-bottom: 100px;">
            <div class="p-3 bg-gray-50">
                    <!-- TITLE -->
                <div class="px-3 py-2">
                    <p style="font-size : 16px; line-height: 24px" class="text-gray-900 title-font">{{$post->title}}</p>
                </div>

                <div class="flex border-t border-gray-100 px-3 py-2 text-gray-700">
                    <div class="w-1/2 left-0">
                        <p style="font-size:12px;" class="inline-block mr-2  ">
                            @if(isset($post->user_id))
                                <span style="font-size:14px; color:#222">{{$post->getUserNickName()}}</span>,
                            @endif
                            {{$post->getCreatedAt()}}
                        </p>
                    </div>
                    <div class="w-1/2 right-0 text-right">
                        <a style="font-size:12px;" class="inline-block mr-2  ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            {{$post->hit}}
                        </a>
                        <a style="font-size:12px;" class="inline-block mr-2  ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                            </svg>
                            {{$post->getLikes()->count()}}
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

            <!-- CONTENT -->
            <div class="p-3 bg-gray-50 ql-editor ql-snow text-sm">
                {!! $post->content !!}
            </div>

            <!-- COMMENTS -->
            <div class="p-3">
                <div id="commentList" class="flex flex-col">
                    @forelse($post->getComments() as $comment)
                        <div class="flex-col p-3 mb-2 border-b border-gray-300">
                            <div>
                                <p class="text-gray-700 mb-1" style="font-size: 12px">{{$comment->writer}}</p>
                                <p class="text-gray-900 mb-1" style="font-size: 14px">{{$comment->content}}</p>
                            </div>
                            <div>
                                <a style="font-size:12px;" class="inline-block mr-3  ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{$comment->getCreatedAt()}}
                                </a>
                                <a style="font-size:12px;" class="inline-block mr-3  ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                    </svg>
                                    {{$comment->like}}
                                </a>

                                @if(\Auth::user() AND \Auth::user()->id == $comment->user_id)
                                <a
                                    @click="deleteComment({{$comment->id}})"
                                    style="font-size:12px;" class="inline-block ml-1 text-red-500  ">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 inline-block"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    댓글삭제
                                </a>
                                @endif
{{--                                <a style="font-size:12px;" class="inline-block mr-3  ">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />--}}
{{--                                    </svg>--}}
{{--                                    대댓글--}}
{{--                                </a>--}}
                            </div>
                        </div>
                    @empty
                        <div class="flex-col p-3 mb-2 border-b border-gray-300">
                            <div>
                                <p class="text-gray-700 mb-1">등록된 댓글이 없습니다😢</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>


        </article>
    </main>


    @if(\Auth::user() AND \Auth::user()->id == $post->user_id)
    <div class="z-10 fixed bg-gray-50 flex flex-col" style="bottom:140px; height: 40px; width: 100%; max-width: 500px;">
        <div id="userActionApp" class="p-2 post-action-nav">
            <div class="flex flex-wrap">
                <!-- 게시글 수정 -->
                <div class="w-1/2 text-blue-500 text-sm text-center cursor-pointer">
                    <button @click="editPost">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 inline-block mr-1" ><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                        게시글 수정
                    </button>
                </div>
                <div class="w-1/2 text-red-500 text-sm text-center cursor-pointer">
                    <button @click="deletePost">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 inline-block mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        게시글 삭제
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif


    <div class="z-10 fixed bg-gray-50 flex flex-col" style="bottom:60px; height: 80px; width: 100%; max-width: 500px;">
        <!-- ACTION -->
        <div id="postApp" class="p-2 post-action-nav">
            <input type="hidden" id="like_by_this_user" value="{{$post->like_by_this_user ?? 0}}">
            <div class="flex flex-wrap">
                <div @click="clickLike"
                     :class="{'text-green-500' : is_like, 'text-gray-500' : !is_like}"
                     class="w-1/2 text-sm text-center cursor-pointer" style="border-right: 1px solid #DDD">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                    </svg>
                    좋아요
                </div>
                <div @click="shareTo"
                     class="w-1/2 text-gray-500 text-sm text-center cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                    </svg>
                    공유하기
                </div>
            </div>
        </div>

        <!-- CREATE COMMENT AREA -->
        <div id="commentApp" class="p-1 flex post-comment-nav">
            <div class="p-1 flex-none " style="width: 30px;">
                <svg xmlns="http://www.w3.org/2000/svg" class="" style="width: 24px; height: 24px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                </svg>
            </div>
            <div class="" style="flex-grow : 1">
                <textarea id="comment_text" v-model="comment_text" rows="1" class="inline-block p-1 text-sm w-full" style="resize: none;" placeholder="댓글 쓰기"></textarea>
            </div>
            <div class="p-1 flex-none" style="width: 40px; padding-right: 15px;">
                <button id="create_comment_btn" @click="createComment">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                </button>
            </div>
        </div>
    </div>

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="{{ asset('js/post/show.js') }}" defer></script>

@endsection
