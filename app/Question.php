<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * Creates Relationship with QuestionType Model
     *
     * @return obj
     **/
    public function questionType()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Creates Relationship with RatingSurvey Model
     *
     * @return obj
     **/
    public function questionSurveys()
    {
        return $this->hasMany(RatingSurvey::class, 'question');
    }
}
