
    @php
        $useIcon = gettype($settings->useIconLogo);
        $logoclass = "w-auto max-h-60";
    @endphp
@switch(true)
    @case($settings->useIconLogo == "0" && $settings->fullLogo)
        <div class="hidden-when-collapsed ml-5 text-4xl text-[{{ $settings->primaryColor }}]">
            <img src="{{ asset('storage/'.$settings->fullLogo) }}" alt="{{ $settings->brandName }}" title="{{ $settings->brandName }}" class="{{ $logoclass }}" />
        </div>
        @break
    @case($settings->useIconLogo == "1" && $settings->iconLogo && $settings->fullLogo)
        <div class="ml-5 text-4xl display-when-collapsed">
            <img src="{{ asset('storage/'.$settings->iconLogo) }}" alt="{{ $settings->brandName }}" class="w-auto max-h-16" />
        </div>
        <div class="hidden-when-collapsed ml-5 text-4xl text-[{{ $settings->primaryColor }}]"><img src="{{ asset('storage/'.$settings->fullLogo) }}" alt="{{ $settings->brandName }}" title="{{ $settings->brandName }}" class="{{ $logoclass }}" /></div>
        @break
    @case($settings->useIconLogo =="1" && $settings->iconLogo && $settings->brandName)
        <div class="ml-5 text-4xl display-when-collapsed">
            <img src="{{ asset('storage/'.$settings->iconLogo) }}" alt="{{ $settings->brandName }}" class="{{ $logoclass }}" />
        </div>
        <div class="hidden-when-collapsed ml-3 text-4xl text-[{{ $settings->primaryColor }}]">{{ $settings->brandName }}</div>
        @break
    @default
        <div class="hidden-when-collapsed ml-5 text-4xl text-[{{ $settings->primaryColor }}]">{{ $settings->brandName }}</div>
        @break
@endswitch




