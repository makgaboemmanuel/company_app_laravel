<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'first_name', 'last_name', 'bio', 'company', 'profile_picture'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*  user afdded code  */

    /*  read and undesrtand what is Eager Loading, what are its benefits and why it is used */

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function contacts( ){
        return $this->hasMany(Contact::class);
    }

    public function companies( ){
        return $this->hasMany(Company::class);
    }

    /*  newly added code   */
    public function fullName(){
        return $this->first_name . " " . $this->last_name;
    }

}
