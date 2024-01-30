<div id="{{ $section->url_safe_name }}" class="min-h-screen bg-left hero sm:bg-center" style="background-image: url('{{ asset('storage/'.$section->image) }}');">
  
  <div class="text-center text-white hero-content">
    <div class="max-w-md">
      
      <h1 class="mb-5 text-5xl font-bold" >{{ $section->title }}</h1>
      <p class="mb-5">{!! $section->content !!}</p>
        @if ($section->cta_link)
            <button @click="document.getElementById('{{ $section->url_safe_cta_link }}').scrollIntoView({ behavior: 'smooth' })" class="btn btn-primary">{{ $section->cta_text ?? 'Click here' }}</button>
        @endif
    </div>
  </div>
  <div class="hero-overlay bg-opacity-60"></div>
</div>