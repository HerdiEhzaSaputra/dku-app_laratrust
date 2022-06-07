<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@isset($header){{ $header }} | @endisset{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>

        <script>
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (localStorage.getItem('theme-preference') === 'dark' || (!('theme-preference' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>
    </head>
    <body class="font-sans antialiased">

        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">

            <div id="backdrop" :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="hidden fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

            <livewire:layouts.side-bar />

                <div class="flex-1 flex flex-col overflow-hidden">

                    <livewire:layouts.nav-bar />

                    <!-- Page Heading -->
                    @isset($header)
                        <header class="bg-white shadow">
                            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                        {{ $header }}
                                    </h2>
                            </div>
                        </header>
                    @endisset

                    <!-- Page Content -->
                    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200 px-4 py-4">
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @livewireScripts
    </body>
</html>
