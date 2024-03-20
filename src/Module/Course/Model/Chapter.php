<?php

namespace Uc\Module\Course\Model;

use Uc\Module\Language\Model\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string  $chapter_id
 * @property int     $number
 * @property string  $title
 * @property ?string $description
 * @property ?string $description
 * @property ?string $learning_outcome
 */
class Chapter extends Model
{
    /**
     * The data type of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    protected $primaryKey = 'chapter_id';

    public $incrementing = false;

    protected $table = 'chapters';

    protected $dateFormat = 'Y-m-d H:i:s';

    public function id(): string
    {
        return $this->chapter_id;
    }

    public function number(): int
    {
        return $this->number;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function description(): ?string
    {
        return $this->description;
    }

    public function learningOutCome(): ?string
    {
        return $this->learning_outcome;
    }

    /**
     * @return BelongsTo<Language, Chapter>
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
}
