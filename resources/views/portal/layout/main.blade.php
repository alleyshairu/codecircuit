<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('site.partial.favicon')
    <title>@yield('title') | {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;700&display=swap" rel="stylesheet">
    {{ Vite::useHotFile(public_path('portal/hot'))->useBuildDirectory('portal')->withEntryPoints(['resources/portal/css/portal.css', 'resources/portal/js/portal.ts', 'resources/portal/js/components.tsx']) }}
</head>

<body class="min-h-screen bg-background font-code antialiased">
    @include('portal.layout.navbar-top')
    <div class="flex pt-8 overflow-hidden bg-gray-50">
        @include('portal.layout.sidebar')
        <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64">
            <main class="px-4 py-6 lg:px-8">
                <div>
                    @include('portal.layout.flash')
                    @if ($errors->any())
                        <div class="m-4 flex rounded-lg bg-red-50 p-4 text-sm text-red-800" role="alert">
                            <svg class="me-3 mt-[2px] inline h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <div>
                                <span class="font-medium">{{ __('Whoops! Something went wrong.') }}</span>
                                <ul class="mt-1.5 list-inside list-disc">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="space-y-4">
                    @if (isset($header))
                        {{ $header }}
                    @endif
                    <div>
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
