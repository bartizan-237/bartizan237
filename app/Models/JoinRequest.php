<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinRequest extends Model
{
    use HasFactory;
    protected $table = 'join_requests';
    protected $fillable = ['bartizan_id', 'user_id', 'user_name'];
}
