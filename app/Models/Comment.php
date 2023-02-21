<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "comments";
    protected $dates = ['created_at', 'updated_at'];
    protected $guarded = [

    ];

    public function getCreatedAt(){
        if( $this->created_at ) {
            return $this->created_at->diffForHumans();
        }else{
            return $this->created_at;
        }

    }
}
