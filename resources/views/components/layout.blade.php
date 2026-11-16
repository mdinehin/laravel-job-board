<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel Job Board') }}</title>
        @vite([
            'resources/css/app.css',
            'resources/js/app.js',
        ])
    </head>
    <body class="mx-auto my-10 max-w-2xl text-slate-700 bg-linear-to-r from-purple-100 via-pink-100 to-red-100">
        {{ auth()->user()->name ?? 'Guest' }}
        {{ $slot }}
    </body>
</html>
