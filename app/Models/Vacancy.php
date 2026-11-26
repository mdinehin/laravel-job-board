<?php

namespace App\Models;

use Database\Factories\VacancyFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacancy extends Model
{
    /** @use HasFactory<VacancyFactory> */
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'location',
        'salary',
        'description',
        'experience',
        'category',
    ];

    /**
     * Available experience levels for vacancies.
     *
     * @var list<string>
     */
    public static array $experience = [
        'entry',
        'intermediate',
        'senior',
    ];

    /**
     * Available categories for vacancies.
     *
     * @var list<string>
     */
    public static array $category = [
        'construction',
        'design',
        'education',
        'engineering',
        'finance',
        'healthcare',
        'hospitality',
        'hr',
        'legal',
        'marketing',
        'operations',
        'sales',
        'support',
        'technology',
    ];

    public static int $maxAcronymLength = 2;

    /**
     * Get the employer that owns the vacancy.
     *
     * @return BelongsTo<Employer, $this>
     */
    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    /**
     * Get the applications for the vacancy.
     *
     * @return HasMany<VacancyApplication, $this>
     */
    public function applications(): HasMany
    {
        return $this->hasMany(VacancyApplication::class);
    }

    /**
     * Normalize option labels by capitalizing standard words
     * and uppercasing short acronyms based on the length threshold.
     *
     * @param  list<string>  $options
     * @return list<string>
     */
    public static function normalizeLabels(array $options): array
    {
        return array_map(self::normalizeLabel(...), $options);
    }

    /**
     * Normalize a label by capitalizing standard words and
     * uppercasing short acronyms based on the length threshold.
     */
    public static function normalizeLabel(string $option): string
    {
        return strlen($option) <= self::$maxAcronymLength
            ? strtoupper($option)
            : ucfirst($option);
    }

    /**
     * Scope a query to apply various search and attribute filters.
     *
     * @param  Builder<static>  $query
     * @param  array<string, mixed>  $filters
     * @return Builder<static>
     */
    public function scopeFilter(Builder $query, array $filters): Builder
    {
        return $query->when($filters['search'] ?? null, function ($query, $value) {
            $query->where(function ($query) use ($value) {
                $query->where('title', 'like', '%'.$value.'%')
                    ->orWhere('description', 'like', '%'.$value.'%')
                    ->orWhereHas('employer', function ($query) use ($value) {
                        $query->where('company_name', 'like', '%'.$value.'%');
                    });
            });
        })
            ->when($filters['min_salary'] ?? null, function ($query, $value) {
                $query->where('salary', '>=', $value);
            })
            ->when($filters['max_salary'] ?? null, function ($query, $value) {
                $query->where('salary', '<=', $value);
            })
            ->when($filters['experience'] ?? null, function ($query, $value) {
                $query->where('experience', $value);
            })
            ->when($filters['category'] ?? null, function ($query, $value) {
                $query->where('category', $value);
            });
    }

    /**
     * Determine if the given user has already applied for this job.
     */
    public function hasUserApplied(Authenticatable|int $user): bool
    {
        $userId = $user instanceof Authenticatable
            ? $user->getAuthIdentifier()
            : $user;

        return $this->where('id', $this->id)
            ->whereHas(
                'applications',
                fn ($query) => $query->where('user_id', $userId)
            )
            ->exists();
    }
}
