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
 
        return view("post.show", [
            "post" => $post
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
        return view("post.edit", [
            "post" => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }


}
