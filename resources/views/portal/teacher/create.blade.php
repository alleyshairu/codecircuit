@section('title')
    New Teacher Account
@endsection
<x-portal-layout>
    <x-slot name="header">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">New Teacher</h1>

        <div class="flex items-end ml-auto space-x-2 sm:space-x-3">
            <a href="{{ route('portal.teacher.index') }}"class="btn btn-primary">
                <x-icons.search class="w-5 h-5 mr-2" />
                Search Teacher
            </a>
        </div>
    </x-slot>

    <div class="px-4">
        <div class="p-4 mb-4 bg-white border border-gray-200 rounded-xl shadow">
            <div class="mb-4">
                <h3 class="font-semibold">New Teacher</h3>
                <div class="text-sm text-muted">Enter details for new teacher account</div>
            </div>

            <form class="grid gap-4" method="post" action="{{ route('portal.teacher.store') }}">
                @csrf
                <div class="grid gap-2">
                    <x-input-label for="name" value="Name" />
                    <x-text-input id="name" type="text" name="name" :value="old('name')" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="grid gap-2">
                    <x-input-label for="email" value="Email" />
                    <x-text-input id="email" class="" type="text" name="email" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="grid gap-2">
                    <x-input-label for="password" value="Password" />
                    <x-text-input id="password" class="" type="password" name="password" :value="old('password')" required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div>
                    <x-primary-button>Save</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-portal-layout>
