<?php

namespace App\Models;

use App\Notifications\PasswordReset;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        //'first_name', 'last_name', 'email', 'password', 'role_id',
        'name', 'email', 'password', 'role_id', 'image',
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
     * Get the role record associated with the user.
     */
    public function roles()
    {
        return $this->belongsTo('App\Models\Roles', 'role_id', 'id');
    }

    public function info()
    {
        return $this->hasOne('App\Models\Userinfo', 'id', 'user_id');
    }


    public function property()
    {
        return $this->hasOne('App\Models\Property', 'id', 'user_id');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordReset($token, $this->role_id));
    }
}
