<?php

declare(strict_types=1);

namespace Uc\Module\Feedback\Query;

use Illuminate\Support\Collection;
use Uc\Module\Feedback\Model\Feedback;
use Illuminate\Pagination\LengthAwarePaginator;
use Uc\Module\Feedback\Request\FeedbackSearchRequest;

class FeedbackQuery implements FeedbackQueryInterface
{
    public function get(string $id): ?Feedback
    {
        /** @var ?Feedback */
        $result = Feedback::query()
            ->where('feedback_id', $id)
            ->first();

        return $result;
    }

    public function byProblemAndStudent(string $problemId, string $studentId): ?Feedback
    {
        /** @var ?Feedback */
        $result = Feedback::query()
            ->where('problem_id', $problemId)
            ->where('student_id', $studentId)
            ->first();

        return $result;
    }

    /**
     * @return Collection<string, Feedback>
     */
    public function studentFeedbacks(string $studentId): Collection
    {
        $query = Feedback::query()
            ->where('student_id', $studentId);

        /**
         * @var Collection<string, Feedback>
         */
        $result = $query
        ->orderBy('created_at', 'desc')
        ->get()
        ->keyBy('problem_id');

        return $result;
    }

    /**
     * @return LengthAwarePaginator<Feedback>
     */
    public function byProblem(string $problemId): LengthAwarePaginator
    {
        $query = Feedback::query()
            ->where('problem_id', $problemId);

        /**
         * @var LengthAwarePaginator<Feedback>
         */
        $result = $query
            ->orderBy('created_at', 'desc')
            ->paginate(30);

        return $result;
    }

    /**
     * @return LengthAwarePaginator<Feedback>
     */
    public function filter(FeedbackSearchRequest $request): LengthAwarePaginator
    {
        $query = Feedback::query();

        if (null !== $request->language) {
            // $query->where('name', 'ilike', '%'.trim($request->name).'%');
        }

        /**
         * @var LengthAwarePaginator<Feedback>
         */
        $result = $query
            ->orderBy('created_at', 'desc')
            ->paginate(30);

        return $result;
    }
}
