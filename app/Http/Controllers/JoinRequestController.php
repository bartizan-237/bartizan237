<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JoinRequest;

class JoinRequestController extends Controller
{

    public function accept(Request $request){
        dd($request);
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
