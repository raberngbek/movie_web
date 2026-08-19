@extends('layout.main')
@section('content')
    <div class="container mx-auto pt-16">
        @if (isset($error))
            <div class="bg-red-900/50 border border-red-700 text-red-200 rounded px-4 py-3 mb-8">
                {{ $error }}
            </div>
        @endif
        <div class="popular-actors">
            <h2 class="uppercase tracking-wider text-lg text-orange-500 font-semibold">
                Popular Actors
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularActors as $actor)
                    <div class="mt-8">
                        @if ($actor['profile_path'])
                            <img src="{{ 'https://image.tmdb.org/t/p/w500' . $actor['profile_path'] }}"
                                 alt="actor photo"
                                 class="hover:opacity-75 transition ease-in-out duration-150">
                        @else
                            <img src="https://via.placeholder.com/500x750/1f2937/ffffff?text=No+Photo"
                                 alt="actor photo"
                                 class="hover:opacity-75 transition ease-in-out duration-150">
                        @endif
                        <div class="mt-2">
                            <h2 class="text-sm font-semibold">{{ $actor['name'] }}</h2>
                            @php $known = collect($actor['known_for'] ?: [])->map(fn ($item) => $item['title'] ?? $item['name'])->take(3); @endphp
                            <div class="flex flex-wrap items-center text-gray-400 text-sm">
                                <span>{{ $known->implode(', ') }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection