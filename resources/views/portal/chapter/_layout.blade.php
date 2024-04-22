<x-portal-layout>
    <x-slot name="header">
        <div class="flex gap-3">
            <div class="badge">Chapter</div>
            <div class="badge">{{ $chapter->language->name() }}</div>
        </div>
        <h1 class="page-title">{{ $chapter->title() }}</h1>
    </x-slot>

    @include('portal.chapter._tabs')

    @yield('chapter_content')
</x-portal-layout>
