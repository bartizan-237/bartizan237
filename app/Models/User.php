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

    public function doesUserLikeThisPost($post_id): bool
    {
        if(Like::where('user_id', $this->id)->where('post_id', $post_id)->exists()) return true;
        else return false;
    }

//    public function bartizan(){
//        return $this->belongsTo(Bartizan::class, 'bartizan_id', 'id');
//    }

    public function watchman(){
        return $this->hasMany(Watchman::class, 'user_id', 'id');
    }
}

