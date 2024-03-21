<div id="{{ $section->url_safe_name }}" class="min-h-screen hero" style="background-color:{{ $section->bgcolor }}">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

@php
    if ($section->cta_link) {
        $style='';
    }

@endphp
@if ($section->image)
    <div class="flex-col hero-content lg:flex-row">
        <img src="{{ asset('storage/'.$section->image) }}" alt="{{ $section->title }}" class="max-w-sm rounded-lg shadow-2x1" />
        <div>
            <h1 class="text-5xl font-bold">{{ $section->title }}</h1>
            @if(Str::contains($section->content, ['<', '>'])) <!-- Check if content contains HTML tags -->
                <p class="py-6">{!! $section->content !!}</p> <!-- Render as HTML -->
            @else
                <p class="py-6">{!! Str::markdown($section->content) !!}</p> <!-- Render as Markdown -->
            @endif
        @if ($section->cta_link)
            <button @click="document.getElementById('{{ $section->url_safe_cta_link }}').scrollIntoView({ behavior: 'smooth' })" class="btn btn-primary">{{ $section->cta_text ?? 'Click here' }}</button>
        @endif
        </div>
    </div>
    
@else
    <div class="text-center hero-content">
        <div class="max-w-md">
            <h1 class="text-5xl font-bold">{{ $section->title }}</h1>
            @if(Str::contains($section->content, ['<', '>'])) <!-- Check if content contains HTML tags -->
                <p class="py-6">{!! $section->content !!}</p> <!-- Render as HTML -->
            @else
                <p class="py-6">{!! Str::markdown($section->content) !!}</p> <!-- Render as Markdown -->
            @endif
        @if ($section->cta_link)
            <button @click="document.getElementById('{{ $section->url_safe_cta_link }}').scrollIntoView({ behavior: 'smooth' })" class="btn btn-primary">{{ $section->cta_text ?? 'Click here' }}</button>
        @endif
        </div>
    </div>
@endif
</div>
