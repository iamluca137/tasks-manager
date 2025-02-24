<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tasks Manager</title>
    <meta name="description" content="Task Manager">
    <meta name="author" content="iamluca137">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}">
    {{-- CSRF Token --}}
    {{-- Fonts (Red Rose) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Rose:wght@300..700&display=swap" rel="stylesheet">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">
    {{-- Flowbite --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    {{-- Style CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    @livewireStyles
</head>

<body class="red-rose">
<div class="antialiased bg-gray-50 ">
    {{-- Header --}}
    @livewire('partials.calendar.header')
    {{-- Sidebar --}}
    @livewire('partials.calendar.sidebar')

    <main class="md:ml-64 h-screen pt-16 bg-white rounded-lg">
        {{ $slot }}
    </main>
</div>
@livewireScripts
@stack('scripts')
</body>

</html>
