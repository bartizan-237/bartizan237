<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'member_id',
        'name',
        'nickname',
        'birth',
        'email',
        'password',
        'officer',
        'bartizan_id',
        'provider',
        'provider_id',
        'appointment'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // 기본적으로는 email 필드를 사용하도록 되어 있으므로 이를 member_id로 변경
    public function findForPassport($username) {
        return $this->where('member_id', $username)->first();
    }

    public function doesUserLikeThisPost($post_id): bool
    {
        if(Like::where('user_id', $this->id)->where('post_id', $post_id)->exists()) return true;
        else return false;
    }

//    public function bartizan(){
//        return $this->belongsTo(Bartizan::class, 'bartizan_id', 'id');
//    }

    public function getWatchmen(){
        /** 23.8.2. 메소드명 수정
         * as-is : watchman
         * to-be : getWatchmen
         */
        return $this->hasMany(Watchman::class, 'user_id', 'id');
    }

    public function getPosts(){
        return $this->hasMany(Post::class, 'user_id', 'id');
    }
}

