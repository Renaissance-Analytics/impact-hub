
@php
    $showIcon = $settings->showIcon;
    $brand = $settings->brandDisplay;
    $logoclass = "w-auto max-h-16";
@endphp
@if($showIcon == "1")
    <div class="ml-5 text-4xl display-when-collapsed">
        <img src="{{ asset('storage/'.$settings->iconLogo) }}" alt="{{ $settings->brandName }}" class="{{ $logoclass }}" />
    </div>
@endif

@if($brand == "full_logo")
    <div class="hidden-when-collapsed ml-5 text-4xl text-[{{ $settings->primaryColor }}]"><img src="{{ asset('storage/'.$settings->fullLogo) }}" alt="{{ $settings->brandName }}" title="{{ $settings->brandName }}" class="{{ $logoclass }}" /></div>
@elseif($brand == "brand_name")
    <div class="hidden-when-collapsed ml-3 text-4xl text-[{{ $settings->primaryColor }}]">{{ $settings->brandName }}</div>
@endif



