<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ $municipality->name }} Medalists | {{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <nav x-data="{ open: false }" class="border-b border-gray-100 bg-red-600">
        <!-- Primary Navigation Menu -->
        <div class="mx-auto max-w-7xl px-4 sm:px-3 lg:px-8">
            <div class="flex h-16 justify-between">
                <div class="flex flex-grow justify-between">
                    <!-- Logo -->
                    <div class="flex shrink-0 items-center">
                        <a href="{{ url('/') }}" wire:navigate
                            class="flex-none text-xl font-semibold text-white">
                            Division Meet 2024
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="url('/')" :active="request()->is('/')" wire:navigate>
                            {{ __('Home') }}
                        </x-nav-link>
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                            {{ __('Venues') }}
                        </x-nav-link>
                    </div>
                </div>

                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center rounded-md p-2 text-white transition duration-150 ease-in-out hover:bg-white hover:text-red-600 focus:bg-white focus:text-red-600 focus:outline-none">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="space-y-1 pb-3 pt-2">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>
        </div>
    </nav>

    <div class="mx-auto max-w-4xl py-6 sm:px-3 lg:px-8">
        <div class="text-center text-gray-900">Please like and share our Facebook page: <a
                href="https://www.facebook.com/profile.php?id=100090531946366" target="_blank"
                class="block font-semibold uppercase text-red-600 underline md:inline">Dasig Nasipit Tourism</a></div>

        <div class="flex justify-center mt-6">
            <img src="{{ asset('images/division-meet-banner.webp') }}" alt="" class="h-auto w-64">
        </div>

        <div class="text-center mt-6">
            <p class="text-gray-500 text-2xl font-semibold uppercase">{{ $municipality->name }}</p>
        </div>

        <a href="/">
            <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                Return to medal table
            </button>
        </a>

        <div class="flex mt-2 flex-col border border-gray-200 bg-white shadow-sm sm:rounded-lg">
            <div class="-m-1.5 overflow-x-auto">
                <div class="inline-block min-w-full p-1.5 align-middle">
                    <div class="overflow-hidden">
                        <table class="dark:divide-gray-700 min-w-full table-fixed divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-3 py-2 text-center text-xs font-medium uppercase text-gray-500">
                                        Event</th>
                                    <th scope="col"
                                        class="sticky left-0 px-3 py-2 text-center text-xs font-medium uppercase text-gray-500">
                                        Player</th>
                                    <th scope="col"
                                        class="px-3 py-2 text-center text-xs font-medium uppercase text-gray-500">
                                        Medal</th>
                                </tr>
                            </thead>
                            <tbody class="dark:divide-gray-700 divide-y divide-gray-200">
                                @foreach ($municipality->winners as $winner)
                                    <tr class="dark:hover:bg-gray-700 hover:bg-gray-100">
                                        <td
                                            class="dark:text-gray-200 sticky left-0 whitespace-nowrap px-3 py-2 text-center text-sm font-medium text-gray-800">
                                            {{ $winner->event }}</td>
                                        <td
                                            class="dark:text-gray-200 whitespace-nowrap px-3 py-2 text-center text-sm text-gray-800">
                                            {{ $winner->player }}</td>
                                        <td
                                            class="dark:text-gray-200 whitespace-nowrap px-3 py-2 text-center text-sm text-gray-800">
                                            {{ $winner->medal }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="mx-auto w-full max-w-[85rem] px-4 pb-4 sm:px-3 lg:px-8">
        <div class="space-y-4 text-center">
            <div class="flex items-center justify-center gap-x-6">
                <img src="{{ asset('images/nasipit-seal.webp') }}" alt="Municipality of Nasipit"
                    class="h-20 w-20 object-contain" />
                <img src="{{ asset('images/dasig-nasipit.webp') }}" alt="Dasig Nasipit"
                    class="h-20 w-20 object-contain" />
                <img src="{{ asset('images/bagong-pilipinas.webp') }}" alt="Bagong Pilipinas"
                    class="h-20 w-20 object-contain" />
            </div>

            <div>
                <p class="text-gray-500">Hosted by the Municipality of Nasipit.</p>
                <p class="text-gray-500">© 2024. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>
