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

    public function myFields()
    {
        // 관심분야 설정
        $fields = Job::select('id', 'industry', 'name')->get()->groupBy("industry");
        return view('user.my_fields', [
            'user' => $this->user,
            'fields' => $fields
        ]);
    }

}
