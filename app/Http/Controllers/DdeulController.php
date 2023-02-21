<?php

namespace App\Http\Controllers;

use App\Models\Ddeul;
use App\Models\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DdeulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ddeuls = Ddeul::paginate(10);
        return view('ddeul.index', [
           'ddeuls' => $ddeuls
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("ddeul.create");
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
            $admin_user_id = $user->id;
        }else{
            $admin_user_id = null;
        }

//        $validatedData = $request->validate([
//            'name' => ['required', 'unique:ddeuls', 'max:255'],
//            'category' => ['required'],
//            'type' => ['required'],
//        ]);

        info($request);

        $data = $request->data;

        Ddeul::create([
            'name' => $data['name'],
            'category' => $data['category'],
            'type' => $data['category'],
            'color' => $data['theme_color'],
            'description' => $data['description'],
            'admin_user_id' => $admin_user_id
        ]);

        return response()->json([
            'code' => 200
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ddeul  $ddeul
     * @return \Illuminate\Http\Response
     */
    public function show(Ddeul $ddeul)
    {
        return view("ddeul.show", [
            "ddeul" => $ddeul
        ]);
    }

    public function posts(Ddeul $ddeul)
    {
        $posts = Post::where("ddeul_id", $ddeul->id)->orderBy('id', 'desc')->paginate(10);
        return view("ddeul.posts", [
            "ddeul" => $ddeul,
            "posts" => $posts
        ]);
    }

    public function showPost(Ddeul $ddeul, Post $post){{
        $post->increment("hit");

        if($user = \Auth::user()){
            $post->like_by_this_user = $user->doesUserLikeThisPost($post->id) ? 1 : 0;
        } else {
            $post->like_by_this_user = 0;
        }
        return view("post.show", [
            "ddeul" => $ddeul,
            "show_post" => true,
            "post" => $post
        ]);
    }}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ddeul  $ddeul
     * @return \Illuminate\Http\Response
     */
    public function edit(Ddeul $ddeul)
    {
        return view("ddeul.edit", [
            "ddeul" => $ddeul
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ddeul  $ddeul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ddeul $ddeul)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ddeul  $ddeul
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ddeul $ddeul)
    {
        //
    }

    public function validateName(Request $request){
        $name = $request->name;
        info(__FUNCTION__ . " > " .$name);
        if(Ddeul::where('name', $name)->exists()){
            return response()->json(["code" => 301, "message" => "That Nickname is already registered"]);
        }else{
            return response()->json(["code" => 200]);
        }
    }
}
