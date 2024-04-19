<?php

declare(strict_types=1);

namespace Uc\Module\Portal\Controller;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Uc\Module\Core\WebController;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class UserController extends WebController
{
    public function edit(string $id): View
    {
        $user = $this->userQuery->get($id);
        if (null === $user) {
            abort(404, 'User not found');
        }

        return $this->view('portal.user.account', [
            'user' => $user,
        ]);
    }

    public function name(Request $request, string $id): RedirectResponse
    {
        $user = $this->userQuery->get($id);
        if (null === $user) {
            abort(404, 'User not found');
        }

        /** @var array<string, string> */
        $data = $request->validate([
            'name' => ['required', 'min:4'],
        ]);

        $this->userService->changeName($user, $data['name']);

        flash('Name updated.');

        return Redirect::back();
    }

    public function password(Request $request, string $id): RedirectResponse
    {
        $user = $this->userQuery->get($id);

        if (null === $user) {
            abort(404, 'User not found');
        }

        /** @var array<string, string> */
        $data = $request->validate([
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $this->userService->changePassword($user, $data['password']);

        flash('Password updated.');

        return Redirect::back();
    }
}
