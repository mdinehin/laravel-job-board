<?php

namespace App\Models;

use Database\Factories\VacancyFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vacancy extends Model
{
    /** @use HasFactory<VacancyFactory> */
    use HasFactory;

    public static array $experience = [
        'entry',
        'intermediate',
        'senior',
    ];

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
     * Normalize option labels by capitalizing standard words
     * and uppercasing short acronyms based on the length threshold.
     *
     * @param list<string> $options
     * @return list<string>
     */
    public static function normalizeLabels(array $options): array
    {
        return array_map(self::normalizeLabel(...), $options);
    }

    /**
     * Normalize a label by capitalizing standard words and
     * uppercasing short acronyms based on the length threshold.
     *
     * @param string $option
     * @return string
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
     * @param Builder $query
     * @param array $filters
     * @return Builder
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
}
