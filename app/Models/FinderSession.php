<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int $creator_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $creator
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SessionDate> $sessionDates
 * @property-read int|null $session_dates_count
 * @method static \Database\Factories\FinderSessionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|FinderSession newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FinderSession newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FinderSession query()
 * @method static \Illuminate\Database\Eloquent\Builder|FinderSession whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinderSession whereCreatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinderSession whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinderSession whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinderSession whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FinderSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'creator_id'
    ];

    /**
     * @return BelongsTo<User>
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    /**
     * @return HasMany<SessionDate>
     */
    public function sessionDates(): HasMany
    {
        return $this->hasMany(SessionDate::class);
    }
}
