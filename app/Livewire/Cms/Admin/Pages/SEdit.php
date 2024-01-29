<?php
// Migrations related to sections:
// - database/migrations/2024_01_16_193951_create_sections_table.php
// - database/migrations/2024_01_23_224359_add_support_for_choice_section_type_to_sections.php


namespace App\Livewire\Cms\Admin\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\File;

use App\Models\CmsSection;
use App\Models\CmsPage;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.x')]
#[Title('Sections')]
class SEdit extends Component
{
    use Toast, WithFileUploads;
    public ?CmsSection $section;

    public ?CmsPage $page;

    public $editing = false;
    public $imageUpdated = false;
    public $saved = false;

    public $name;
    public $layout;
    public $cms_page_id;
    public $order;
    public $bgcolor;
    public $cta_link;
    public $cta_text;
    public $title;
    public $content;
    public $image;
    public $status;
    //Support for Page Choise Section Type
    public $page_one_id;
    public $page_one_blurb;
    public $page_one_image;
    public $page_one_color;
    public $page_one_cta_text;
    public $page_one_cta_icon;

    public $page_two_id;
    public $page_two_blurb;
    public $page_two_image;
    public $page_two_color;
    public $page_two_cta_icon;
    public $page_two_cta_text;


    public $returnUrl;

    public $previewImageUrl = null;
    //Variables for the form
    public $layouts;
    public $cta_links;
    public $pages;

   //TODO: Add Content Layout Previews


    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'layout' => 'required|string|max:255',
            'cms_page_id' => 'required|string',
            'order' => 'required|integer',
            'bgcolor' => 'nullable|string|max:255',
            'cta_link' => 'nullable|integer|max:255',
            'cta_text' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'status' => 'nullable|string|max:255',
            //Support for Page Choise Section Type
            'page_one_id' => 'nullable|string|max:255',
            'page_one_blurb' => 'nullable|string|max:255',
            'page_one_image' => 'nullable|string|max:255',
            'page_one_color' => 'nullable|string|max:255',
            'page_one_cta_icon' => 'nullable|string|max:255',
            'page_one_cta_text' => 'nullable|string|max:255',
            'page_two_id' => 'nullable|string|max:255',
            'page_two_blurb' => 'nullable|string|max:255',
            'page_two_image' => 'nullable|string|max:255',
            'page_two_color' => 'nullable|string|max:255',
            'page_two_cta_icon' => 'nullable|string|max:255',
            'page_two_cta_text' => 'nullable|string|max:255',
        ];
    }

    public function mount(?CmsSection $section, CmsPage $page)
    {
        //Get CMS Layouts
        $this->layouts = collect(File::files(resource_path('views/livewire/cms/sections')))
        ->map(fn ($file) => [
            'id' => $name = explode('.', $file->getFilenameWithoutExtension())[0],
            'name' => ucfirst($name)
        ]);

        //Get Section Id's for sections that belong to a page
        $this->cta_links = $page->sections->map(function ($ctasection) use ($section) {
            if ($ctasection->id !== $section->id) {
                return [
                    'id' => $ctasection->id,
                    'name' => $ctasection->name,
                ];
            }
        })->filter()->toArray();

        $this->pages = CmsPage::all()->map(function ($page) {
            return ['id' => $page->id, 'name' => $page->title];
        })->toArray();

        $this->page = $page->loadCount('sections');
        $this->returnUrl = '/x/cms/'.$page->id;



        if($section->id){
            $this->previewImageUrl = $section->id ? asset('storage/'.$section->image) : null;
            $this->section = $section;
            //$this->image = $section->image;
            $this->editing = true;

        }else{
            $this->section = new CmsSection();
            $this->editing = false;
        }

        // Set the matching public variables to the $section data
        $this->name = $this->section->name;
        $this->layout = $this->section->layout;
        if($this->layout == 'choice'){
            $this->choicesContent = json_decode($this->section->content);
        }else{

        }

        if(!$section->id){
            $this->cms_page_id = $page->id;
            $this->order = $page->sections_count + 1;
        }else{
            $this->cms_page_id = $this->section->cms_page_id;
            $this->order = $this->section->order;

        }
        $this->bgcolor = $this->section->bgcolor;
        $this->cta_link = $this->section->cta_link;
        $this->cta_text = $this->section->cta_text;
        $this->title = $this->section->title;
        $this->content = $this->section->content;
        $this->image = $this->section->image;
        $this->status = $this->section->status;
        //Support for Page Choise Section Type
        $this->page_one_id = $this->section->page_one_id;
        $this->page_one_blurb = $this->section->page_one_blurb;
        $this->page_one_image = $this->section->page_one_image;
        $this->page_one_color = $this->section->page_one_color;
        $this->page_one_cta_icon = $this->section->page_one_cta_icon;
        $this->page_one_cta_text = $this->section->page_one_cta_text;
        $this->page_two_id = $this->section->page_two_id;
        $this->page_two_blurb = $this->section->page_two_blurb;
        $this->page_two_image = $this->section->page_two_image;
        $this->page_two_color = $this->section->page_two_color;
        $this->page_two_cta_icon = $this->section->page_two_cta_icon;
        $this->page_two_cta_text = $this->section->page_two_cta_text;

    }
    //Reset Image
    public function clearImage()
    {
        $this->image = null;
        $this->previewImageUrl = null;
        $this->imageUpdated = true;
    }



    public function delete()
    {
        if($this->section->delete()){
            $this->success('Section deleted successfully!');
            $this->redirect($this->returnUrl);
        } else {
            $this->error('Error deleting section!');
        }
    }

    public function save()
    {

        $validatedData = $this->validate();
        if($this->image && $this->imageUpdated){
            $validatedData['image'] = $this->image->store('cms', 'public');

        }

        if($this->section->id){
            if($this->section->update($validatedData)){
                $this->success('Section Updated!');
                $this->saved = true;

            }else{
                $this->error('Error updating section!');
            }
            $this->success('Section Saved!');
            $this->saved = true;

        }else{
            CmsSection::create($validatedData);
            $this->success('New Section Saved!');
            $this->saved = true;
        }

    }

    public function render()
    {
        return view('livewire.cms.admin.pages.s-edit');
    }



    public function updating($name, $value)
    {
        if($name == 'image'){
            $this->imageUpdated = true;
            $this->previewImageUrl = $value->temporaryUrl();
        }
    }

}
