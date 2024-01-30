        <x-nav sticky full-width seperator progress-indicator>
            
            <x-slot:brand class="flex items-center gap-2">
                <x-application-logo  />
            </x-slot:brand>
            
            <x-slot:actions>
            
                <div class="hidden md:block">
                    <x-button class="btn-ghost" label="{{__('Login')}}" icon="mdi.login" link="/login" />
                    <x-button class="btn-ghost" label="{{__('Register')}}" icon="mdi.account-plus" link="/register" />
                </div>
                <div class="md:hidden">
                    <label class="btn-ghost" for='showMobileMenu'><x-icon name="mdi.menu" /></label>
                    <x-drawer right id="showMobileMenu">
                        <div class="join join-vertical">
                            <x-button class="btn-ghost join-item" label="{{__('Login')}}" icon="mdi.login" link="/login" />
                            <x-button class="btn-ghost join-item" label="{{__('Register')}}" icon="mdi.account-plus" link="/register" />
                        </div>
                    </x-drawer>
                </div>
            </x-slot:actions>
        </x-nav>