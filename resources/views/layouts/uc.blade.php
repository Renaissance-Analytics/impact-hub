<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? '' }}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="min-h-screen font-sans antialiased">
<div class="hero min-h-screen" style="background-image: url('{{ $bgimg }}')">
    <div class="hero-overlay bg-opacity-60"></div>
    <div class="text-center hero-content text-neutral-content">
        <div class="max-w-md">
            {{ $slot }}
        </div>
    </div>
</div>


{{-- <x-main full-width>

    <x-slot:content>
        {{ $slot }}
    </x-slot:content>
</x-main> --}}
@livewireScripts
<x-toast/>
<x-pbs/>
</body>
</html>
