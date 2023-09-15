<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pledge extends Model
{
    use SoftDeletes;
    protected $table = 'pledges';
    protected $guarded = [

    ];
}
