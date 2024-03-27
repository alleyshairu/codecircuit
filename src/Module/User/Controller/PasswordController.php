<?php

declare(strict_types=1);

namespace Uc\Module\User\Controller;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Uc\Module\Core\WebController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Uc\Module\User\Query\UserQueryInterface;
use Uc\Module\User\Service\UserServiceInterface;

class PasswordController extends WebController
{
    private UserServiceInterface $service;

    private UserQueryInterface $query;

    public function __construct(UserServiceInterface $service, UserQueryInterface $query)
    {
        $this->service = $service;
        $this->query = $query;
    }

    public function __invoke(Request $request, string $id): RedirectResponse
    {
        $user = $this->query->get($id);

        if (null === $user) {
            abort(404, 'User not found');
        }

        /** @var array<string, string> */
        $data = $request->validate([
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $this->service->passwordUpdate($user, $data['password']);

        flash('Password updated.');

        return Redirect::back();
    }
}
