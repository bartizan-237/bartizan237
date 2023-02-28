<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailAuthCode extends Model
{
    use SoftDeletes;
    protected $table = 'mail_auth_codes';
    protected $guarded = [

    ];
}
