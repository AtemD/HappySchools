<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

    /**
     * Creates Relationship with School Model
     * 
     * @return obj
     **/
    public function school()
    {
        return $this->hasOne(School::class, 'principal');
    }

    /**
     * Creates Relationship with Vacancy Model
     * 
     * @return obj
     **/
    public function postedVacancies()
    {
        return $this->hasMany(Vacancy::class, 'posted_by');
    }

    /**
     * Creates Relationship with Application Model
     * 
     * @return obj
     **/
    public function appliedJobs()
    {
        return $this->hasMany(Application::class, 'applicant');
    }
}
