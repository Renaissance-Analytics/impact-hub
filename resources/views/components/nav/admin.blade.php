{{-- The navbar with `sticky` and `full-width` --}}
        <x-nav sticky full-width seperator progress-indicator>

            <x-slot:brand class="flex gap-2 items-center">
                <x-application-logo class="w-20 h-20" />
            </x-slot:brand>
            <x-slot:actions>
                <x-theme-toggle />
                <div class="join">
                <x-button label="Dashboard" class="join-item" icon="mdi.monitor-dashboard" link="/x" />
                <x-button label="Game Manager" class="join-item" icon="mdi.gamepad-outline" link="/x/game" />
                <x-button label="Users" icon="mdi.account-group" class="join-item" link="/x/users" />
                <x-button label="CMS" icon="mdi.book-edit" class="join-item" link="/x/cms" />
                <x-button label="Settings" icon="mdi.cog" class="join-item" link="/x/settings" />
                <x-dropdown>
                    <x-slot:trigger>
                        <x-button icon="mdi.account-circle" class="join-item" />
                    </x-slot:trigger>
                    <x-menu-item title="Account" icon="mdi.account-cog" link="/account" />
                    <x-menu-item title="Log Out" icon="mdi.logout" link="/logout" />
                </x-dropdown>
                </div>
            </x-slot:actions>
        </x-nav>