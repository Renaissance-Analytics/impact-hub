<?php

namespace App\Livewire\Cms\Admin\Pages;

use Livewire\Component;
use App\Models\CmsPage;
use App\Models\CmsSection;


class SList extends Component
{
    public ?CmsPage $page;

    public function mount(CmsPage $page)
    {
        $this->page = $page->loadCount('sections');
    }

    public function render()
    {
        return view('livewire.cms.admin.pages.s-list');
    }
}
