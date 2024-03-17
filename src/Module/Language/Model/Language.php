<?php

namespace Uc\Module\Language\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int     $id
 * @property string  $name
 * @property string  $logo
 * @property string  $color
 * @property string  $website
 * @property ?string $description
 */
class Language extends Model
{
    protected $table = 'languages';

    protected $dateFormat = 'Y-m-d H:i:s';

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): ?string
    {
        return $this->description;
    }

    public function color(): string
    {
        return $this->color;
    }

    public function logo(): string
    {
        return $this->logo;
    }
}
