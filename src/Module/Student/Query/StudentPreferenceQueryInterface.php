<?php

declare(strict_types=1);

namespace Uc\Module\Student\Query;

use Illuminate\Support\Collection;
use Uc\Module\Student\Model\StudentLevel;
use Uc\Module\Student\View\StudentPreference;

interface StudentPreferenceQueryInterface
{
    public function preferences(string $id): StudentPreference;

    /**
     * @var Collection<Language>
     * */
    public function languages(string $id): Collection;

    public function setLanguages(string $id, array $languages): void;

    public function level(string $id): StudentLevel;

    public function setLevel(string $id, StudentLevel $level): void;
}
