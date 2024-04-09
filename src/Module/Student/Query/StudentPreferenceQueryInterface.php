<?php

declare(strict_types=1);

namespace Uc\Module\Student\Query;

use Illuminate\Support\Collection;
use Uc\Module\Language\Model\Language;
use Uc\Module\Student\Model\StudentLevel;
use Uc\Module\Student\View\StudentPreference;

interface StudentPreferenceQueryInterface
{
    public function preferences(string $id): StudentPreference;

    /**
     * @return Collection<int, Language>
     */
    public function languages(string $id): Collection;

    /**
     * @param array<int, int> $languages
     */
    public function setLanguages(string $id, array $languages): void;

    public function level(string $id): StudentLevel;

    public function setLevel(string $id, StudentLevel $level): void;
}
