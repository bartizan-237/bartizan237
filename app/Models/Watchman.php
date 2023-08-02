<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Watchman extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'watchmen';
    protected $fillable = ['user_id', 'bartizan_id'];
    public function getUser(){
        /** 23.8.2. 메소드명 수정
         * as-is : getUsers
         * to-be : getUser
         */
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function getBartizan(){
        /** 23.8.2. 메소드명 수정
         * as-is : getBartizans
         * to-be : getBartizan
         */
        return $this->belongsTo(Bartizan::class, 'bartizan_id', 'id');
    }
    
}
