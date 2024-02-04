<x-base-layout :title="$page->title ?? ''" :description="$page->description ?? ''" :keywords="$page->keywords ?? ''">



    {{-- <x-main full-width>

        <x-slot:content class="sm:px-5"> --}}
            @if($page->sections->isEmpty())
                <div class="min-h-screen hero">
                    <div class="text-center hero-content">
                        <div class="max-w-md">
                            <div class="py-5 text-center">
                                    <h2 class="text-lg font-semibold text-gray-600">Coming Soon...</h2>
                                </div>
                        </div>
                    </div>

                </div>
            @else
                @foreach($page->sections as $section)
                    @livewire('cms.sections.' . $section->layout, ['section' => $section])
                @endforeach
            @endif
        {{-- </x-slot:content>
    </x-main> --}}

</x-base-layout>
