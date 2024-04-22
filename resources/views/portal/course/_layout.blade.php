<x-portal-layout>
    <x-slot name="header">
        <div class="badge">Language</div>
        <div class="flex flex-col gap-1.5">
            <h1 class="page-title">{{ $language->name() }}</h1>
            <small class="text-xs text-muted-foreground">Programming language course material</small>
        </div>
    </x-slot>

    @include('portal.course._tabs')

    @yield('course_content')
</x-portal-layout>
