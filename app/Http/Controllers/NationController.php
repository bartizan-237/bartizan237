<?php

namespace App\Http\Controllers;

use App\Models\Nation;
use App\Models\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nations = Nation::paginate(10);
        return view('nation.index', [
            'nations' => $nations
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function show(Nation $nation)
    {
        return view("nation.show", [
            "nation" => $nation
        ]);
    }


}
