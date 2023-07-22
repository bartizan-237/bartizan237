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
    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function bartizans(){
        return $this->belongstTo(Bartizan::class, 'bartizan_id', 'id');
    }
    
}
