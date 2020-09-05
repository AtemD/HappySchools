<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    /**
     * Creates Relationship with User Model
     *
     * @return obj
     **/
    public function postedBy()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Creates Relationship with School Model
     *
     * @return obj
     **/
    public function recruiter()
    {
        return $this->belongsTo(School::class);
    }
    
    /**
     * Creates Relationship with Application Model
     *
     * @return obj
     **/
    public function applications()
    {
        return $this->hasMany(Application::class, 'vacancy');
    }
}
