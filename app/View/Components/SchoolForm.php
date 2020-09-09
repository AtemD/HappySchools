<?php

namespace App\View\Components;

use App\School;
use Illuminate\View\Component;

class SchoolForm extends Component
{
    /**
     * The form type.
     *
     * @var string
     */
    public $type;

    /**
     * The school data.
     *
     * @var string
     */
    public $schoolData;

    /** @var array $schoolTypes Get School types from DB */
    // public $schoolTypes;

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $schoolData
     * @return void
     */
    public function __construct($type, $schoolData = null)
    {
        $this->type = $type;
        $this->schoolData = $schoolData;
        // $this->schoolTypes = School::select('type')->distinct()->orderBy('type', 'asc')->get();
    }

    /**
     * Checks if the form is create form
     *
     * @return boolean
     **/
    public function isCreateForm()
    {
        return $this->type === 'create';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.school-form');
    }
}
