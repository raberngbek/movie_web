<div class="relative mt-3 md:mt-0" x-data="{ isOpen: true }">
    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
        🔍
    </span>

    <input wire:model.live.debounce.300ms="search" type="text" class="bg-gray-800 text-sm text-white rounded-full w-64 px-4 pl-10 py-1 focus:outline-none focus:shadow-outline"
           placeholder="Search...">
    <div class="spinner spinner-md ml-2"></div>

    @if(strlen($search) >= 2)
        <div class="absolute z-50 bg-gray-800 rounded w-64 text-sm mt-4" x-show="isOpen">
            @if($searchResults->count() >0)
            <ul class="">
                @foreach($searchResults as $result)
                    <li class="border-b border-gray-700">
                        <a href="{{ route('movies.show', $result['id']) }}"
                           class=" hover:bg-gray-700 px-3 py-3 flex items-center">
                           @if($result['poster_path'])
                        <img src="https://image.tmdb.org/t/p/w92{{ $result['poster_path'] }}" class="w-10" alt="">
                        @else
                        <img src="https://via.placeholder.com/50x75" class="w-10" alt="poster">
                        @endif
                           <span class ="ml-2">
                             {{ $result['title'] }}
                        </span>
                        </a>
                    </li>
                @endforeach
                </ul>
                @else
                    <div class="block hover:bg-gray-700 px-3 py-3">
                        No results for "{{ $search }}"
                    </div>
            @endif
        </div>
    @endif

    
</div>
