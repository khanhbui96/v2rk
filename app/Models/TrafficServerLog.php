<?php

namespace App\Models;

use App\Models\Traits\Serialize;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\TrafficServerLog
 *
 * @property int $id
 * @property int $server_id
 * @property string $u
 * @property string $d
 * @property string $n
 * @property string $log_date
 * @property int $log_at
 * @property int $created_at
 * @property int $updated_at
 * @property string $server_type
 * @method static Builder|TrafficServerLog newModelQuery()
 * @method static Builder|TrafficServerLog newQuery()
 * @method static Builder|TrafficServerLog query()
 * @method static Builder|TrafficServerLog whereCreatedAt($value)
 * @method static Builder|TrafficServerLog whereD($value)
 * @method static Builder|TrafficServerLog whereId($value)
 * @method static Builder|TrafficServerLog whereLogAt($value)
 * @method static Builder|TrafficServerLog whereLogDate($value)
 * @method static Builder|TrafficServerLog whereN($value)
 * @method static Builder|TrafficServerLog whereServerId($value)
 * @method static Builder|TrafficServerLog whereServerType($value)
 * @method static Builder|TrafficServerLog whereU($value)
 * @method static Builder|TrafficServerLog whereUpdatedAt($value)
 * @mixin Eloquent
 */
class TrafficServerLog extends Model
{
    use Serialize;

    const FIELD_ID = "id";
    const FIELD_SERVER_ID = "server_id";
    const FIELD_UNIQUE_ID = "unique_id";
    const FIELD_SERVER_TYPE = "server_type";
    const FIELD_U = "u";
    const FIELD_D = "d";
    const FIELD_N = 'n';
    const FIELD_LOG_DATE = 'log_date';
    const FIELD_LOG_AT = "log_at";
    const FIELD_CREATED_AT = "created_at";
    const FIELD_UPDATED_AT = "updated_at";
    protected $table = 'traffic_server_log';
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
     * @param int $n
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