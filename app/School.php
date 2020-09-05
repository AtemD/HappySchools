<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    /**
     * Create Relationship with User Model
     *
     * @return obj
     **/
    public function principal() {
        return $this->belongsTo(User::class);
    }

    /**
     * Creates Relationship with RaterList Model
     *
     * @return obj
     **/
    public function raterLists()
    {
        return $this->hasMany(RaterList::class, 'school');
    }

    /**
     * Creates Relationship with Vacancy Model
     * 
     * @return obj
     **/
    public function vacancies()
    {
        return $this->hasOne(Vacancy::class, 'recruiter');
    }
}
