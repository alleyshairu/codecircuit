<?php

namespace Uc\Module\Feedback\Model;

use App\Models\User\User;
use Uc\Module\Course\Model\Problem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $feedback_id
 * @property string $problem_id
 * @property bool   $is_interesting
 * @property bool   $have_clear_instructions
 * @property bool   $gained_new_knowledge
 * @property string $feedback
 * @property int    $score
 */
class Feedback extends Model
{
    protected $keyType = 'string';

    protected $primaryKey = 'chapter_id';

    public $incrementing = false;

    protected $table = 'feedbacks';

    protected $dateFormat = 'Y-m-d H:i:s';

    public function id(): string
    {
        return $this->feedback_id;
    }

    public function score(): int
    {
        return $this->score;
    }

    public function feedback(): string
    {
        return $this->feedback;
    }

    public function clearInstructions(): bool
    {
        return $this->have_clear_instructions ?? false;
    }

    public function interesting(): bool
    {
        return $this->is_interesting;
    }

    public function knowledge(): bool
    {
        return $this->gained_new_knowledge;
    }

    /**
     * @return BelongsTo<Problem, Feedback>
     */
    public function problem(): BelongsTo
    {
        return $this->belongsTo(Problem::class, 'problem_id');
    }

    /**
     * @return BelongsTo<User, Feedback>
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
