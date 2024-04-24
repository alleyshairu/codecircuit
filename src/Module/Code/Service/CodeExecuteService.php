<?php

namespace Uc\Module\Code\Service;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Uc\Module\Language\Model\Language;

class CodeExecuteService implements CodeExecuteServiceInterface
{
    private string $host;

    public function __construct(string $host)
    {
        $this->host = $host;
    }

    public function process(Language $language, string $code): ?string
    {
        $url = sprintf('%s/submissions', $this->host);

        /** @var Response */
        $response = Http::post($url, [
            'base64_encoded' => false,
            'source_code' => $code,
            'language_id' => $language->compiler_id,
        ]);

        if ($response->successful()) {
            /* @phpstan-ignore-next-line * */
            return (string) $response['token'];
        }

        return null;
    }

    public function status(string $token): mixed
    {
        $api = sprintf('%s/submissions/%s?base64_encoded=false', $this->host, $token);
        $response = Http::get($api, [
            'base64_encoded' => false,
        ]);

        if ($response->successful()) {
            return $response;
        }

        return [];
    }
}
