@php
    if($page->id){
        $formTitle = 'Edit ' . $page->title;
    } else {
        $formTitle = 'New Page';
    }
@endphp
<div class="container">
    <x-drawer class="lg:w-1/3" wire:model="showDrawer" title="Edit Page" with-close-button seperator>
        <x-form wire:submit="save">
            <x-input label="Title" wire:model="title" />
            <x-input label="Description" wire:model="description" />
            <x-input label="Keywords" wire:model="keywords" />
            <x-select label="Author" :options="$authors" wire:model="author" placeholder="Pick a DM" />
            <x-input label="Slug" wire:model.blur="slug" />
            <x-checkbox label="Published" wire:model="published" />
            {{-- <x-input label="Published At" wire:model="published_at" type="datetime-local" hidden /> --}}
            <x-button label="Save" type="submit" spinner="save" />
        </x-form>
        
    </x-drawer>

    <div>
        <x-button label="Back to List" icon="mdi.folder-arrow-left" link="/x/cms" wire:navigate class="btn-ghost" />
        <div class="join">
            <label class="btn btn-outline rounded-l-full join-item">Viewing {{ $title }}</label><x-button icon="mdi.pencil" class="join-item rounded-r-full btn-info" label="Page Info" wire:click="edit" spinner="edit" />
        </div>
    </div>
    
    @if($page->id)
        <livewire:cms.admin.pages.s-list :page="$page" />
    @else
        <div class="flex flex-col items-center justify-center h-64">
            <x-icon name="mdi.file-document-outline" class="text-6xl text-gray-400" />
            <p class="text-gray-400">Save the Page before adding Sections.</p>
        </div>
    @endif
</div>
 