<?php

namespace Uc\Module\Solution\Service;

use Uc\Module\Solution\Model\Solution;
use Uc\Module\Solution\Request\NewSolutionRequest;

interface SolutionServiceInterface
{
    public function store(NewSolutionRequest $req): Solution;
}
