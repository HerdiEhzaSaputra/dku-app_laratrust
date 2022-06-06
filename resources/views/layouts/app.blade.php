<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    </head>
    <body class="font-sans antialiased">
            <livewire:layouts.nav-bar />
            
            <div class="flex overflow-hidden bg-white pt-16">
                <livewire:layouts.side-bar />

                <div class="bg-gray-900 opacity-50 fixed inset-0 z-10 hidden" id="sidebarBackdrop"></div>

                <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">

                    <!-- Page Heading -->
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            @isset($header)
                                {{ $header }}
                            @endisset 
                        </div>
                    </header>

                    <!-- Page Content -->
                    <main>
                        <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                {{ $slot }}
                            </div>
                        </div>
                    </main>
                </div>
            </div>
            
    </body>
</html>
