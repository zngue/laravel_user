<?php


namespace Zngue\User\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class UserAdmin extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'username', 'password',
    ];

    protected $hidden = [
        //remember_token 字段用于记住我的功能
        'password', 'remember_token',
    ];
    public static $rules = [
        'username'=>'required',
        'password'=>'required'
    ];
}
