<?php

namespace App\Models\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Support\Carbon;
use Database\Factories\UserFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int    $id
 * @property string $user_id
 * @property string $name
 * @property string $email
 * @property int    $user_kind_id
 * @property Carbon $created_at
 */
class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function kind(): UserKind
    {
        return UserKind::from($this->user_kind_id);
    }

    public function isStudent(): bool
    {
        return UserKind::Student->value === $this->user_kind_id;
    }

    public function isAdmin(): bool
    {
        return UserKind::Admin->value === $this->user_kind_id;
    }

    public function isTeacher(): bool
    {
        return UserKind::Teacher->value === $this->user_kind_id;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Factories\Factory<User>
     */
    protected static function newFactory(): Factory
    {
        return UserFactory::new();
    }
}
