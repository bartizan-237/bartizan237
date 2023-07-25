<?php

namespace App\Http\Controllers;

use App\Models\Bartizan;
use App\Models\JoinRequest;
use App\Models\Watchman;
use App\Models\Post;
use App\Models\Nation;
use http\Env\Response;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BartizanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /** 23.7.25.
         * as-is : just index
         * to-be : infinite scroll
        */

        $search_keyword = $request->input('search');

        info(__METHOD__);
        info("$search_keyword");

        if(isset($search_keyword) AND $search_keyword != ""){
            $bartizans = Bartizan::where('name', $search_keyword)
                ->orderBy("name")
                ->get();
        }else{
            $bartizans = Bartizan::orderBy("name")->get();
        }

        return view('bartizan.index_scroll', [
            'bartizans' => $bartizans,
            'search_keyword' => $search_keyword ?? "",
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
            "bartizan" => $bartizan
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
        info(__METHOD__);
        $user = \Auth::user();
        if($user){

        }else{
            return response()->json([
                'code' => 301, "message" => "User is not admin of the bartizan"
            ]);
        }

        info($request);
        $data = $request->data;

        $bartizan->update([
            'description' => $data['description'],
        ]);

        return response()->json([
            'code' => 200
        ]);
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

    public function showWatchmen(Bartizan $bartizan){
        $watchmen = $bartizan->getWatchmen;
//        dd($watchmen);
        return view("bartizan.watchman",[
            "bartizan" => $bartizan,
            "watchmen" => $watchmen
        ]);
    }
    public function join(Request $request){
        $user_id = $request->data['user_id'];
        $bartizan_id = $request->data['bartizan_id'];

        $request_exists = JoinRequest::where('bartizan_id', $bartizan_id)->where('user_id', $user_id)->exists();
        $watchman_exists = Watchman::where('bartizan_id', $bartizan_id)->where('user_id', $user_id)->exists();

        if($request_exists){
            return response()->json([
                "code" => 301,
            ]);
        } elseif($watchman_exists){
            return response()->json([
                "code" => 302,
            ]);
        } else{
            JoinRequest::create(
                [
                    "user_id" => $user_id,
                    "bartizan_id" => $bartizan_id
                ]
            );
            return response()->json([
               "code" => 200
            ]);
        }

//        if(@$request_exists and $watchman_exists){
//
//        }


//        return view("bartizan.show",[
//            'bartizan'=>$bartizan
//        ]);
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

    public function joinRequestList(Bartizan $bartizan){
        if(\Auth::user()==null){
            return redirect("/bartizan");
        }

        $list = $bartizan->getJoinList;
        $admin_id = $bartizan->admin_user_id;
        $user_id = \Auth::user()->id;

        return view("bartizan.join_request_list",[
            'bartizan' => $bartizan,
            'joinList' => $list
        ]);

//        if($admin_id == $user_id){
//            return view("bartizan.join_list",[
//                'bartizan' => $bartizan,
//                'joinList' => $list
//            ]);
//        }
//        else{
//            return redirect("/bartizan");
//        }
    }

    public function scroll(Request $request)
    {
        // 무한스크롤
        info(__METHOD__);
        info($request);

        $BARTIZAN_PER_SCROLL = 20;
        $search_keyword = $request->input('search');
        $page = $request->page;

        if ($search_keyword != "") {
            // 키워드
            $bartizans = Bartizan::where('name', 'LIKE', '%' . $search_keyword . '%')
                ->orderBy("name")
                ->skip($page * $BARTIZAN_PER_SCROLL)->take($BARTIZAN_PER_SCROLL)->get();
        } else {
            $bartizans = Bartizan::orderBy("name")
                ->skip($page * $BARTIZAN_PER_SCROLL)->take($BARTIZAN_PER_SCROLL)->get();
        }

        return response()->json([
            'bartizans' => $bartizans
        ]);
    }
}
