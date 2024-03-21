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
                    <div>
                        <x-input label="Name" wire:model="name" icon="mdi.asterisk" />
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <x-select label="Layout" :options="$layouts" wire:model.blur="layout" icon="mdi.asterisk" placeholder="Pick One" />
                        @error('layout') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    
                    <div>
                        <x-input label="Order" wire:model="order" type="number" icon="mdi.asterisk" />
                        @error('order') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <x-select label="Status" :options="[['id'=>'draft', 'name'=>'Draft'], ['id'=>'published', 'name'=>'Published']]" wire:model="status" />
                        @error('status') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    
                    <div>
                        <x-input label="Background Color" wire:model="bgcolor" />
                        @error('bgcolor') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="col-span-2">
                    @if(!$image)
                        <x-file label="Image" hint="Only PNG/JPG" wire:model="new_image" accept="image/png, image/jpeg" />
                        @error('image') <span class="error">{{ $message }}</span> @enderror
                                                
                        <div class="col-span-2">
                            <x-loading class="loading-infinity" wire:loading wire:model="image" />
                        </div>
                    @else
                        <div class="col-span-2">
                            <x-button class="btn-warning" label="Clear Saved Image" wire:click="clearImage" spinner="clearImage" />
                        </div>
                    @endif
                        @error('new_image') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <x-header title="Content Options" class="col-span-2" />
                    <div>
                        <x-input label="Title" wire:model="title" />
                        @error('title') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <x-select label="CTA Link" :options="$cta_links" wire:model="cta_link" placeholder="Link to Section"/>
                        @error('cta_link') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <x-input label="CTA Text" wire:model="cta_text" />
                        @error('cta_text') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-2">
                        <x-markdown label="Content - Markdown" wire:model="content" folder="cms/content/images" />
                        @error('content') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    
                    
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
 