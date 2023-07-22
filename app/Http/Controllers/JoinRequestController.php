<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JoinRequest;
use App\Models\Watchman;

class JoinRequestController extends Controller
{
    public function accept(Request $request){
        info($request);

        $user_id = $request->data['user_id'];
        $bartizan_id = $request->data['bartizan_id'];
//        dd($data); // dd가 안됨
        if(Watchman::where('bartizan_id', $bartizan_id)->where('user_id', $user_id)->exists()){
            return response()->json([
               'code' => 301,
                'message' => 'Exists'
            ]);
        }else{
            Watchman::create([
                'user_id' => $user_id,
                'bartizan_id' => $bartizan_id
            ]);
            return response()->json([
                'code' => 200,
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
