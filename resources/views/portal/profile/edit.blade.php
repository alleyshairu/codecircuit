@section('title')
    Profile
@endsection

<x-portal-layout>
    <x-slot name="header">
        <h1 class="page-title">Profile</h1>
    </x-slot>

    <div class="grid gap-3">
        @include('portal.profile.partials.update-profile-information-form')
        @include('portal.profile.partials.update-password-form')
    </div>
</x-portal-layout>
