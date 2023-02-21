<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Ddeul;
use App\Models\User;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function clickLike(Request $request){
        $data = (object) $request->data;
        $like = $data->like;
        $ddeul_id = $data->ddeul_id;
        $target_type = $data->target_type;
        $target_id = $data->target_id;
        $user_id = $data->user_id;
        info($request);

        $target_column = $target_type ."_id";
        if($like){
            // 좋아요
            if(!Like::where($target_column, $target_id)->where("user_id", $user_id)->exists()){
                Like::create([
                    'ddeul_id' => $ddeul_id,
                    $target_column => $target_id,
                    'user_id' => $user_id
                ]);
                if($target_type == "post"){
                    // POST
                    $post_row = Post::find($target_id);
                    $post_row->increment("like");
                }else{
                    // COMMENT
                    $comment_row = Comment::find($target_id);
                    $comment_row->increment("like");
                }
            }
        }else{
            // 좋아요 취소
            if($like_row = Like::where($target_column, $target_id)->where("user_id", $user_id)->get()->last()){
                $like_row->delete();
                if($target_type == "post"){
                    // POST
                    $post_row = Post::find($target_id);
                    $post_row->decrement("like");
                }else{
                    // COMMENT
                    $comment_row = Comment::find($target_id);
                    $comment_row->decrement("like");
                }
            }
        }
    }
}
