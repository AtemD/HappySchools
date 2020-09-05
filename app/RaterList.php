<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaterList extends Model
{
    /**
     * Creates Relationship with School Model
     *
     * @return obj
     **/
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    /**
     * Creates Relationship with RaterType Model
     *
     * @return obj
     **/
    public function rater()
    {
        return $this->belongsTo(RaterType::class);
    }

    /**
     * Creates Relationship with RatingSurvey Model
     *
     * @return obj
     **/
    public function raterSurveys()
    {
        return $this->hasMany(RatingSurvey::class, 'rater');
    }
}
