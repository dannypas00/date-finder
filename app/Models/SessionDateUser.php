<?php

namespace App\Models;

use App\Enums\Attendance;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * 
 *
 * @property int $id
 * @property int $session_date_id
 * @property int $user_id
 * @property Attendance $attendance
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\SessionDate $sessionDate
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|SessionDateUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SessionDateUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SessionDateUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|SessionDateUser whereAttendance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SessionDateUser whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SessionDateUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SessionDateUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SessionDateUser whereSessionDateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SessionDateUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SessionDateUser whereUserId($value)
 * @mixin \Eloquent
 */
class SessionDateUser extends Pivot
{
    protected $fillable = [
        'session_date_id',
        'user_id',
        'attendance',
        'comment'
    ];

    protected $casts = [
        'attendance' => Attendance::class,
    ];

    /**
     * @return BelongsTo<SessionDate>
     */
    public function sessionDate(): BelongsTo
    {
        return $this->belongsTo(SessionDate::class);
    }

    /**
     * @return BelongsTo<User>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
