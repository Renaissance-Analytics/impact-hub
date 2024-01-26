        <x-nav sticky full-width seperator progress-indicator>
            
            <x-slot:brand class="flex gap-2 items-center">
                <x-application-logo class="w-20 h-20" />
            </x-slot:brand>
            
            <x-slot:actions>

                <x-theme-toggle />
                <x-button icon="mdi.home" link="/game" />
                <div class="join">
                    
                    <x-button label="{{__('Quest Giver')}}" icon="rpg.raven" link="/game/giver" class="join-item"/>
                    <x-dropdown>
                        <x-slot:trigger>
                            <x-button label="{{__('My Stuff')}}" icon="mdi.gamepad-outline" class="join-item" />
                        </x-slot:trigger>
                        <x-menu-item title="{{__('My Profile')}}" icon="rpg.player" link="/game/profile" />
                        <x-menu-item title="{{__('Quest Log')}}" icon="rpg.book" link="/game/log" />
                        <x-menu-item title="{{__('Inventory')}}" icon="mdi.sack" link="/game/log" />
                    </x-dropdown>
                    
                    <x-dropdown>
                        <x-slot:trigger>
                            <x-button label="{{__('Guilds')}}" icon="mdi.home-group" class="join-item" />
                        </x-slot:trigger>
                        <x-menu-item title="{{__('My Guild')}}" icon="rpg.double-team" link="/game/my-guild" />
                        <x-menu-item title="{{__('Guild List')}}" icon="mdi.list-box" link="/game/guild-list" />
                    </x-dropdown>
                    
                    @if(auth()->check() && auth()->user()->isAdmin())
                        <x-button label="{{__('Admin')}}" icon="mdi.book-edit" link="/x" class="join-item" />
                    @endif
                    <x-dropdown seperator>
                        <x-slot:trigger>
                            <x-button icon="mdi.account-circle" class="join-item" />
                        </x-slot:trigger>
                        <x-menu-item title="{{__('Account')}}" icon="mdi.account-cog" link="/account" />
                        <x-menu-item title="{{__('Log Out')}}" icon="mdi.logout" link="/logout" />
                    </x-dropdown>
                </div>
           
            </x-slot:actions>
        </x-nav>