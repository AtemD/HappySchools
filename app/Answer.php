<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /**
     * Creates Relationship with RatingSurvey Model
     *
     * @return obj
     **/
    public function answerSurveys()
    {
        return $this->hasMany(RatingSurvey::class, 'answer');
    }
}
