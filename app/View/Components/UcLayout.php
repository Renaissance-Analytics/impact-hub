<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class UcLayout extends Component
{
    public string $title;
    public string $code;
    public string $message;
    public string $bgimg;
    public string $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type)
    {
        $this->type = $type;

        switch (true) {
            case ($this->type == '404'):
                $this->title = 'Oops: 404';
                $this->code = '404';
                $this->message = 'Page Not Found';
                $this->bgimg = '/errors/404.png';
                break;
            case ($this->type == '403'):
                $this->title = 'Oops: 403';
                $this->code = '403';
                $this->message = 'Forbidden';
                $this->bgimg = '/errors/403.png';
                break;
            default:
                $this->title = 'Oops: 500';
                $this->code = '500';
                $this->message = 'Server Error';
                $this->bgimg = '/errors/500.png';
                break;
        }
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.uc', [
            'title' => $this->title,
            'code' => $this->code,
            'message' => $this->message,
            'bgimg' => $this->bgimg,
            'type' => $this->type
        ]);
    }
}
