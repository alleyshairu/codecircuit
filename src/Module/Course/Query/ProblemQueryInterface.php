<?php

declare(strict_types=1);

namespace Uc\Module\Course\Query;

use Illuminate\Support\Collection;
use Uc\Module\Course\Model\Chapter;
use Uc\Module\Course\Model\Problem;
use Uc\Module\Course\Request\ProblemSearchRequest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProblemQueryInterface
{
    public function get(string $id): ?Problem;

    /**
     * @return LengthAwarePaginator<Problem>
     */
    public function filter(ProblemSearchRequest $req): LengthAwarePaginator;

    /**
     * @return Collection<int, Problem>
     */
    public function all(Chapter $chapter): Collection;
}
