<?php

namespace Uc\Module\Site\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Uc\Module\Core\WebController;
use Illuminate\Validation\Factory as Validation;

class ProcessCodeController extends WebController
{
    public function process(Validation $validation, Request $request): JsonResponse
    {
        $validator = $validation->make($request->all(), [
            'code' => ['required'],
            'problem_id' => ['required'],
        ]);

        if ($validator->fails()) {
            return $this->jsonValidationErr($validator);
        }

        $data = $validator->validated();
        $problem = $this->problemQuery->get($data['problem_id']);
        if (null === $problem) {
            return $this->notFound('problem nto found');
        }

        $token = $this->codeService->process($problem->chapter->language, $data['code']);

        return $this->json([
            'token' => $token,
        ]);
    }

    public function status(string $token): JsonResponse
    {
        $response = $this->codeService->status($token);

        return $this->json($response->json());
    }
}
