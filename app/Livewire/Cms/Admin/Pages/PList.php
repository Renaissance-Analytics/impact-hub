<?php

namespace App\Livewire\Cms\Admin\Pages;

use Livewire\Component;

use App\Models\CmsPage;


use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;

#[Layout('layouts.admin')]
#[Title('Pages')]
class PList extends Component
{
    use Toast;


    public function render()
    {

        return view('livewire.cms.admin.pages.p-list');
    }

    public function delete(CmsPage $page)
    {
        $page->delete();
        $this->toast('success', 'Page deleted successfully');
    }
}
