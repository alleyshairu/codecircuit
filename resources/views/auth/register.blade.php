@extends('auth.layout')

@section('title')
    Register
@endsection

@section('content')
    <div class="grid lg:grid-cols-2 gap-8 max-w-screen-xl px-4 pt-16 pb-8 mx-auto lg:py-16">
        <div>
            <div class="font-black text-2xl mb-5">Sign up for free</div>
            <ul class="flex flex-col gap-4">
                <li class="flex items-center gap-3">
                    <x-icons.check class="w-6 h-6 text-green-500" />
                    <p>Unlimited attempts to solve problems</p>
                </li>
                <li class="flex items-center gap-3">
                    <x-icons.check class="w-6 h-6 text-green-500" />
                    <p>Instant answers and scores</p>
                </li>
                <li class="flex items-center gap-3">
                    <x-icons.check class="w-6 h-6 text-green-500" />
                    <p>Tips and hints available for the problems</p>
                </li>
                <li class="flex items-center gap-3">
                    <x-icons.check class="w-6 h-6 text-green-500" />
                    <p>Earn points to get ranked on the leaderboard</p>
                </li>
                <li class="flex items-center gap-3">
                    <x-icons.check class="w-6 h-6 text-green-500" />
                    <p>Tips and hints available for the problems</p>
                </li>
            </ul>
        </div>

        <div>
            <div class="card">
                <div class="card-header">

                    <div class="text-center text-2xl font-black my-3">Student Registration</div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div>

                            <label for="name" class="form-label">Name</label>
                            <input id="name" type="name" class="form-input" name="name" value="{{ old('name') }}" required
                                autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>


                        <div>
                        </div>
                        <!-- Email Address -->
                        <div class="mt-4">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-input" name="email" value="{{ old('email') }}" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">

                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" class="form-input" name="password" required />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input id="password_confirmation" type="password" class="form-input" name="password_confirmation"
                                required />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2"
                                href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <button class="ms-4 btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
