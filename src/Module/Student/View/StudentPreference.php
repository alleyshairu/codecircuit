<?php

declare(strict_types=1);

namespace Uc\Module\Student\View;

use Illuminate\Support\Collection;
use Uc\Module\Language\Model\Language;
use Uc\Module\Student\Model\StudentLevel;

readonly class StudentPreference
{
    /**
     * @var Collection<int, Language>
     * */
    public Collection $languages;

    public StudentLevel $level;

    /**
     * @param Collection<int, Language> $languages
     */
    public function __construct(Collection $languages, StudentLevel $level)
    {
        $this->languages = $languages;
        $this->level = $level;
    }
}
