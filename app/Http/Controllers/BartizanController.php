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
    public function main(Request $request){
        // 237 Bartizans 메인
        // 5대륙 12대교구
        return view('bartizan.main', [

        ]);
    }

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

        $continent_keyword = $request->input('continent');
        $province_keyword = $request->input('province');
        $search_keyword = $request->input('search');

        // /bartizan no parameter => redirect to /bartizan/main
        if($search_keyword == null AND $province_keyword == null AND $continent_keyword == null){
            return redirect('/bartizan/main');
        }


        return view('bartizan.index_scroll', [
//            'bartizans' => $bartizans, // 망대 데이터는 vue js에서 데이터 호출
            'search_keyword' => $search_keyword ?? "",
            'province_keyword' => $province_keyword ?? "",
            "continent_keyword" => $continent_keyword ?? ""
        ]);


//        if(isset($search_keyword) AND $search_keyword != ""){
//            $bartizans = Bartizan::where('name', $search_keyword)
//                ->orderBy("name")
//                ->get();
//        }else{
//            $bartizans = Bartizan::orderBy("name")->get();
//        }
//
//        return view('bartizan.index_scroll', [
//            'bartizans' => $bartizans,
//            'search_keyword' => $search_keyword ?? "",
//        ]);
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
        info(__METHOD__ . " " . $bartizan->name);
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

    public function showNation(Bartizan $bartizan){
        $nation = $bartizan->getNation;
//        dd($watchmen);
        info(__METHOD__ . " " . $bartizan->name);
        return view("bartizan.nation",[
            "bartizan" => $bartizan,
            "nation" => $nation
        ]);
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
        $reason = $request->data['reason'];

        $request_exists = JoinRequest::where('bartizan_id', $bartizan_id)->where('user_id', $user_id)->exists();
        $watchman_exists = Watchman::where('bartizan_id', $bartizan_id)->where('user_id', $user_id)->exists();

        if($watchman_exists){
            return response()->json([
                "code" => 301,
            ]);
        } elseif($request_exists){
            return response()->json([
                "code" => 302,
            ]);
        } else{
            JoinRequest::create(
                [
                    "user_id" => $user_id,
                    "bartizan_id" => $bartizan_id,
                    "reason" => $reason
                ]
            );
            return response()->json([
               "code" => 200
            ]);
        }
    }

    public function joinRequest(Bartizan $bartizan){

        return view("bartizan.join_request",[
            'bartizan' => $bartizan
        ]);
    }

    public function joinRequestList(Bartizan $bartizan){
        if(\Auth::user()==null){
            return redirect("/bartizan");
        }

        $list = $bartizan->getJoinList->where('accepted_at', null);
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

        // 각각의 keyword는 AND 조건으로 검색
        $continent_keyword = $request->input('continent');
        $province_keyword = $request->input('province');
        $search_keyword = $request->input('search');
        $page = $request->input('page');

        info("$continent_keyword | $province_keyword | $search_keyword");

        $BARTIZAN_PER_SCROLL = 12;

        // 기본 쿼리 빌더 객체 생성
        $query = Bartizan::query();

        // continent 키워드가 있다면
        if (isset($continent_keyword) AND $continent_keyword != "") {
            $query->where('continent', $continent_keyword);
        }

        // province 키워드가 있다면
        if (isset($province_keyword) AND $province_keyword != "") {
            if($province_keyword == "전체"){
                
            } else {
                $query->where('province', $province_keyword);
            }
        }

        // search 키워드가 있다면
        if (isset($search_keyword) AND $search_keyword != "") {
            $query->where('name', 'like', '%'. $search_keyword . '%')->orWhere('name_en', 'like', '%' . $search_keyword . '%');
        }

        // 최종적으로 결과를 가져옴
        $bartizans = $query->orderBy("name")->skip($page * $BARTIZAN_PER_SCROLL)->take($BARTIZAN_PER_SCROLL)->get();

        return response()->json([
            'bartizans' => $bartizans
        ]);
    }
}
