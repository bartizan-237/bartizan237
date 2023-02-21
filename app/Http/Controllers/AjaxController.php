<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function clickLike(Request $request){
        $user_id = $request->user_id;
        $target_id = $request->target_type;

    }
}
