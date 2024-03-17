<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'UCLearn Code') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;700;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/portal.js'])
</head>

<body class="portal font-code antialiased">
    @include('layouts.partials.navbar-top')
    <div class="flex pt-16 overflow-hidden bg-gray-50">
        @include('layouts.partials.sidebar')
        <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64">
            <main>

                @if (isset($header))
                    <div class="p-4">
                        <div class="mb-1">
                            {{ $header }}
                        </div>
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
