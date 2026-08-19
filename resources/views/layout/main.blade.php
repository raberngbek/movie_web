<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Movie App</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    @livewireStyles
</head>

<body class="font-sans p-10 bg-gray-900 text-white">

    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">

            <ul class="flex flex-col md:flex-row items-center">
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="/" class="flex items-center gap-2">
                        <img
                            src="https://cdn-icons-png.flaticon.com/512/744/744922.png"
                            alt="Movie Logo"
                            class="w-5 h-5"
                        >
                        <span class="hover:text-gray-300">Movie Web</span>
                    </a>
                </li>

                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{ route('movies.index') }}" class="hover:text-gray-300">Movies</a>
                </li>

                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{ route('shows.index') }}" class="hover:text-gray-300">TV Shows</a>
                </li>

                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{ route('actors.index') }}" class="hover:text-gray-300">Actors</a>
                </li>
            </ul>

            <div class="flex flex-col md:flex-row items-center gap-4">
                <livewire:search-drop />

                <img
                    class="w-8 h-8 rounded-full border border-gray-700"
                    src="https://images.unsplash.com/photo-1503023345310-bd7c1de61c7d"
                    alt="Profile"
                />
            </div>

        </div>
    </nav>

    @yield('content')

    @livewireScripts
</body>
</html>
