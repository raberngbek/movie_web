<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDrop extends Component
{
    public $search = '';

    public function render()
    {
        $searchResults = [];

        if (strlen($this->search) >= 2 && (config('services.tmdb.token') || config('services.tmdb.key'))) {
            $client = config('services.tmdb.token')
                ? Http::withToken(config('services.tmdb.token'))
                : Http::withQueryParameters(['api_key' => config('services.tmdb.key')]);

            $searchResults = $client
                ->get('https://api.themoviedb.org/3/search/movie', [
                    'query' => $this->search,
                ])
                ->json()['results'] ?? [];
        }

        return view('livewire.search-drop', [
            'searchResults' => collect($searchResults)->take(7),
        ]);
    }
}