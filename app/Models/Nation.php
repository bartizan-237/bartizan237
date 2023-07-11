<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Nation extends Model
{
    use SoftDeletes;

    protected $table = "nations";
    protected $guarded = [

    ];

    public function getBartizan(){
        return $this->hasOne(Bartizan::class, 'id', 'bartizan_id')->get()->last();
    }

}
