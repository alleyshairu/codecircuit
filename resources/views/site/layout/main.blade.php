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
    {{ Vite::useHotFile(public_path('site/hot'))->useBuildDirectory('site')->withEntryPoints(['resources/site/css/site.css']) }}
</head>

<body class="font-sans bg-background text-primary-foregrouund antialiased">
    <header>
        <nav class="bg-brand-yellow">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4 border-b">
                <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <span class="text-3xl font-black">UCLearn Code</span>
                </a>
                <div class="flex items-center space-x-6 rtl:space-x-reverse">
                    <a href="/login" class="font-black uppercase">Login</a>
                    <a href="/register"
                        class="uppercase font-black border-2 border-black bg-brand-yellow px-3 py-1.5 text-center rounded-md">
                        <span>Get Started</span>
                    </a>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')

    @include('site.layout.footer')
</body>

</html>
