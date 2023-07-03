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
}
