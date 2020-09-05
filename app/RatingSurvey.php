<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RatingSurvey extends Model
{
    /**
     * Creates Relationship with RaterList Model
     *
     * @return obj
     **/
    public function rater()
    {
        return $this->belongsTo(RaterList::class);
    }

    /**
     * Creates Relationship with Question Model
     *
     * @return obj
     **/
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Creates Relationship with Answer Model
     *
     * @return obj
     **/
    public function answers()
    {
        return $this->belongsTo(Answer::class);
    }
}
