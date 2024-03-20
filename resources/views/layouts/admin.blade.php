<x-base-layout :title="'Admin'">


    @php
        $currentUrl = url()->current();
        $isGame = $currentUrl == url('/admin/game') || Str::startsWith($currentUrl, url('/admin/game/'));
    @endphp
    {{-- The main content with `full-width`  --}}
    <x-main full-width class="p-0 m-0">
        @if($isGame)
            <x-slot:sidebar drawer="main-drawer" collapsable class="bg-base-100 lg:bg-inherit">
                <x-menu>
                    <x-menu-sub  title="Levels">
                        <x-menu-item link="/admin/game/levels/" icon="mdi.view-list">List</x-menu-item>
                        <x-menu-item link="/admin/game/levels/create" icon="mdi.plus">Create</x-menu-item>
                    </x-menu-sub>
                    <x-menu-sub  title="Actions">
                        <x-menu-item link="/admin/game/actions/" icon="mdi.view-list">List</x-menu-item>
                        <x-menu-item link="/admin/game/actions/create" icon="mdi.plus">Create</x-menu-item>
                    </x-menu-sub>
                    <x-menu-sub  title="Multipliers">
                        <x-menu-item link="/admin/game/multipliers/" icon="mdi.view-list">List</x-menu-item>
                        <x-menu-item link="/admin/game/multipliers/create" icon="mdi.plus">Create</x-menu-item>
                    </x-menu-sub>
                    <x-menu-sub  title="Streaks">
                        <x-menu-item link="/admin/game/streaks/" icon="mdi.view-list">List</x-menu-item>
                        <x-menu-item link="/admin/game/streaks/create" icon="mdi.plus">Create</x-menu-item>
                    </x-menu-sub>
                    <x-menu-sub  title="Achievements">
                        <x-menu-item link="/admin/game/achievements/" icon="mdi.view-list">List</x-menu-item>
                        <x-menu-item link="/admin/game/achievements/create" icon="mdi.plus">Create</x-menu-item>
                    </x-menu-sub>
                    <x-menu-sub  title="Quests">
                        <x-menu-item link="/admin/game/quests/" icon="mdi.view-list">List</x-menu-item>
                        <x-menu-item link="/admin/game/quests/create" icon="mdi.plus">Create</x-menu-item>
                    </x-menu-sub>
                    <x-menu-sub  title="Settings">
                        <x-menu-item link="/admin/game/settings/" icon="mdi.view-list">List</x-menu-item>
                        <x-menu-item link="/admin/game/settings/create" icon="mdi.plus">Create</x-menu-item>
                    </x-menu-sub>
                </x-menu>
            </x-slot:sidebar>
        @endif



        {{-- The `$slot` goes here --}}
        <x-slot:content class="p-0 m-0">
            {{ $slot }}
        </x-slot:content>


    </x-main>
</x-base-layout>
