<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const USER_ADMIN = 'admin';
    const USER_TECHNICIAN = 'technician';
    const USER_DIRECTOR = 'director';
    const USER_EMPLOYEE = 'employee';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'usertype'
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
     * Tells if the user is a USER_ADMIN type user
     *
     * @return boolean
     */
    public function isUserAdmin()
    {
        return $this->usertype == User::USER_ADMIN;
    }

    /**
     * Tells if the user is a USER_DIRECTOR type user
     *
     * @return boolean
     */
    public function isUserDirector()
    {
        return $this->usertype == User::USER_DIRECTOR;
    }

    public function isUserTechnician()
    {
        return $this->usertype == User::USER_TECHNICIAN;
    }

    public function labs()
    {
        return $this->belongsToMany(Lab::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }    
}
