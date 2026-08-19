@extends('layout.main')
@section('content')
    <div class="container mx-auto pt-16">
        @if (isset($error))
            <div class="bg-red-900/50 border border-red-700 text-red-200 rounded px-4 py-3 mb-8">
                {{ $error }}
            </div>
        @endif
        <div class="popular-shows">
            <h2 class="uppercase tracking-wider text-lg text-orange-500 font-semibold">
                Popular TV Shows
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularShows as $show)
                    <div class="mt-8">
                        @if ($show['poster_path'])
                            <img src="{{ 'https://image.tmdb.org/t/p/w500' . $show['poster_path'] }}"
                                 alt="show poster"
                                 class="hover:opacity-75 transition ease-in-out duration-150">
                        @else
                            <img src="https://via.placeholder.com/500x750/1f2937/ffffff?text=No+Poster"
                                 alt="show poster"
                                 class="hover:opacity-75 transition ease-in-out duration-150">
                        @endif
                        <div class="mt-2">
                            <h2 class="text-sm font-semibold">{{ $show['name'] }}</h2>
                            <div class="flex flex-wrap items-center text-gray-400 text-sm">
                                <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24">
                                    <g data-name="Layer 2">
                                        <path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.55-5.16a1 1 0 011.8 0l2.54 5.16 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1.06A1 1 0 0117.56 21z"
                                              data-name="star"/>
                                    </g>
                                </svg>
                                <span class="ml-1">{{ round($show['vote_average'] * 10) }}%</span>
                                <span class="mx-2">|</span>
                                <span>{{ $show['first_air_date'] }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection