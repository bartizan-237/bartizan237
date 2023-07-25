<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JoinRequest;
use App\Models\Watchman;

class JoinRequestController extends Controller
{
    public function accept(Request $request){
        info($request);
        $data = $request->data;
//        dd($data); // dd가 안됨

        $user_id = $request->data['user_id'];
        $bartizan_id = $request->data['bartizan_id'];

        /**
         * 23.7.24. 제안
         * JoinRequest를 Accept 하고나서 JoinRequest를 soft delete 하는 것보다
         * 기록 남기는 역할할 수 있는 컬럼을 추가하는게 좋아보임 => 이후에 망대관리자가 joinRequest 신청목록(명단, 수락 시간 등) 확인할 수도 있게
         * 예시)
         * as-is : JoinRequest::where('bartizan_id', $bartizan_id)->where('user_id', $user_id)->delete();
         * to-be : JoinRequest::where('bartizan_id', $bartizan_id)->where('user_id', $user_id)->update(['accepted_at', now()]);
         *
         * 변경 후, /bartizan/{bartizan_id/joinlist 에서는 아래처럼 조회하면 좋을것같아
         * as-is : Bartizan::getJoinList() ... $this->hasMany(JoinRequest::class, 'bartizan_id', 'id');
         * to-be : Bartizan::getJoinList() ... $this->hasMany(JoinRequest::class, 'bartizan_id', 'id')->where("accepted_at" , null);
         *
         * 23.7.25. 제안을 토대로 수정
        */

        if(Watchman::where('bartizan_id', $bartizan_id)->where('user_id', $user_id)->exists()){
            JoinRequest::where('bartizan_id', $bartizan_id)->where('user_id', $user_id)->delete();
            return response()->json([
               'code' => 301,
                'message' => 'Exists'
            ]);
        }else{
            Watchman::create([
                'user_id' => $user_id,
                'bartizan_id' => $bartizan_id
            ]);
            JoinRequest::where('bartizan_id', $bartizan_id)->where('user_id', $user_id)->update(['accepted_at'=>now()]);
            return response()->json([
                'code' => 200,
                'message' => 'Success'
            ]);

        }
    }

    public function reject(Request $request){
        $user_id = $request->data['user_id'];
        $bartizan_id = $request->data['bartizan_id'];

        if(JoinRequest::where('bartizan_id', $bartizan_id)->where('user_id', $user_id)->exists()){
            JoinRequest::where('bartizan_id', $bartizan_id)->where('user_id', $user_id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'Success'
            ]);
        }else{
            return response()->json([
               'code' => 304,
                'message' => 'It does not exist'
            ]);
        }
    }
}
