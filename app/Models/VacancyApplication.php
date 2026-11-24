<?php

namespace App\Models;

use App\Models\User;
use App\Models\Vacancy;
use Database\Factories\VacancyApplicationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VacancyApplication extends Model
{
    /** @use HasFactory<VacancyApplicationFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'expected_salary',
        'user_id',
        'cv_path',
    ];

    /**
     * Get the vacancy that owns the application.
     *
     * @return BelongsTo<Vacancy, $this>
     */
    public function vacancy(): BelongsTo
    {
        return $this->belongsTo(Vacancy::class);
    }

    /**
     * Get the user that owns the application.
     *
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
