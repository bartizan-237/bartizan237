<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Bartizan;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('post.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(isset($request->bartizan_id)){
            $bartizan = Bartizan::find($request->bartizan_id);
        }else{
            $bartizan = null;
        }
        return view("post.create", [
            'bartizan' => $bartizan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = \Auth::user();
        if($user){
            $user_id = $user->id;
        }else{
            $user_id = null;
        }

        info($request);

        $data = $request->data;

        Post::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'bartizan_id' => $data['bartizan_id'],
            'user_id' => $user_id,
        ]);

        if($bartizan = Bartizan::find($data['bartizan_id'])){
            $bartizan->update([
                'post_uploaded_at' => now()
            ]);
        }


        return response()->json([
            'code' => 200
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->increment("hit");

        $bartizan = Bartizan::find($post->bartizan_id);
        return view("post.show", [
            "post" => $post,
            "bartizan" => $bartizan
        ]);
    }

    public function posts(Post $post)
    {
        $posts = Post::where("post_id", $post->id)->orderBy('id', 'desc')->paginate(10);
        return view("post.posts", [
            "post" => $post,
            "posts" => $posts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        info(__METHOD__ . " POST ID = " . $post->id . " | Writer User ID = " . $post->user_id);
        if($user = \Auth::user()){
            info("SESSION USER ID = " . $user->id);
            if($user->id == $post->user_id){
                $bartizan = Bartizan::find($post->bartizan_id);
                return view("post.edit", [
                    "post" => $post,
                    'bartizan' => $bartizan
                ]);
            } else {
                return view("errors.message", [ "message" => "게시글을 수정할 권한이 없습니다."]);
            }
        }else {
            return view("errors.message", [ "message" => "게시글을 수정할 권한이 없습니다."]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Post $post)
    {
        info(__METHOD__ . " POST ID = " . $post->id . " | Writer User ID = " . $post->user_id);
        info($request);

        if($user = \Auth::user()){
            info("SESSION USER ID = " . $user->id);
            if($user->id == $post->user_id){
                $data = $request->data;
                $post->update([
                    'title' => $data['title'],
                    'content' => $data['content'],
                ]);

                return response()->json([
                    'code' => 200,
                ]);
            } else {
                return response()->json([ 'code' => 301, "message" => "게시글을 수정할 권한이 없습니다."]);
            }
        }else {
            return response()->json([ 'code' => 301, "message" => "게시글을 수정할 권한이 없습니다."]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Post $post)
    {
        info(__METHOD__ . " POST ID = " . $post->id . " | Writer User ID = " . $post->user_id);
        info($request);

        if($user = \Auth::user()){
            info("SESSION USER ID = " . $user->id);
            if($user->id == $post->user_id){
                $post->delete();
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
