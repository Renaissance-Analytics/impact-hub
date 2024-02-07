{{-- The navbar with `sticky` and `full-width` --}}
        <x-nav sticky full-width seperator progress-indicator>

            <x-slot:brand class="flex items-center gap-2">
                <x-application-logo class="w-20 h-20" />
            </x-slot:brand>
            <x-slot:actions>
                <x-theme-toggle />
                <div class="join">
                <x-button label="Dashboard" class="join-item" icon="mdi.monitor-dashboard" link="/admin" />
                <x-button label="Game Manager" class="join-item" icon="mdi.gamepad-outline" link="/admin/game" />
                <x-button label="Users" icon="mdi.account-group" class="join-item" link="/admin/users" />
                <x-button label="CMS" icon="mdi.book-edit" class="join-item" link="/admin/cms" />
                <x-button label="Settings" icon="mdi.cog" class="join-item" link="/admin/settings" />
                <x-dropdown>
                    <x-slot:trigger>
                        <x-button icon="mdi.account-circle" class="join-item" />
                    </x-slot:trigger>
                    <x-menu-item title="Account" icon="mdi.account-cog" link="/account" />
                    <form method="POST" action="{{ route('logout') }}" id="logout-form" x-data>
                        @csrf
                        <!-- Mary UI Menu Item -->
                        <x-menu-item title="{{ __('Log Out') }}" icon="mdi.logout"
                                     @click.prevent="$root.submit();">
                        </x-menu-item>
                    </form>
                </x-dropdown>
                </div>
            </x-slot:actions>
        </x-nav>
