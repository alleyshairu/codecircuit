<x-portal-layout>
    <x-slot name="header">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">New Teacher</h1>
    </x-slot>

    <div class="px-4">
        <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 sm:p-6">
            <h3 class="mb-4 text-xl font-semibold dark:text-white">New Teacher</h3>

            <form class="grid gap-5" method="post" action="{{ route('teacher.store')}}">
                @csrf
                <div>
                    <x-input-label for="name" value="Name" />
                    <x-text-input id="name" class="block mt-1 w-1/3" type="text" name="name" :value="old('name')" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="email" value="Email" />
                    <x-text-input id="email" class="block mt-1 w-1/3" type="text" name="email" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="password" value="Password" />
                    <x-text-input id="password" class="block mt-1 w-1/3" type="password" name="password" :value="old('password')" required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div>
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-portal-layout>
