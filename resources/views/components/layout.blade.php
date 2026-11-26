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
    <body class="mx-auto my-10 max-w-2xl flex flex-col gap-4 text-slate-700 bg-linear-to-r from-purple-100 via-pink-100 to-red-100">
        <nav class="text-lg font-medium">
            <ul class="flex flex-row justify-between items-center">
                <li>
                    @if (request()->routeIs('auth.create'))
                        <x-link-nav :href="route('vacancies.index')">Home</x-link-nav>
                    @endif
                </li>
                <li>
                    <ul class="flex flex-row gap-2 items-center">
                        @auth
                            <li>
                                <span>Hi, {{ auth()->user()->name ?? 'Anonymous' }}!</span>
                            </li>
                            <li>
                                <x-link-nav :href="route('my-applications.index')">Applications</x-link-nav>
                            </li>
                            <li>
                                <x-link-nav :href="route('my-vacancies.index')">Employer</x-link-nav>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="cursor-pointer hover:underline hover:underline-offset-4"
                                    >(Sign out)</button>
                                </form>
                            </li>
                        @else
                            <li>
                                <x-link-nav :href="route('login')">Sign in</x-link-nav>
                            </li>
                        @endauth
                    </ul>
                </li>
            </ul>
        </nav>

        @if(session('success'))
            <div class="rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-75">
                <p>Success!</p>
                <p>{{ session('success') }} ✔</p>
            </div>
        @endif
        @if(session('error'))
            <div class="rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-red-700 opacity-75">
                <p>Error!</p>
                <p>{{ session('error') }} ❌</p>
            </div>
        @endif

        {{ $slot }}
    </body>
</html>
