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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;900&display=swap" rel="stylesheet">
    {{ Vite::useHotFile(public_path('site/hot'))->useBuildDirectory('site')->withEntryPoints(['resources/site/css/site.css', 'resources/site/js/site.js']) }}
</head>

<body class="font-sans antialiased flex flex-col min-h-screen">
    @include('site.layout.nav')
    <div class="flex-1">
        @yield('content')
    </div>
    @include('site.layout.footer')
</body>

</html>
