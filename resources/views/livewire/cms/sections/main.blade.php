<div id="{{ $section->url_safe_name }}" class="hero min-h-screen" style="background-color:{{ $section->bgcolor }}">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

@php
    if ($section->cta_link) {
        $style='';
    }

@endphp
@if ($section->image)
    <div class="hero-content flex-col lg:flex-row">
        <img src="{{ asset('storage/'.$section->image) }}" alt="{{ $section->title }}" class="max-w-sm rounded-lg shadow-2x1" />
        <div>
            <h1 class="text-5xl font-bold">{{ $section->title }}</h1>
            <p class="py-6">{!! $section->content !!}</p>
        @if ($section->cta_link)
            <button @click="document.getElementById('{{ $section->url_safe_cta_link }}').scrollIntoView({ behavior: 'smooth' })" class="btn btn-primary">{{ $section->cta_text ?? 'Click here' }}</button>
        @endif
        </div>
    </div>
    
@else
    <div class="hero-content text-center">
        <div class="max-w-md">
            <h1 class="text-5xl font-bold">{{ $section->title }}</h1>
            <p class="py-6">{!! $section->content !!}</p>
        @if ($section->cta_link)
            <button @click="document.getElementById('{{ $section->url_safe_cta_link }}').scrollIntoView({ behavior: 'smooth' })" class="btn btn-primary">{{ $section->cta_text ?? 'Click here' }}</button>
        @endif
        </div>
    </div>
@endif
</div>
