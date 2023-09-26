<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\JoinRequest;
use App\Models\Watchman;
use App\Models\Post;
use App\Models\Nation;
use http\Env\Response;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NewsController extends Controller
{
    public function main(Request $request){
        return view('news.main', [

        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $continent_keyword = $request->input('continent');
        $province_keyword = $request->input('province');
        $search_keyword = $request->input('search');

        // /news no parameter => redirect to /news/main
        if($search_keyword == null AND $province_keyword == null AND $continent_keyword == null){
            return redirect('/news/main');
        }


        return view('news.index_scroll', [
//            'news' => $news, // 뉴스 데이터는 vue js에서 데이터 호출
            'search_keyword' => $search_keyword ?? "",
            'province_keyword' => $province_keyword ?? "",
            "continent_keyword" => $continent_keyword ?? ""
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
//            'name' => ['required', 'unique:news', 'max:255'],
//            'category' => ['required'],
//            'type' => ['required'],
//        ]);

        info($request);

        $data = $request->data;

        News::create([
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
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        info(__METHOD__ . " " . $news->name);
        return view("news.show", [
            "news" => $news
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view("news.edit", [
            "news" => $news
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        info(__METHOD__);
        $user = \Auth::user();
        if($user){

        }else{
            return response()->json([
                'code' => 301, "message" => "User is not admin of the news"
            ]);
        }

        info($request);
        $data = $request->data;

        $news->update([
            'description' => $data['description'],
        ]);

        return response()->json([
            'code' => 200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
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
        $query = News::query();

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
        $news = $query->orderBy("name")->skip($page * $BARTIZAN_PER_SCROLL)->take($BARTIZAN_PER_SCROLL)->get();

        return response()->json([
            'news' => $news
        ]);
    }
}
