<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Mail\MailAuth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(Request $request){
        Mail::to('remnant2816@naver.com')
            ->send(new MailAuth(['content' => '라라벨 메일발송 테스트']));
    }
}
