@php
    if($page->id){
        $formTitle = 'Edit ' . $page->title;
    } else {
        $formTitle = 'New Page';
    }
@endphp
<div class="container">
    <x-drawer class="lg:w-1/3" wire:model="showDrawer" title="Edit Page" with-close-button seperator>
        <x-form wire:submit="save" class="flex">
            <x-input label="Title" wire:model="title" />
            <x-input label="Description" wire:model="description" />
            <x-input label="Keywords" wire:model="keywords" />
            <x-select label="Author" :options="$authors" wire:model="author" placeholder="Pick a DM" />
            <x-input label="Slug" wire:model.blur="slug" />
            <x-checkbox label="Published" wire:model="published" />
            <div class="divider divider-horizontal">OGMeta</div>
            {{-- <x-input label="Application Name" wire:model="application_name" /> --}}
            {{-- TODO: Add better support for Twitter cards --}}
            {{-- <x-input label="Type Card" wire:model="type_card" /> --}}
            <x-input label="Image" wire:model="image" />
            <x-input label="Copyright" wire:model="copyright" />
            <hr class="my-5" />
            <x-button label="Save" type="submit" spinner="save" />
        </x-form>
        
    </x-drawer>

    <div>
        <x-button label="Back to List" icon="mdi.folder-arrow-left" link="/admin/cms" wire:navigate class="btn-ghost" />
        <div class="join">
            <label class="rounded-l-full btn btn-outline join-item">Viewing {{ $title }}</label><x-button icon="mdi.pencil" class="rounded-r-full join-item btn-info" label="Page Info" wire:click="edit" spinner="edit" />
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