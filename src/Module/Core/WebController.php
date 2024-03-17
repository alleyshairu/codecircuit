<?php

namespace Uc\Module\Core;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class WebController extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    /**
     * @phpstan-ignore-next-line
     */
    public function view(?string $view = null, array $data = [], array $mergeData = []): View
    {
        /**
         * @var View $v
         */
        $v = view($view, $data, $mergeData);

        return $v;
    }

    /**
     * @phpstan-ignore-next-line
     */
    public function redirectRoute(string $route, array $parameters = [], int $status = 302, array $headers = []): RedirectResponse
    {
        /** @var RedirectResponse $r */
        $r = redirect()->route($route, $parameters, $status, $headers);

        return $r;
    }

    protected function noContent(): Response
    {
        /** @var ResponseFactory * */
        $res = response();

        return $res->noContent();
    }

    /**
     * @param array<mixed> $data
     */
    protected function json(array $data, int $status = 200): JsonResponse
    {
        /** @var ResponseFactory * */
        $res = response();

        return $res->json($data, $status);
    }

    protected function jsonValidationErr(Validator $validator): JsonResponse
    {
        return $this->json([
            'errors' => $validator->errors(),
        ], 422);
    }
}
