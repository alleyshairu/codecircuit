<?php

namespace Uc\Module\Solution\Request;

use Uc\Module\Course\Model\Problem;
use Uc\Module\Student\View\Student;

readonly class NewSolutionRequest
{
    public Problem $problem;

    public Student $student;

    public string $code;

    public string $output;

    public function __construct(Problem $problem, Student $student, string $code, string $output)
    {
        $this->problem = $problem;
        $this->student = $student;
        $this->code = $code;
        $this->output = $output;
    }
}
