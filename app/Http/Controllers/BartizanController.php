<?php

namespace App\Http\Controllers;

use App\Models\Bartizan;
use App\Models\JoinRequest;
use App\Models\Watchman;
use App\Models\Post;
use App\Models\Nation;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BartizanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bartizans = Bartizan::paginate(10);
        return view('bartizan.index', [
           'bartizans' => $bartizans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nations = Nation::select('id', 'name')->orderBy("name", "asc")->get();
        return view("bartizan.create", [
            "nations" => $nations
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
            $admin_user_id = $user->id;
        }else{
            $admin_user_id = null;
        }

//        $validatedData = $request->validate([
//            'name' => ['required', 'unique:bartizans', 'max:255'],
//            'category' => ['required'],
//            'type' => ['required'],
//        ]);

        info($request);

        $data = $request->data;

//        Bartizan::create([
//            'name' => $data['name'],
//            'category' => $data['category'],
//            'type' => $data['category'],
//            'color' => $data['theme_color'],
//            'description' => $data['description'],
//            'admin_user_id' => $admin_user_id
//        ]);

        Bartizan::create([
            'name' => $data['name'],
            'nation_id' => $data['nation_id'],
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
     * @param  \App\Models\Bartizan  $bartizan
     * @return \Illuminate\Http\Response
     */
    public function show(Bartizan $bartizan)
    {
        return view("bartizan.show", [
            "bartizan" => $bartizan,
            "join_request" => false
        ]);
    }

    public function posts(Bartizan $bartizan)
    {
        $posts = Post::where("bartizan_id", $bartizan->id)->orderBy('id', 'desc')->paginate(10);
        return view("bartizan.posts", [
            "bartizan" => $bartizan,
            "posts" => $posts
        ]);
    }

    public function showPost(Bartizan $bartizan, Post $post){{
        $post->increment("hit");

        if($user = \Auth::user()){
            $post->like_by_this_user = $user->doesUserLikeThisPost($post->id) ? 1 : 0;
        } else {
            $post->like_by_this_user = 0;
        }
        return view("post.show", [
            "bartizan" => $bartizan,
            "show_post" => true,
            "post" => $post
        ]);
    }}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bartizan  $bartizan
     * @return \Illuminate\Http\Response
     */
    public function edit(Bartizan $bartizan)
    {
        return view("bartizan.edit", [
            "bartizan" => $bartizan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bartizan  $bartizan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bartizan $bartizan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bartizan  $bartizan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bartizan $bartizan)
    {
        //
    }

    public function validateName(Request $request){
        $name = $request->name;
        info(__FUNCTION__ . " > " .$name);
        if(Bartizan::where('name', $name)->exists()){
            return response()->json(["code" => 301, "message" => "That Nickname is already registered"]);
        }else{
            return response()->json(["code" => 200]);
        }
    }

    public function join(Request $request, Bartizan $bartizan){
//        dd($request->input('join_user_id'), $request->input('join_bartizan_id'), $request->input('join_user_name'));

        $request_exists = JoinRequest::where('bartizan_id',$request->input('join_bartizan_id'))
            ->where('user_id',$request->input('join_user_id'))->exists();
//        $watchman_exists = Watchman::where('bartizan_id', $request->input('join_bartizan_id'))
//            ->where('user_id', $request->input('join_user_id'))->exists();

        JoinRequest::create([
                'bartizan_id' => $request->input('join_bartizan_id'),
                'user_id' => $request->input('join_user_id'),
                'user_name' => $request->input('join_user_name')
            ]
        );
//        if(@$request_exists and $watchman_exists){
//
//        }
        return view("bartizan.show",[
            'bartizan'=>$bartizan,
            'join_request'=>true]);
//        return redirect('/bartizan/'.$bartizan->id)->with('message', '신청 성공');

//      if(!$request_exists){ // 중복 신청 방지
//            JoinRequest::create([
//                    'bartizan_id' => $request->input('join_bartizan_id'),
//                    'user_id' => $request->input('join_user_id'),
//                    'user_name' => $request->input('join_user_name')
//                ]
//            );
//        }
    }

    public function joinList(Bartizan $bartizan){
        $list = $bartizan->getJoinList;

        return view("bartizan.join",[
            'bartizan' => $bartizan,
            'joinList' => $list
        ]);
    }
    
}
