<x-portal-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-1.5">
            <div class="flex gap-3">
                <div class="badge">{{ $problem->level()->title() }}</div>
                <div class="badge">{{ $problem->chapter->language->name() }}</div>
            </div>
            <h1 class="page-title">{{ $problem->title() }}</h1>
            <small class="text-xs text-muted-foreground">{{ $problem->id() }}</small>
        </div>
    </x-slot>

    @include('portal.problem._tabs')

    @yield('problem_content')
</x-portal-layout>
