<?php

namespace Uc\Module\Unit\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string  $unit_id
 * @property int     $number
 * @property string  $title
 * @property ?string $description
 */
class Unit extends Model
{
    /**
     * The data type of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    protected $primaryKey = 'unit_id';

    public $incrementing = false;

    protected $table = 'units';

    protected $dateFormat = 'Y-m-d H:i:s';

    public function id(): string
    {
        return $this->unit_id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function description(): ?string
    {
        return $this->description;
    }

    public function number(): int
    {
        return $this->number;
    }
}
