<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{
    /**
     * Creates Relationship with Question Model
     *
     * @return obj
     **/
    public function questions()
    {
        return $this->hasMany(Question::class, 'question_type');
    }

    /**
     * Creates Relationship with RaterQuestionType Model
     *
     * @return obj
     **/
    public function questionRaterTypes()
    {
        return $this->hasMany(RaterQuestionType::class, 'question_type');
    }
}
