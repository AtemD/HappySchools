<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaterType extends Model
{
    /**
     * Creates Relationship with RaterList Model
     *
     * @return obj
     **/
    public function raterLists()
    {
        return $this->hasMany(RaterList::class, 'rater');
    }

    /**
     * Creates Relationship with RaterQuestionType Model
     *
     * @return obj
     **/
    public function raterQuestionTypes()
    {
        return $this->hasMany(RaterQuestionType::class, 'rater_type');
    }
}
