<?php

namespace Uc\Module\Course\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $problem_id
 * @property string $title
 * @property string $description
 */
class Problem extends Model
{
    /**
     * The data type of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    protected $primaryKey = 'problem_id';

    public $incrementing = false;

    protected $table = 'problems';

    protected $dateFormat = 'Y-m-d H:i:s';

    public function id(): string
    {
        return $this->problem_id;
    }

    public function title(): string
    {
        return $this->title;
    }

    /**
     * @return BelongsTo<Chapter, Problem>
     */
    public function Chapter(): BelongsTo
    {
        return $this->belongsTo(Chapter::class, 'chapter_id');
    }
}
