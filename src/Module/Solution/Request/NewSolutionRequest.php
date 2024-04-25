<?php

namespace Uc\Module\Solution\Request;

use Uc\Module\Course\Model\Problem;
use Uc\Module\Student\View\Student;

readonly class NewSolutionRequest
{
    public Problem $problem;

    public Student $student;

    public string $code;

    public array $output;

    public function __construct(Problem $problem, Student $student, string $code, array $output)
    {
        $this->problem = $problem;
        $this->student = $student;
        $this->code = $code;
        $this->output = $output;
    }
}
