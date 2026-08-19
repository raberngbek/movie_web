@extends('layout.main')
@section('content')

<div class="movie-info border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">

        @if ($mvshow['poster_path'])
            <img src="{{'https://image.tmdb.org/t/p/w500' . $mvshow['poster_path']}}"
                 alt="movie poster"
                 class="w-64 md:w-96">
        @else
            <img src="https://via.placeholder.com/384x576/1f2937/ffffff?text=No+Poster"
                 alt="movie poster"
                 class="w-64 md:w-96">
        @endif

        <div class="md:ml-24">
            <h2 class="text-4xl font-semibold">{{ $mvshow['title'] }}</h2>

            <div class="flex flex-wrap items-center text-gray-400 text-sm">
                <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24">
                    <g data-name="Layer 2">
                        <path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.55-5.16a1 1 0 011.8 0l2.54 5.16 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1.06A1 1 0 0117.56 21z"
                              data-name="star"/>
                    </g>
                </svg>
                <span class="ml-1">{{ round($mvshow['vote_average'] * 10) }}%</span>
                <span class="mx-2">|</span>
                <span>{{ $mvshow['release_date'] }}</span>
                <span class="mx-2">|</span>
                <span>
                    @foreach ($mvshow['genres'] as $genre)
                        {{ $genre['name'] }}@if (!$loop->last), @endif
                    @endforeach
                </span>
            </div>

            <p class="text-lg mt-8">
                {{ $mvshow['overview'] }}
            </p>

            <div class="mt-12">

                <h4 class="text-white font-semibold">Featured Cast</h4>

                <div class="flex mt-4">
                    @foreach ($mvshow['credits']['crew'] as $crew)
                        @if($loop->index < 2)
                            <div class="mr-8">
                                <div>{{$crew['name']}}</div>
                                <div class="text-sm text-gray-400">{{$crew['job']}}</div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="mt-12">
                    @php
                        $trailer = collect($mvshow['videos']['results'] ?? [])
                            ->where('type', 'Trailer')
                            ->where('site', 'YouTube')
                            ->first();
                    @endphp
                    @if($trailer)
                        <a href="https://www.youtube.com/watch?v={{ $trailer['key'] }}"
                           target="_blank"
                           class="inline-flex items-center bg-orange-500 text-gray-900
                                  rounded font-semibold px-5 py-4 hover:bg-orange-600
                                  transition ease-in-out duration-150">
                            <svg class="fill-current w-6" viewBox="0 0 24 24">
                                <g data-name="Layer 2">
                                    <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7
                                             8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8
                                             8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48
                                             0 018 8v.5z"
                                          data-name="message-circle"/>
                                </g>
                            </svg>
                            <span class="ml-2">Play Trailer</span>
                        </a>
                    @endif
                </div>

            </div> <!-- end cast + button -->
        </div> <!-- end ml-24 -->

    </div> <!-- end container -->
</div> <!-- end movie-info -->
    <div class="movie-cast border-b border-gray-800">

        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-bold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($mvshow['credits']['cast'] as $cast)
                    @if($loop->index < 5)
                        <div class="mt-8">
                            @if ($cast['profile_path'])
                                <a href="">
                                    <img src={{'https://image.tmdb.org/t/p/w500' . $cast['profile_path']}} alt="actor photo" class="hover:opacity-75 w-full transition ease-in-out duration-150">
                                </a>
                            @else
                                <img src="https://via.placeholder.com/500x750/1f2937/ffffff?text=No+Photo" alt="actor photo" class="w-full">
                            @endif
                            <div class="mt-2">
                                <a href="" class="text-lg mt-2 hover:text-gray-300">{{ $cast['name'] }}</a>
                            </div>
                            <div class="text-gray-400 text-sm mt-1">
                                {{ $cast['character'] }}
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    @if (count($mvshow['images']['backdrops'] ?? []) > 0)
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-bold">Images</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($mvshow['images']['backdrops'] as $img)
                    @if($loop->index < 9)
                        <div class="mt-8">
                            <img src={{'https://image.tmdb.org/t/p/w500' . $img['file_path']}} alt="movie backdrop" class="hover:opacity-75 transition ease-in-out duration-150">
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endif

@endsection