@php
    $headers = [
        ['key' => 'name', 'label' => 'Section Name'],
        ['key' => 'layout', 'label' => 'Layout'],
        ['key' => 'order', 'label' => 'Order'],
        ['key' => 'cta_link', 'label' => 'CTA Link'],
        ['key'=> 'has_image', 'label' => 'Has Image'],
        ['key' => 'actions', 'label' => 'Actions', 'class' => 'w-40']
    ];
@endphp
<div class="container">
    @if($page->sections->isEmpty())
        <div class="grid place-items-center h-[calc(100vh-170px)]">
            <a href="/x/cms/{{ $page->id }}/s" class="btn btn-primary">Add Section</a>
        </div>
    @else
        <x-table :headers="$headers" :rows="$page->sections" link="/x/cms/{{ $page->id}}/s/{id}">
            @scope('header_actions', $header, $page)
                <span>{{ $header['label'] }}</span><x-button icon="mdi.plus" wire:navigate link="/x/cms/{{{ $page->id }}}/s" class="btn-primary btn-circle btn-sm mx-5" spinner="addSection" />

            @endscope


            @scope('cell_layout', $section)
                <x-badge class="badge-sm badge-info" value="{{ $section->layout }}" />
            @endscope

            @scope('cell_cta_link', $section)
                <span>{{ $section->linkedSection ? $section->linkedSection->name : 'N/A' }}</span>
            @endscope

            @scope('cell_has_image', $section)
                <x-icon class="text-{{ $section->image ? 'green-500' : 'red-500' }}" name="{{ $section->image ? 'mdi.check' : 'mdi.alpha-x' }}" />
            @endscope

        </x-table>

    @endif
</div>
