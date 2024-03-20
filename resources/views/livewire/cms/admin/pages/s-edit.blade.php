@php

    $cardTitle = $editing ? 'Editing ' : 'Creating ';
@endphp
@section('head')
    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
@endsection

<div class="min-h-screen hero" style="background-image: url('{{ $previewImageUrl }}');">
<div class="hero-overlay bg-opacity-60"></div>

    {{-- Success is as dangerous as failure. --}}
    <div class="w-2/3 hero-content">
        <div class="flex w-full p-2 rounded lg:flex-row bg-neutral-100">
        
            
            <x-form wire:submit="save" class="w-full">
                <div class="grid w-full grid-cols-2 gap-4">
                    <x-input label="Name" wire:model="name" icon="mdi.asterisk" />
                    <x-select label="Layout" :options="$layouts" wire:model.blur="layout" icon="mdi.asterisk" placeholder="Pick One" />
                    
                    <x-input label="Order" wire:model="order" type="number" icon="mdi.asterisk" />
                    <x-select label="Status" :options="[['id'=>'draft', 'name'=>'Draft'], ['id'=>'published', 'name'=>'Published']]" wire:model="status" />
                    
                    <x-input label="Background Color" wire:model="bgcolor" />
                    
                    
                    @if(!$image)
                        <x-file label="Image" hint="Only PNG/JPG" wire:model="image" accept="image/png, image/jpeg" class="col-span-2"/>
                        @error('image') <span class="error">{{ $message }}</span> @enderror
                                                
                        <div class="col-span-2">
                            <x-loading class="loading-infinity" wire:loading wire:model="image" />
                        </div>
                    @else
                        <div class="col-span-2">
                            <x-button class="btn-warning" label="Clear Saved Image" wire:click="clearImage" spinner="clearImage" />
                        </div>
                    @endif
                    <x-header title="Content Options" class="col-span-2" />
                    <x-input label="Title" wire:model="title" />
                    <x-select label="CTA Link" :options="$cta_links" wire:model="cta_link" placeholder="Link to Section"/>
                    <x-input label="CTA Text" wire:model="cta_text" />
                    <x-markdown label="Content" wire:model="content" folder="cms/content/images" />
                    {{-- Show Choice options based on layout type --}}
                    @if($layout == 'choice')
                        <x-tabs selected='page-one'>
                        {{-- Page One --}}
                            <x-tab name='page-one' icon="mdi.numeric-1-circle" class="col-span-2">
                                <x-select label="Page One" :options="$pages" wire:model="page_one_id" />
                                <x-input label="Blurb" wire:model="page_one_blurb" />
                                <x-input label="Image" wire:model="page_one_image" />
                                <x-input label="Color" wire:model="page_one_color" />
                                <x-input label="CTA Icon" wire:model="page_one_cta_icon" />
                                <x-input label="CTA Text" wire:model="page_one_cta_text" />
                            </x-tab>
                        {{-- Page Two --}}
                            <x-tab name='page-two' label='Page Two' icon="mdi.numeric-2-circle" class="col-span-2">
                                <x-select label="Page Two" :options="$pages" wire:model="page_two_id" />
                                <x-input label="Blurb" wire:model="page_two_blurb" />
                                <x-input label="Image" wire:model="page_two_image" />
                                <x-input label="Color" wire:model="page_two_color" />
                                <x-input label="CTA Icon" wire:model="page_two_cta_icon" />
                                <x-input label="CTA Text" wire:model="page_two_cta_text" />
                            </x-tab>
                    
                        </x-tabs>

                    @endif
                
                    <div class="col-span-2 text-align-right">
                        @if($editing)
                            <x-button label="Delete" wire:click.prevent="delete" class="btn-danger justify-self-start" spinner="delete" />
                        @endif

                        <x-button label="Cancel" link="{{ $returnUrl }}" wire:navigate class="btn-ghost" />
                        <x-button label="Save" type="submit" class="btn-primary" spinner="save" />
                        <x-input wire:model="cms_page_id" hidden />
                        @if($saved)
                            <x-alert class="mt-5 alert-success" message="Saved Successfully">
                                <x-slot name="actions">
                                    <x-button label="..Back to {{ $page->title }}" link="{{ $returnUrl }}" />
                                </x-slot>
                            </x-alert>
                        @endif
                    </div>
                </div>
                
            </x-form>
        </div>
    </div>
 