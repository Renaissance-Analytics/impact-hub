<x-layouts.base :title="$page->title ?? ''" :description="$page->description ?? ''" :keywords="$page->keywords ?? ''">

    
        
    {{-- <x-main full-width>
     
        <x-slot:content class="sm:px-5"> --}}
            @if($page->sections->isEmpty())
                <div class="hero min-h-screen">
                    <div class="hero-content text-center">
                        <div class="max-w-md">
                            <div class="text-center py-5">
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
    
</x-layouts.base>
