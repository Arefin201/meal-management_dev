<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkbox extends Component
{
    /**
     * Create a new component instance.
     */
     public $checked;
    
    public function __construct($checked = false)
    {
        $this->checked = $checked;
    }

    public function render()
    {
        return view('components.checkbox');
    }
}
