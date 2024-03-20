<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="cupcake">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ? $settings->brandName->value . ' - '.$title : $settings->brandName->value }}</title>
        <meta name="description" content="{{ $description ?? '' }}">
        <meta name="keywords" content="{{ $keywords ?? '' }}">

        <meta property="og:url"                content="http://www.nytimes.com/2015/02/19/arts/international/when-great-minds-dont-think-alike.html" />
        <meta property="og:type"               content="article" />
        <meta property="og:title"              content="{{ $ogtitle ?? '' }}" />
        <meta property="og:description"        content="{{ $ogdescription ?? '' }}" />
        <meta property="og:image"              content="{{ $ogimage ?? '' }}" />


        <link rel="icon" href="{{ $favicon }}" type="image/x-icon" />

        @yield('head')

        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
   <body class="min-h-screen font-sans antialiased">
    @php
        $currentUrl = url()->current();
        $admin = $currentUrl == (url('/admin') || Str::startsWith($currentUrl, url('/admin/'))) && auth()->check() && auth()->user()->isAdmin();
    @endphp
        @if($admin ?? false)
            <x-nav.admin />
        @elseif(auth()->check())
            <x-nav.game />
        @else
            <x-nav.guest />
        @endif
   {{$slot}}

        <footer class="bg-gray-100 dark:bg-gray-800">
            <div class="container flex items-center justify-between px-6 py-3 mx-auto">
                <a href="#" class="text-xl font-bold text-white hover:text-gray-200">{{ $settings->appName->value }}</a>
                <p class="py-2 text-white sm:py-0">All rights reserved</p>
            </div>
        </footer>
        <x-toast />
        <x-pbs />
        @livewireScripts
    </body>
</html>
