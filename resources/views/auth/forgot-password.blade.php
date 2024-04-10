@extends('auth.layout')

@section('content')
    <div class="grid max-w-screen-sm px-4 pt-16 pb-8 mx-auto lg:py-16">


        <div class="card">
            <div class="card-header">
                <div class="text-center text-2xl font-black my-3">Forgot your password?</div>
            </div>
            <div class="card-body">
                <div class="mb-4 text-sm text-muted-foreground">
                    {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" class="form-input" name="name" value="{{ old('email') }}" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="btn-primary">
                            {{ __('Email Password Reset Link') }}
                            <button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
