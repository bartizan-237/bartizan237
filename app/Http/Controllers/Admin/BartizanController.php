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

class BartizanController extends Controller
{

    public function index(Request $request)
    {

        $search_keyword = $request->search_keyword;
        $search_field = $request->search_field;
        $continent_keyword = $request->continent;
        $province_keyword = $request->province;

        $page = $request->page;
        $BARTIZAN_PER_PAGE = 10;

        $query = Bartizan::query();

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

        if (isset($search_keyword) AND $search_keyword != "") {
            $query->where('name', 'like', '%'. $search_keyword . '%')
                ->orWhere('name_en', 'like', '%' . $search_keyword . '%');
        }

        // 최종적으로 결과를 가져옴
        $bartizans = $query->orderBy("name")->paginate($BARTIZAN_PER_PAGE);

        return view('admin.bartizan.index', [
            'bartizans' => $bartizans,
            "search_keyword" => $search_keyword,
            "search_field" => $search_field,
            "continent_keyword" => $continent_keyword,
            "province_keyword" => $province_keyword,
        ]);
    }


}
