<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 *
 * @property int $id
 * @property int $finder_session_id
 * @property \Illuminate\Support\Carbon $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\SessionDateUser $pivot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $attendees
 * @property-read int|null $attendees_count
 * @property-read \App\Models\FinderSession|null $session
 * @method static \Database\Factories\SessionDateFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|SessionDate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SessionDate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SessionDate query()
 * @method static \Illuminate\Database\Eloquent\Builder|SessionDate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SessionDate whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SessionDate whereFinderSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SessionDate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SessionDate whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SessionDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'finder_session_id',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    /**
     * @return BelongsTo<FinderSession>
     */
    public function finderSession(): BelongsTo
    {
        return $this->belongsTo(FinderSession::class);
    }

    /**
     * @return BelongsToMany<User>
     */
    public function attendees(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->using(SessionDateUser::class)->withTimestamps();
    }
}
