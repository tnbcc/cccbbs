<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
       'name','email', 'phone', 'password','true_ip','email_verified'
    ];
    protected $dates = [
        'last_actived_at',
    ];
    protected $casts = [
        'status'          => 'boolean',
        'email_verified'  => 'boolean',
    ];
    public function findForPassport($username)
    {
        filter_var($username, FILTER_VALIDATE_EMAIL) ?
            $credentials['email'] = $username :
            $credentials['phone'] = $username;

        return self::where($credentials)->first();
    }
}