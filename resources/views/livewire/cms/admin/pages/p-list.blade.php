@php
    $pages = App\Models\CmsPage::with('author')->paginate(10);
    //dd($pages);
    //Set arrays for livewire components
    $headers = [
        ['key' => 'title', 'label' => 'Title'],
        ['key' => 'slug', 'label' => 'Slug'],
        ['key' => 'published', 'label' => 'Published'],
        ['key' => 'author.name', 'label' => 'Author'],
        ['key' => 'actions', 'label' => 'Actions', 'class' => 'w-40']
    ];
    
@endphp
<div class="flex h-screeen">
    
    
    <x-table :headers="$headers" :rows="$pages" with-pagination>
        @scope('header_actions', $header)
            <span>{{ $header['label'] }}</span><x-button icon="mdi.plus" link="/x/cms/create" wire:navigate class="btn-primary btn-circle btn-sm mx-5" />

        @endscope

        @scope('cell_published', $page)
            @if($page->published)
                <x-icon name="mdi.check" class="text-green-500" />
            @else
                <x-icon name="mdi.close" class="text-red-500" />
            @endif
        @endscope

        {{-- @scope('cell_author.name', $page)
            @php
            dd($page);
            @endphp
            {{ $page->author->name }}
        @endscope --}}

       

        @scope('cell_actions', $page)
           
            <x-button link="/x/cms/{{ $page->id }}" wire:navigate class="btn-ghost" icon="mdi.pencil" spinner />
            {{-- <x-button wire:click="edit('{{ $user->id}}')" class="btn-ghost" icon="mdi.pencil" spinner /> --}}
            @if(auth()->user()->role == 'supmin' && $page->count() > 1)
                <x-button wire:confirm="Are you sure you want to delete this page?" wire:click="delete('{{ $page->id }}')" icon="mdi.delete" class="btn-error btn-sm" spinner="delete" />
            @endif
        @endscope

    </x-table>
    
</div>