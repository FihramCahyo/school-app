<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>

        @livewireStyles
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    </head>
    <body>
        @livewire('layouts.menu-navigation')
        {{ $slot }}

        @livewireScripts
    </body>
</html>
