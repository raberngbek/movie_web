
@extends('layout.main')
@section('content')
    <div class="container mx-auto pt-16">
        @if (isset($error))
            <div class="bg-red-900/50 border border-red-700 text-red-200 rounded px-4 py-3 mb-8">
                {{ $error }}
            </div>
        @endif
        <div class="pupular-movie">
            <h2 class="uppercase tracking-wider text-lg text-orange-500 font-semibold">
                Popular Movies
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            
            
                @foreach ($popularMovie as $popmovie)
               @include('components.movie-card', ['popmovie' => $popmovie, 'genres' => $genres])
                @endforeach
            </div>
            
        </div>
               <div class="now-playing-movie py-24">
            <h2 class="uppercase tracking-wider text-lg text-orange-500 font-semibold">
                Now Playing
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            
            
                @foreach ($now_playingMv as $popmovie)
               @include('components.movie-card', ['popmovie' => $popmovie, 'genres' => $genres])
                @endforeach
            </div>
            
        </div>
</div>        
@endsection