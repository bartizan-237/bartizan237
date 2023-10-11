<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CsrfController extends Controller{
    public function getCsrf(){
        $csrf = csrf_token();
        info($csrf);
        return $csrf;
    }
}