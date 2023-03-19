<?php

namespace App\Models;

use App\Models\Traits\Serialize;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\InviteCode
 *
 * @property int $id
 * @property int $user_id
 * @property string $code
 * @property int $status
 * @property int $pv
 * @property int $created_at
 * @property int $updated_at
 * @method static Builder|InviteCode newModelQuery()
 * @method static Builder|InviteCode newQuery()
 * @method static Builder|InviteCode query()
 * @method static Builder|InviteCode whereCode($value)
 * @method static Builder|InviteCode whereCreatedAt($value)
 * @method static Builder|InviteCode whereId($value)
 * @method static Builder|InviteCode wherePv($value)
 * @method static Builder|InviteCode whereStatus($value)
 * @method static Builder|InviteCode whereUpdatedAt($value)
 * @method static Builder|InviteCode whereUserId($value)
 * @mixin Eloquent
 */
class InviteCode extends Model
{
    use Serialize;

    const FIELD_ID = "id";
    const FIELD_USER_ID = "user_id";
    const FIELD_CODE = "code";
    const FIELD_STATUS = "status";
    const FIELD_CREATED_AT = "created_at";
    const FIELD_UPDATED_AT = "updated_at";

    const STATUS_UNUSED = 0;
    const STATUS_USED = 1;

    protected $table = 'invite_code';
    protected $dateFormat = 'U';

    protected $casts = [
        self::FIELD_CREATED_AT => 'timestamp',
        self::FIELD_UPDATED_AT => 'timestamp'
    ];


}