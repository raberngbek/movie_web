<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDrop extends Component
{
    public $Search = 'ggg';
    public function render()
    {
        $searchResults = [];
        
      
        
 $searchResults = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/search/movie?query=' .$this->Search)
        ->json()['results'];
        
        dump($searchResults);
        
       
       
        return view('livewire.search-drop',[
           
            ])
        ;
    }
}
