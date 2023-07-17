<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Watchman extends Model
{
    use HasFactory;

    protected $table = 'watchmen';

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function bartizans(){
        return $this->belongstTo(Bartizan::class, 'bartizan_id', 'id');
    }
    
}