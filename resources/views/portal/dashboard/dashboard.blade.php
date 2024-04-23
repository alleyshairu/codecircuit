@section('title')
    Dashboard
@endsection

<x-portal-layout>
    <x-slot name="header">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Dashboard</h1>
    </x-slot>

    <div class="p-4">
        You're logged in as {{ auth()->user()->kind()->title() }}.
    </div>
</x-portal-layout>
