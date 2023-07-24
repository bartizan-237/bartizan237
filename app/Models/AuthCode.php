<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AuthCode extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = "auth_codes";
    protected $guarded = [

    ];

    public function generateCode($user_id){
        $code = \Str::random(10);
        $this->create([
            'user_id' => $user_id,
            'code' => $code
        ]);

        return $code;
    }
}
