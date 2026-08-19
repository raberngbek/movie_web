<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    private function client()
    {
        if ($token = config('services.tmdb.token')) {
            return Http::withToken($token);
        }

        return Http::withQueryParameters(['api_key' => config('services.tmdb.key')]);
    }

    private function keyMissing(): bool
    {
        return ! config('services.tmdb.token') && ! config('services.tmdb.key');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ($this->keyMissing()) {
            return view('home', [
                'popularMovie' => [],
                'now_playingMv' => [],
                'genres' => collect(),
                'error' => 'TMDB API key is missing. Set TMDB_KEY or TMDB_TOKEN in your .env file.',
            ]);
        }

        $popularMovies = $this->client()
            ->get('https://api.themoviedb.org/3/movie/popular')
            ->json()['results'] ?? [];
        $now_playingMv = $this->client()
            ->get('https://api.themoviedb.org/3/movie/now_playing')
            ->json()['results'] ?? [];

        $genresarray = $this->client()
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'] ?? [];

        $genres = collect($genresarray)->mapWithKeys(function ($genre) {
            return [$genre['id']=>$genre['name']];
        });

        return view('home',
        [
            'popularMovie'=>$popularMovies,
            'now_playingMv'=>$now_playingMv,
            'genres'=>$genres,
        ]);
    }


    /**
     * Display a listing of TV shows.
     */
    public function tvShows()
    {
        if ($this->keyMissing()) {
            return view('shows', [
                'popularShows' => [],
                'error' => 'TMDB API key is missing. Set TMDB_KEY or TMDB_TOKEN in your .env file.',
            ]);
        }

        $popularShows = $this->client()
            ->get('https://api.themoviedb.org/3/tv/popular')
            ->json()['results'] ?? [];

        return view('shows', [
            'popularShows' => $popularShows,
        ]);
    }

    /**
     * Display a listing of actors.
     */
    public function actors()
    {
        if ($this->keyMissing()) {
            return view('actors', [
                'popularActors' => [],
                'error' => 'TMDB API key is missing. Set TMDB_KEY or TMDB_TOKEN in your .env file.',
            ]);
        }

        $popularActors = $this->client()
            ->get('https://api.themoviedb.org/3/person/popular')
            ->json()['results'] ?? [];

        return view('actors', [
            'popularActors' => $popularActors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if ($this->keyMissing()) {
            abort(503, 'TMDB API key is missing. Set TMDB_KEY or TMDB_TOKEN in your .env file.');
        }

        $movieshow = $this->client()
            ->get('https://api.themoviedb.org/3/movie/'.$id, [
                'append_to_response' => 'credits,videos,images',
            ])
            ->json();

        return view('show',
        [
            'mvshow'=>$movieshow,
        ]
    );
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}