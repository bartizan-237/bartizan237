<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        info($request);

        $data = $request->data;

        if($user_row = User::find($data['user_id'])){
            if(!isset($data['comment_text'])){
                return response()->json([
                    'code' => 302
                ]);
            }

            Comment::create([
                'post_id' => $data['post_id'],
                'user_id' => $data['user_id'],
                'parent_comment_id' => $data['parent_comment_id'] ?? null,
                'writer' => $user_row->nickname,
                'content' => $data['comment_text'],
            ]);

            return response()->json([
                'code' => 200
            ]);
        }else{
            return response()->json([
                'code' => 301
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    public function destroy(Request $request)
    {
        info(__METHOD__);
        info($request);

        $data = $request->data;
        if($user = \Auth::user()){
            $comment = Comment::find($data['comment_id']);
            info("SESSION USER ID = " . $user->id);
            if($user->id == $comment->user_id){
                $comment->delete();
                return response()->json([
                    'code' => 200,
                ]);
            } else {
                return response()->json([ 'code' => 301, "message" => "게시글을 삭제할 권한이 없습니다."]);
            }
        }else {
            return response()->json([ 'code' => 301, "message" => "게시글을 삭제할 권한이 없습니다."]);
        }
    }
}
