<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'Welcome to Cubase' }}</title>
</head>

<body>
    <nav class="justify-between py-3 px-20 w-full flex shadow-md">
        <span class="font-bold text-2xl text-[#69e95d]">Cubase Store</span>
        <div class="flex flex-row gap-6">
            <a href="{{ url('/') }}">Welcome</a>
            {{ $nav_link ?? '' }}
        </div>
    </nav>
    <div class="mb-4">
        {{ $slot }}
    </div>

    {{ $scripts ?? '' }}
</body>

</html>
