<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Job;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $user;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = \Auth::user();

            return $next($request);
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function basicInfo()
    {
        // 기본정보 최초입력
        return view('user.basic_info');
    }

    public function validateMemberId(Request $request){
        $member_id = $request->member_id;
        info(__METHOD__);
        info($member_id);
        if(User::where('member_id', $member_id)->exists()){
            return response()->json(["code" => 301, "message" => "That member_id is already registered"]);
        }else{
            $is_keyword_available = isKeywordAvailable($member_id); // array

            if(!$is_keyword_available){
                return response()->json(["code" => 302, "message" => "That member_id is not allowed!"]);
            }
            info("\$is_keyword_available = $is_keyword_available");

            return response()->json(["code" => 200]);
        }
    }
    public function validateNickname(Request $request){
        $nickname = $request->nickname;
        info(__METHOD__);
        info($nickname);
        if(User::where('nickname', $nickname)->exists()){
            return response()->json(["code" => 301, "message" => "That Nickname is already registered"]);
        }else{
            $is_keyword_available = isKeywordAvailable($nickname); // array

            if(!$is_keyword_available){
                return response()->json(["code" => 302, "message" => "That Nickname is not allowed!"]);
            }
            info("\$is_keyword_available = $is_keyword_available");

            return response()->json(["code" => 200]);
        }
    }

    public function saveBasicInfo(Request $request){
        info(__METHOD__);
        info($request->data);
        info($this->user->email);

        $data = $request->data;
        $user = User::where('email', $this->user->email)->get()->last();
        if(isset($user)){
            $user->update([
                'name' => $data['name'],
                'nickname' => $data['nickname'],
                'birth' => $data['birth'],
                'officer' => $data['officer'],
                'appointment' => $data['appointment'] ? 1 : 0
            ]);
            return response()->json(["code" => 200]);
        }else{
            return response()->json(["code" => 300, "message" => "NO USER"]);
        }

    }

    public function myPage()
    {
        // 기본정보 & 추가정보
        return view('user.my_page', [
            'user' => $this->user
        ]);
    }

    public function myPageEdit(){
        // 기본정보 & 추가정보 수정페이지
        return view('user.my_page_edit', [
            'user' => $this->user
        ]);
    }

    public function userBartizan(){
        $bartizans = [];
        $watchmen = $this->user->getWatchmen; // RELATION TABLE user_id bartizan_id
        if($watchmen){
            foreach ($watchmen as $watchman){
                $bartizan = $watchman->getBartizan;
                $bartizans[] = $bartizan;
            }
        }
        return view('user.bartizan', [
            'user' => $this->user,
            'watchmen' => $watchmen,
            "bartizans" => $bartizans
        ]);
    }

    public function userPost(Request $request){
        $posts = $this->user->getPosts()->orderBy('id', 'desc')->paginate(10); // Relation & Pagination
        if($posts){
            foreach ($posts as $post){
                $post->bartizan = $post->getBartizan();
            }
        }
        return view('user.post', [
            'user' => $this->user,
            'posts' => $posts
        ]);
    }

    public function quitPage()
    {
        // 회원 탈퇴
        return view('user.quit', [
            'user' => $this->user
        ]);
    }

    public function quitUser()
    {
        // 회원 탈퇴
        info(__METHOD__);
        info("[회원탈퇴] " . $this->user->name . " | " . $this->user->email);
        $this->user->delete();

        // 카카오 간편가입 유저인 경우, 연동정보 해제 필요
        
        return redirect("/home");
    }

    public function myFields()
    {
        // 관심분야 설정
//        $fields = Job::select('id', 'industry', 'name')->get()->groupBy("industry");
//        dd($fields);
        return view('user.my_fields', [
            'user' => $this->user,
            'title' => "MY JOBS"
//            'fields' => $fields,
        ]);
    }

}
