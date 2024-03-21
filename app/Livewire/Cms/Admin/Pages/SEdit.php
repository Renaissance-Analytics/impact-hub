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

#[Layout('layouts.admin')]
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
    


    public $returnUrl;
    public $new_image;
    public $previewImageUrl = null;
    //Variables for the form
    public $layouts;
    public $cta_links;
    public $pages;

   //TODO: Add Content Layout Previews


    

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
        $this->returnUrl = '/admin/cms/'.$page->id;



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
            $this->content = json_decode($this->section->content);
        }else{
            $this->content = $this->section->content;
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
        // $this->page_one_id = $this->section->page_one_id;
        // $this->page_one_blurb = $this->section->page_one_blurb;
        // $this->page_one_image = $this->section->page_one_image;
        // $this->page_one_color = $this->section->page_one_color;
        // $this->page_one_cta_icon = $this->section->page_one_cta_icon;
        // $this->page_one_cta_text = $this->section->page_one_cta_text;
        // $this->page_two_id = $this->section->page_two_id;
        // $this->page_two_blurb = $this->section->page_two_blurb;
        // $this->page_two_image = $this->section->page_two_image;
        // $this->page_two_color = $this->section->page_two_color;
        // $this->page_two_cta_icon = $this->section->page_two_cta_icon;
        // $this->page_two_cta_text = $this->section->page_two_cta_text;

    }
    //Reset Image
    public function clearImage()
    {
        $this->image = null;
        $this->previewImageUrl = null;
        $this->new_image = null;
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
        $rules = [
            'name' => 'required|string|max:255',
            'layout' => 'required|string|max:255',
            'cms_page_id' => 'required|string',
            'order' => 'required|integer',
            'bgcolor' => 'nullable|string|max:255',
            'cta_link' => 'nullable|integer|max:255',
            'cta_text' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'new_image' => 'nullable|image|max:2048',
            'content' => 'nullable|string',
            'status' => 'nullable|string|max:255',
        ];

        //dd($this->image);
        $validatedData = $this->validate($rules);

        // Handle image upload if a new image is provided and marked for update
        if ($this->new_image && $this->imageUpdated) {
            // Delete the old image from storage if it exists
            if ($this->section->image) {
                Storage::disk('public')->delete($this->section->image);
            }
            // Store the new image and update the validated data with the new image path
            $validatedData['image'] = $this->new_image->store('cms', 'public');
        }

        // Check if we are updating an existing section or creating a new one
        if ($this->section->exists) {
            // Update the existing section
            $updateStatus = $this->section->update($validatedData);
            if ($updateStatus) {
                $this->success('Section updated successfully!');
            } else {
                $this->error('Error updating section!');
            }
        } else {
            // Create a new section
            $newSection = CmsSection::create($validatedData);
            if ($newSection) {
                $this->success('New section saved successfully!');
                // Update the component's section property to reflect the newly created section
                $this->section = $newSection;
            } else {
                $this->error('Error saving new section!');
            }
        }

        // Redirect to the return URL after successful save/update
        $this->redirect($this->returnUrl);
    }

    public function render()
    {
        return view('livewire.cms.admin.pages.s-edit');
    }



    public function updating($name, $value)
    {
        if($name == 'new_image'){
            $this->imageUpdated = true;
            $this->previewImageUrl = $value->temporaryUrl();
        }
    }

}
