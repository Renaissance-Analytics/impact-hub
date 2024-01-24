<x-layouts.base :title="$title">
    
    <x-main with-nav full-width>
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main>
</x-layouts.base>