<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    /**
     * @param Request $request
     * @return void
     * 전체 직종 목록
     */
    public function index(Request $request){
        $fields = Job::select('id', 'industry', 'name')->get()->groupBy("industry");
//        dd($fields);
        return view('fields.index', [
            'title' => "MY JOBS",
            'fields' => $fields,
        ]);
    }
}
