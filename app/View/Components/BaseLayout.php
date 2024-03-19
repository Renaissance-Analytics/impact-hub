<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use App\Models\Setting;

class BaseLayout extends Component
{
    public $title;
    public $description;
    public $ogimage;
    public $application_name;
    public $type_card;
    public $image;
    public $copyright;
    public $favicon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null, $description = null, $ogimage = null, $application_name = null, $type_card = null, $image = null, $copyright = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->ogimage = $ogimage;
        $this->application_name = $application_name;
        $this->type_card = $type_card;
        $this->image = $image;
        $this->copyright = $copyright;

        $iconVal = \App\Models\Setting::where('key', 'favicon')->first();
        $this->favicon = $iconVal ? asset('storage/'.$iconVal->value) : '/favicon.ico';

    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        
        return view('layouts.base');
    }
}

