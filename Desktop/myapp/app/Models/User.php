<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public const STATUS_ACTIVE = 'active';
    public const STATUS_SUSPENDED = 'suspended';
    public const STATUS_INCOMPLETE = 'incomplete';
    public const STATUS_UNVERIFIED = 'unverified';

    public const ROLE_USER = 'user';
    public const ROLE_MODERATOR = 'moderator';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'account_status',
        'role',
    ];

    /**
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function isActive(): bool
    {
        return $this->account_status === self::STATUS_ACTIVE;
    }

    public function isModerator(): bool
    {
        return $this->role === self::ROLE_MODERATOR;
    }

    public function isUserRole(): bool
    {
        return $this->role === self::ROLE_USER;
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
