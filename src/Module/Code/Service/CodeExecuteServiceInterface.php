<?php

namespace Uc\Module\Code\Service;

use Uc\Module\Language\Model\Language;

interface CodeExecuteServiceInterface
{
    public function process(Language $language, string $code): ?string;

    public function status(string $token): mixed;
}
