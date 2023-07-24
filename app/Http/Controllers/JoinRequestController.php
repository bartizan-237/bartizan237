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
            JoinRequest::where('bartizan_id', $bartizan_id)->where('user_id', $user_id)->delete();
            return response()->json([
                'code' => 200,
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
            ]);
        }else{
            return response()->json([
               'code' => 304,
                'message' => 'It does not exist'
            ]);
        }

    }

//    public function join(Request $request){
//        $data = $request->data;
//        dd($request->input('join_user_id'), $request->input('join_bartizan_id'), $request->input('join_user_name'));
//        JoinRequest::create([
//            'bartizan_id' => $data['join_bartizan_id'],
//            'user_id' => $data['join_user_id'],
//            'user_name' => $data['join_user_name']
//            ]
//        );
//    }

}
