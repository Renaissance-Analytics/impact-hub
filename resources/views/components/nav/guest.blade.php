        <x-nav sticky full-width seperator progress-indicator>
            
            <x-slot:brand class="flex gap-2 items-center">
                <x-application-logo class="w-20 h-20" />
            </x-slot:brand>
            
            <x-slot:actions>
            
                <x-button class="btn-ghost" label="{{__('Login')}}" icon="mdi.login" link="/login" />
                <x-button class="btn-ghost" label="{{__('Register')}}" icon="mdi.account-plus" link="/register" />
            
            </x-slot:actions>
        </x-nav>