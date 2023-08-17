<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Bartizan extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = "bartizans";
    protected $guarded = [

    ];

    public function getThemeColor(){
        // 대륙별 테마 색상
        switch ($this->continent) {
            case 'Asia' : $color = 'orange-400'; break;
            case 'Africa' : $color = 'yellow-400'; break;
            case 'Europe' : $color = 'green-400'; break;
            case 'America' : $color = 'pink-400'; break;
            case 'Oceania' : $color = 'sky-400'; break;
            default : $color = 'gray-700';
        }
        return $color;
    }

    public function getRecentPosts($count){
        return $this->hasMany(Post::class)->orderBy('id', 'desc')->take(3)->get();
    }

    public function getAdmin(){
        return $this->hasOne(User::class, 'id', 'admin_user_id')->get()->last();
    }

    public function getLatestPost(){
        return $this->hasOne(Post::class)->get()->last();
    }

    public function getCreatedAt(){
        if( $this->created_at ) {
            return $this->created_at->diffForHumans();
        }else{
            return $this->created_at;
        }
    }

//    public function watchman(){
//        return $this->belongsToMany(Watchman::class, 'watchmen','bartizan_id', 'id');
//    }

    public function getNation(){
        return $this->hasOne(Nation::class);
    }

    public function getWatchmen(){
        return $this->hasMany(Watchman::class, 'bartizan_id', 'id'); // watchmen의 외래키, bartizans의 기본키
    }

    public function getJoinList(){
        return $this->hasMany(JoinRequest::class, 'bartizan_id', 'id');
    }
}
