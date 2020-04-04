<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function validationRulesForAdminEditing()
    {
        return [
            'name' => 'required|string|max:20',
            'email' => 'required|email',
            'newPassword' => 'required|string|min:3',
        ];
    }

    public static function validationRulesSelfEditing()
    {
        return [
            'name' => 'required|string|max:20',
            'email' => 'required|email',
            'password' => 'required',
            'newPassword' => 'required|string|min:3',
        ];
    }
}
