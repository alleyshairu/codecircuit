<?php

namespace Uc\Module\Solution\Model;

use App\Models\User\User;
use Uc\Module\Course\Model\Problem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string  $problem_id
 * @property string  $student_id
 * @property string  $code
 * @property bool    $approved
 * @property ?string $output
 * @property Problem $problem
 */
class Solution extends Model
{
    /**
     * The data type of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    protected $primaryKey = 'solution_id';

    public $incrementing = false;

    protected $table = 'solutions';

    protected $dateFormat = 'Y-m-d H:i:s';

    public function id(): string
    {
        return $this->solution_id;
    }

    public function code(): string
    {
        return $this->code;
    }

    public function output(): ?string
    {
        return $this->output;
    }

    /**
     * @return BelongsTo<User, Solution>
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    /**
     * @return BelongsTo<Problem, Solution>
     */
    public function problem(): BelongsTo
    {
        return $this->belongsTo(Problem::class, 'problem_id');
    }
}
