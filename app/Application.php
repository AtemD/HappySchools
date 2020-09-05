<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    /**
     * Creates Relationship with User Model
     *
     * @return obj
     **/
    public function appliedBy()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Creates Relationship with Vacancy Model
     *
     * @return obj
     **/
    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }
}
