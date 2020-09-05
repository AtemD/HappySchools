<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaterQuestionType extends Model
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
     * Creates Relationship with QuestionType Model
     *
     * @return obj
     **/
    public function raterType()
    {
        return $this->belongsTo(RaterType::class);
    }
}
