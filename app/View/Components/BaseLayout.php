<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class BaseLayout extends Component
{
    public mixed $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.base', ['title' => $this->title]);
    }
}

