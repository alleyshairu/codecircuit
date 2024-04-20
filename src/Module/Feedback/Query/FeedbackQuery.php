<?php

declare(strict_types=1);

namespace Uc\Module\Feedback\Query;

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
