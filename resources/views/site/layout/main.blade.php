<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @include('site.partial.favicon')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;700&display=swap" rel="stylesheet">
    {{ Vite::useHotFile(public_path('site/hot'))->useBuildDirectory('site')->withEntryPoints(['resources/site/css/site.css', 'resources/site/js/site.js', 'resources/site/js/components.tsx', 'resources/site/css/highlight.css', 'resources/site/js/highlight.js']) }}
</head>

<body class="font-sans antialiased flex flex-col min-h-screen">
    @include('site.layout.nav')
    <div class="flex-1">

        <div class="mx-auto max-w-screen-xl">
            @foreach (session('flash_notification', collect())->toArray() as $message)
                <div class="p-3 my-4 rounded flex justify-between bg-green-200 text-green-800">
                    <div>{!! $message['message'] !!}</div>

                    @if ($message['important'])
                        <button class="ml-2 px-2" onclick="this.parentElement.remove();">&times;</button>
                    @endif
                </div>
            @endforeach
        </div>

        @if ($errors->any())
            <div class="mx-auto max-w-screen-xl">
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
            </div>
        @endif

        @yield('content')
    </div>
    @include('site.layout.footer')
</body>

</html>
