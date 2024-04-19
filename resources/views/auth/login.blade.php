@extends('auth.layout')

@section('title')
    Login
@endsection

@section('content')
    <div class="grid max-w-screen-sm px-4 pt-16 pb-8 mx-auto lg:py-16">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="card">
            <div class="card-header">
                <div class="text-center text-2xl font-black my-3">Log in to your account</div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" class="form-input" name="email" value="{{ old('email') }}" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" class="form-input" name="password" required />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-brand-blue shadow-sm focus:ring-brand-blue" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="btn-outline" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <button class="btn-primary ms-3" type="submit">Log in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
