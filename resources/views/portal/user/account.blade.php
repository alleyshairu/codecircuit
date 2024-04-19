@section('title')
    {{ $user->name }} Account
@endsection

<x-portal-layout>
    <x-slot name="header">
        <div class="badge">{{ $user->kind()->title() }}</div>
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">{{ $user->name }} Account</h1>
    </x-slot>

    <div class="grid grid-cols-1 gap-5 items-center justify-center">
        @include('portal.user.partials.update-name', ['id' => $user->user_id, 'name' => $user->name])
        @include('portal.user.partials.update-password', ['id' => $user->user_id])
    </div>
</x-portal-layout>
