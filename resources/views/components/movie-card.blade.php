 
 <div>
    <a href="{{route('movies.show',$popmovie['id'])}}">

        <img src="{{ 'https://image.tmdb.org/t/p/w500' . $popmovie['poster_path'] }}" 
        alt="movie poster" 
        class="w-64 md:w-96 hover:opacity-75 transition ease-in-out duration-150">
    </a>

        <div class="mt-2 ">
               <a href="{{route('movies.show',$popmovie['id'])}}">
            <h2 class="text-sm font-semibold">{{ $popmovie['title'] }}</h2>

            <div class="flex flex-wrap items-center text-gray-400 text-sm">
                <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24">
                    <g data-name="Layer 2">
                        <path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.55-5.16a1 1 0 011.8 0l2.54 5.16 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1.06A1 1 0 0117.56 21z"
                              data-name="star"/>
                    </g>
                </svg>
                <span class="ml-1">{{ $popmovie['vote_average'] * 10 }}%</span>
                <span class="mx-2">|</span>
                <span>{{ $popmovie['release_date'] }}</span>
                <span class="mx-2">|</span>
                <span>
                    @foreach ($popmovie['genre_ids'] as $genre_id)
                        {{ $genres->get($genre_id) }}@if (!$loop->last), @endif
                    @endforeach
                </span>
            </div>
         </div>
         </a>
         </div>
                 