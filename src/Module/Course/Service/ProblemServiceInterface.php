<?php

declare(strict_types=1);

namespace Uc\Module\Course\Service;

use Uc\Module\Course\Model\Problem;
use Uc\Module\Course\Request\ProblemStoreRequest;
use Uc\Module\Course\Request\ProblemUpdateRequest;

interface ProblemServiceInterface
{
    public function store(ProblemStoreRequest $req): Problem;

    public function update(Problem $problem, ProblemUpdateRequest $req): void;
}
