
@extends('layout.main')
@section('content')
    <div class="container mx-auto pt-16">
        <div class="pupular-movie">
            <h2 class="upercase tracking-wider text-lg text-orange-500 font-semiobold">
                Popular Movies        
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            
            
                @foreach ($popularMovie as $popmovie)
               @include('components.movie-card', ['popmovie' => $popmovie, 'genres' => $genres])
                @endforeach
            </div>
            
        </div>
               <div class="now-playing-movie py-24">
            <h2 class="upercase tracking-wider text-lg text-orange-500 font-semiobold">
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