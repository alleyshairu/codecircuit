<?php

declare(strict_types=1);

namespace Uc\Module\Feedback\Request;

use Uc\Module\Course\Model\Problem;
use Illuminate\Validation\ValidationException;
use Uc\Module\Course\Query\ProblemQueryInterface;

class FeedbackCreateRequest
{
    public bool $interesting = false;

    public bool $knowledge = false;

    public string $feedback;

    public int $score;

    public Problem $problem;

    public function __construct(Problem $problem, string $feedback, int $score)
    {
        $this->problem = $problem;
        $this->feedback = $feedback;
        $this->score = $score;
    }

    /**
     * @param array<string, string> $data
     */
    public static function fromArray(array $data): self
    {
        if (!isset($data['problem_id']) || !isset($data['student_id']) || !isset($data['feedback']) || !isset($data['score'])) {
            throw ValidationException::withMessages(['missing_data' => ['required data missing']]);
        }

        $query = app(ProblemQueryInterface::class);
        $problem = $query->get($data['problem_id']);
        if (null === $problem) {
            throw ValidationException::withMessages(['problem_id' => ['invalid problem id provided']]);
        }

        $req = new self($problem, $data['feedback'], (int) $data['score']);
        if (isset($data['is_interesting'])) {
            $req->interesting = (bool) $data['interesting'];
        }

        if (isset($data['gained_new_knowledge'])) {
            $req->knowledge = (bool) $data['gained_new_knowledge'];
        }

        return $req;
    }
}
