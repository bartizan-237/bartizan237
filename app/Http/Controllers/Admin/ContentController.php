<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Nation;
use App\Models\User;
use App\Models\AuthCode;
use App\Models\Post;
use App\Models\Bartizan;

class ContentController extends Controller
{

    public function postIndex(Request $request)
    {

        $search_keyword = $request->search_keyword;
        $search_field = $request->search_field;

        $page = $request->page;
        $POST_PER_PAGE = 10;

        $query = Post::query();

        if (isset($search_keyword) AND $search_keyword != "") {
            $query->where('name', 'like', '%'. $search_keyword . '%')
                ->orWhere('name_en', 'like', '%' . $search_keyword . '%');
        }

        // 최종적으로 결과를 가져옴
        $posts = $query->orderBy("name")->paginate($POST_PER_PAGE);

        return view('admin.content.post.index', [
            'posts' => $posts,
            "search_keyword" => $search_keyword,
            "search_field" => $search_field,
        ]);
    }


}
