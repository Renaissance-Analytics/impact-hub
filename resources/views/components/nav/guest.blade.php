        <x-nav sticky full-width seperator progress-indicator>

            <x-slot:brand class="flex gap-2 items-center">
                <x-application-logo class="w-20 h-20" />
            </x-slot:brand>

            <x-slot:actions>

                @if (Route::has('login'))
                    <a href="{{ route('login') }}">
                        <x-mary-button type="button" class="btn-ghost" label="{{__('Login')}}" icon="mdi.login"/>
                    </a>
                @endif
                @if(Route::has('register'))
                    <a href="{{ route('register') }}">
                        <x-mary-button type="button" class="btn-ghost" label="{{__('Register')}}"
                                       icon="mdi.account-plus"/>
                    </a>
                @endif

            </x-slot:actions>
        </x-nav>
