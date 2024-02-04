
    @php
        $showIcon = $settings->showIcon->value;
        $brand = $settings->brandDisplay->value;
        $logoclass = "w-auto max-h-16";
    @endphp
    @if($showIcon == "1")
        <div class="ml-5 text-4xl display-when-collapsed">
            <a href="/" wire:navigate title="{{ $settings->brandName->value }} Home"><img src="{{ asset('storage/'.$settings->iconLogo->value) }}" alt="{{ $settings->brandName->value }}" class="{{ $logoclass }}" /></a>
        </div>
    @endif

    @if($brand == "full_logo")
        <div class="hidden-when-collapsed ml-5 text-4xl text-[{{ $settings->primaryColor->value }}]"><a href="/"" wire:navigate title="{{ $settings->brandName->value }} Home"><img src="{{ asset('storage/'.$settings->fullLogo->value) }}" alt="{{ $settings->brandName->value }}" title="{{ $settings->brandName->value }}" class="{{ $logoclass }}" /></a></div>
    @elseif($brand == "brand_name")
        <div class="hidden-when-collapsed ml-3 text-4xl text-[{{ $settings->primaryColor->value }}]"><a href="/" wire:navigate title="{{ $settings->brandName->value }} Home">{{ $settings->brandName->value }}</a></div>
    @endif




