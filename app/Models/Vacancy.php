<?php

namespace App\Models;

use Database\Factories\VacancyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
