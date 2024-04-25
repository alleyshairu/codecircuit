<?php

declare(strict_types=1);

namespace Uc\Module\Feedback\Query;

use Illuminate\Support\Collection;
use Uc\Module\Feedback\Model\Feedback;
use Uc\Module\Feedback\Request\FeedbackSearchRequest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface FeedbackQueryInterface
{
    public function get(string $id): ?Feedback;

    public function byProblemAndStudent(string $problemId, string $studentId): ?Feedback;

    /**
     * @return LengthAwarePaginator<Feedback>
     */
    public function byProblem(string $problemId): LengthAwarePaginator;

    /**
     * @return Collection<string, Feedback>
     */
    public function studentFeedbacks(string $studentId): Collection;

    /**
     * @return LengthAwarePaginator<Feedback>
     */
    public function filter(FeedbackSearchRequest $request): LengthAwarePaginator;
}
