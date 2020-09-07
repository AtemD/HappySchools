<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    /** @var string $type The alert type */
    public $type;

    /** @var array $messages The alert messages */
    public $messages;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $messages)
    {
        $this->type     = $type;
        $this->messages = $messages;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
