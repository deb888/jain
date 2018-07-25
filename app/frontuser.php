<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class frontuser extends Model implements \Illuminate\Contracts\Auth\Authenticatable,CanResetPasswordContract
{
    use Authenticatable,CanResetPassword;
}
