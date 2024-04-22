<?php

namespace Uc\Module\Site\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Uc\Module\Core\WebController;
use Illuminate\Support\Facades\Http;

class ProcessCodeController extends WebController
{
    public function process(Request $request): JsonResponse
    {
        $code = base64_encode($request->get('code'));

        $api = 'http://127.0.0.1:2358/submissions';
        $response = Http::post($api, [
            'base64_encoded' => true,
            'source_code' => $code,
            'language_id' => 62,
        ]);

        return $this->json($response->json());
    }

    public function status(string $token): JsonResponse
    {
        $api = sprintf('http://127.0.0.1:2358/submissions/%s', $token);
        $response = Http::get($api);

        return $this->json($response->json());
    }
}
