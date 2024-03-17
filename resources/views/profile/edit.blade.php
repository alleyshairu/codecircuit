<x-portal-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold text-gray-900 sm:text-2xl">Profile</h1>
    </x-slot>

    <div class="grid gap-3 p-4">
        <div class="p-4 sm:p-8 bg-white border border-gray-200 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-portal-layout>
