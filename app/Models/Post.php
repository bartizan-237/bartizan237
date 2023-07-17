<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = "posts";
    protected $dates = ['created_at', 'updated_at'];
    protected $guarded = [

    ];

    public function getUserNickName(){
        return $this->belongsTo(User::class, "user_id", "id")->get()->last()->nickname;
    }

    public function getComments(){
        return $this->hasMany(Comment::class)->get();
    }

    public function getCommentsCount(){
        return Comment::where("post_id", $this->id)->count();
    }

    public function getLikes(){
        return $this->hasMany(Like::class)->get();
    }

    public function getCreatedAt(){
        if( $this->created_at > date("Y-m-d H:i:s", strtotime(" -7 days"))) {
            return $this->created_at->diffForHumans();
        }else{
            return date('y-m-d H:i', strtotime($this->created_at));
        }
    }

    public function getBartizan(){
        return $this->belongsTo(Bartizan::class, "bartizan_id", "id")->get()->last();
    }

//    public static function getCreatedAtAttribute($value)
//    {
//        \Carbon\Carbon::setLocale('kr');
//        return \Carbon\Carbon::parse($value, 'Asia/Seoul')->diffForHumans();
//    }
}
