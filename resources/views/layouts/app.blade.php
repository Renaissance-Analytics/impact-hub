<x-base-layout :title="$title">
        <x-banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
{{--            @livewire('navigation-menu')--}}

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')
</x-base-layout>
