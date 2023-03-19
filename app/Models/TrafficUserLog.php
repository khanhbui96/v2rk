<?php

namespace App\Models;

use App\Models\Traits\Serialize;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\TrafficUserLog
 *
 * @property int $id
 * @property int $user_id
 * @property string $u
 * @property string $d
 * @property string $n
 * @property int $log_at
 * @property string $log_date
 * @property int $created_at
 * @property int $updated_at
 * @method static Builder|TrafficUserLog newModelQuery()
 * @method static Builder|TrafficUserLog newQuery()
 * @method static Builder|TrafficUserLog query()
 * @method static Builder|TrafficUserLog whereCreatedAt($value)
 * @method static Builder|TrafficUserLog whereD($value)
 * @method static Builder|TrafficUserLog whereId($value)
 * @method static Builder|TrafficUserLog whereLogAt($value)
 * @method static Builder|TrafficUserLog whereU($value)
 * @method static Builder|TrafficUserLog whereUpdatedAt($value)
 * @method static Builder|TrafficUserLog whereUserId($value)
 * @method static Builder|TrafficUserLog whereLogDate($value)
 * @method static Builder|TrafficUserLog whereN($value)
 * @mixin Eloquent
 */
class TrafficUserLog extends Model
{
    use Serialize;

    const FIELD_ID = "id";
    const FIELD_U = "u";
    const FIELD_D = "d";
    const FIELD_N = "n";
    const FIELD_USER_ID = "user_id";
    const FIELD_LOG_AT = "log_at";
    const FIELD_LOG_DATE = 'log_date';
    const FIELD_CREATED_AT = "created_at";
    const FIELD_UPDATED_AT = "updated_at";
    protected $table = 'traffic_user_log';
    protected $dateFormat = 'U';

    protected $casts = [
        self::FIELD_CREATED_AT => 'timestamp',
        self::FIELD_UPDATED_AT => 'timestamp'
    ];

    /**
     * add traffic
     *
     * @param int $u
     * @param int $d
     * @return bool
     */
    public function addTraffic(int $u, int $d, int $n): bool
    {
        if ($u > 0) {
            $this->increment(self::FIELD_U, $u);
        }

        if ($d > 0) {
            $this->increment(self::FIELD_D, $d);
        }

        if ($n > 0) {
            $this->increment(self::FIELD_N, $n);
        }
        return true;
    }
}