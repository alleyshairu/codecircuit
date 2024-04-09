<div class="px-4">
    <div class="p-4 mb-4 bg-white border border-gray-200 rounded-xl shadow">
        <div class="mb-4">
            <h3 class="font-semibold">Reset Password</h3>
            <div class="text-sm text-muted">Reset account password to new password</div>
        </div>

        <form method="post" action="{{ route('user.password-update', $id) }}" class="grid gap-4">
            @csrf
            @method('put')

            <div class="grid gap-2">
                <x-input-label for="update_password_password" :value="__('New Password')" />
                <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full"
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>

            <div class="grid gap-2">
                <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                    class="mt-1 block w-full" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
            </div>
        </form>
    </div>
