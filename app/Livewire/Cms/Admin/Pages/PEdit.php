<?php

// Namespace declaration
namespace App\Livewire\Cms\Admin\Pages;

// Importing required classes
use App\Models\User;
use Livewire\Component;
use App\Models\CmsPage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;

// Setting layout and title for the component
#[Layout('layouts.x')]
#[Title('Pages')]
class PEdit extends Component
{
    // Using Toast trait for showing notifications
    use Toast;
    // Declaring public variables

    public ?CmsPage $page;
    public $title;
    public $description;
    public $keywords;
    public $author;
    public $slug;
    public $published;
    public $published_at;
    public $showDrawer = false;

    public function rules()
    {


        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'author' => 'required|string|exists:users,id',
            'slug' => 'required|string|max:255|unique:cms_pages,slug,' . ($this->page->id ? $this->page->id : ''),
            'published' => 'nullable|boolean',
        ];
    }

    // Mount function to initialize the component
    public function mount(CmsPage $page)
    {
        if(!$page->id){
            $this->page = new CmsPage();
            $this->page->author = auth()->user()->id;
            $this->page->published = false;
            $this->showDrawer = true;
        } else {
            $this->page = $page;
        }
        $this->page = $page;
        $this->title = $page->title;
        $this->description = $page->description;
        $this->keywords = $page->keywords;
        $this->author = $page->author;
        $this->slug = $page->slug;
        $this->published = $page->published;
        //$this->published_at = $page->published_at;
    }

    // Function to show the edit drawer
    public function edit()
    {
        $this->showDrawer = true;
    }



    // Function to save the page
    public function save()
    {
        $validatedData = $this->validate();

        if($this->page->id){
            $this->page->update($validatedData);
            $this->showDrawer = false;
            $this->success('Page Updated');
        } else {
            $newPage = CmsPage::create($validatedData);
            $this->showDrawer = false;
            $this->success('Page Created');
            $this->redirect('/x/cms/' . $newPage->id);
        }
    }




    // Render function to display the view
    public function render()
    {
        $authors = User::all()
            ->filter(function ($user) {
                return $user->isAdmin();
            })
            ->map(function ($user) {
                return ['id' => $user->id, 'name' => $user->name];
            });

        return view('livewire.cms.admin.pages.p-edit', compact('authors'));
    }
}
