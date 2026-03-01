<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Website Resmi PT. Charlyn Jaya - Outsourcing Tenaga Keamanan dan Kebersihan di Maluku">
        
        <title>PT. Charlyn Jaya | {{ $title ?? 'Company Profile' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:200,300,400,500,600,700,800,900" rel="stylesheet" />
        
        <!-- FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <!-- Fallback if missing compilation -->
            <script src="https://cdn.tailwindcss.com"></script>
        @endif
        
        <!-- Additional Header Content -->
        {{ $head ?? '' }}
    </head>
    <body class="font-sans antialiased text-slate-800 bg-slate-50 min-h-screen flex flex-col">
        
        <!-- Call Navbar Component -->
        <x-navbar />

        <!-- Main Content (Minimum height to push footer to bottom) -->
        <main class="flex-grow">
            {{ $slot }}
        </main>

        <!-- Call Footer Component -->
        <x-footer />
        
        <!-- Additional Script per page -->
        {{ $scripts ?? '' }}

        <!-- AlpineJS for interactive components -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    </body>
</html>
