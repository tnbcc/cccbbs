<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    const SEX_MAN     = 'man';
    const SEX_WOMAN   = 'woman';
    const SEX_UNKNOWN ='unknow';

    public static $sexMap = [
            self::SEX_MAN     =>'男',
            self::SEX_WOMAN   =>'女',
            self::SEX_UNKNOWN =>'未知'
        ];
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