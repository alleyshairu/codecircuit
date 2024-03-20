@section('title')
    Register
@endsection

<x-guest-layout>
    <div class="grid lg:grid-cols-2 gap-8 max-w-screen-xl px-4 pt-16 pb-8 mx-auto lg:py-16">
        <div>
            <div class="font-black text-2xl mb-5">Sign up for free</div>
            <ul class="flex flex-col gap-4">
                <li class="flex items-center gap-3">
                    <x-icons.check class="w-6 h-6 text-yellow-500" />
                    <p>Unlimited attempts to solve problems</p>
                </li>
                <li class="flex items-center gap-3">
                    <x-icons.check class="w-6 h-6 text-yellow-500" />
                    <p>Instant answers and scores</p>
                </li>
                <li class="flex items-center gap-3">
                    <x-icons.check class="w-6 h-6 text-yellow-500" />
                    <p>Tips and hints available for the problems</p>
                </li>
                <li class="flex items-center gap-3">
                    <x-icons.check class="w-6 h-6 text-yellow-500" />
                    <p>Earn points to get ranked on the leaderboard</p>
                </li>
                <li class="flex items-center gap-3">
                    <x-icons.check class="w-6 h-6 text-yellow-500" />
                    <p>Tips and hints available for the problems</p>
                </li>
            </ul>
        </div>

        <div>
            <div class="border p-8 rounded-lg">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                            autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                            autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
                            required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2"
                            href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-primary-button class="ms-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
