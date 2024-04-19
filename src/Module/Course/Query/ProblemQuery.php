<?php

declare(strict_types=1);

namespace Uc\Module\Course\Query;

use Illuminate\Support\Collection;
use Uc\Module\Course\Model\Chapter;
use Uc\Module\Course\Model\Problem;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Uc\Module\Course\Request\ProblemSearchRequest;

class ProblemQuery implements ProblemQueryInterface
{
    /**
     * @return LengthAwarePaginator<Problem>
     */
    public function filter(ProblemSearchRequest $request): LengthAwarePaginator
    {
        $query = Problem::query()->with(['chapter', 'chapter.language']);

        if (isset($request->language)) {
            $query->whereHas('chapter', function (Builder $query) use ($request) {
                $query->where('language_id', $request->language->id());
            });
        }

        if (isset($request->level)) {
            $query->where('problem_level_id', $request->level->value);
        }

        /**
         * @var LengthAwarePaginator<Problem>
         */
        $result = $query
            ->orderBy('created_at', 'desc')
            ->paginate(30);

        return $result;
    }

    public function get(string $id): ?Problem
    {
        /** @var ?Problem */
        $ch = Problem::query()
            ->where('problem_id', $id)
            ->first();

        return $ch;
    }

    /**
     * @return Collection<int, Problem>
     */
    public function all(Chapter $chapter): Collection
    {
        $result = Problem::query()
            ->where('chapter_id', $chapter->id())
        ->get();

        return $result;
    }
}
