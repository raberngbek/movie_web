<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDrop extends Component
{
    public $search = '232d';
    public function render()
    {
        $searchResults = [];

    if (strlen($this->search) >= 2) {
        $searchResults = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/search/movie?query=' . $this->search)
            ->json()['results'];
            
    }
    
    return view('livewire.search-drop', [
        'searchResults' => collect($searchResults)->take(7),
    ]);
    }
}


