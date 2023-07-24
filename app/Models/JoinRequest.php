<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JoinRequest extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'join_requests';
    protected $fillable = ['bartizan_id', 'user_id'];

    public function getJoinRequestUsers(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
