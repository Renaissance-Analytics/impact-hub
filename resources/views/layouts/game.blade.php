<x-base-layout :title="$title">

    <x-main with-nav full-width>
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main>
</x-base-layout>
