# movie_web

A movie discovery web app built with Laravel 12 + Livewire, powered by the TMDB API.

## Features

- Popular Movies and Now Playing grids
- Movie detail pages (cast, genres, trailer, images)
- Live search with Livewire dropdown
- TV Shows and Actors pages

## Setup

```bash
composer install
cp .env.example .env   # then set TMDB_KEY (or TMDB_TOKEN)
php artisan key:generate
php artisan migrate
npm install
npm run build
php artisan serve
```

Then open http://127.0.0.1:8000.

## API Key

Get a free TMDB API key at https://www.themoviedb.org/settings/api and put it in
`.env` as `TMDB_KEY` (old v3 style) or `TMDB_TOKEN` (bearer token).