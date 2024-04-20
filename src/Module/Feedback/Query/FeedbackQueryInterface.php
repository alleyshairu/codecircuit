<?php

declare(strict_types=1);

namespace Uc\Module\Feedback\Query;

use Uc\Module\Feedback\Model\Feedback;
use Uc\Module\Feedback\Request\FeedbackSearchRequest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface FeedbackQueryInterface
{
    public function get(string $id): ?Feedback;

    /**
     * @return LengthAwarePaginator<Feedback>
     */
    public function byProblem(string $problemId): LengthAwarePaginator;

    /**
     * @return LengthAwarePaginator<Feedback>
     */
    public function filter(FeedbackSearchRequest $request): LengthAwarePaginator;
}
