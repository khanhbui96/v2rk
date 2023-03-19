<?php

namespace App\Models;

use App\Models\Traits\Serialize;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\OrderStat
 *
 * @property int $id
 * @property int $order_count 订单数量
 * @property int $order_amount 订单合计
 * @property int $commission_count
 * @property int $commission_amount 佣金合计
 * @property string $record_type
 * @property int $record_at
 * @property int $created_at
 * @property int $updated_at
 * @method static Builder|OrderStat newModelQuery()
 * @method static Builder|OrderStat newQuery()
 * @method static Builder|OrderStat query()
 * @method static Builder|OrderStat whereCommissionAmount($value)
 * @method static Builder|OrderStat whereCommissionCount($value)
 * @method static Builder|OrderStat whereCreatedAt($value)
 * @method static Builder|OrderStat whereId($value)
 * @method static Builder|OrderStat whereOrderAmount($value)
 * @method static Builder|OrderStat whereOrderCount($value)
 * @method static Builder|OrderStat whereRecordAt($value)
 * @method static Builder|OrderStat whereRecordType($value)
 * @method static Builder|OrderStat whereUpdatedAt($value)
 * @mixin Eloquent
 */
class OrderStat extends Model
{
    use Serialize;

    const FIELD_ID = "id";
    const FIELD_ORDER_COUNT = "order_count";
    const FIELD_ORDER_AMOUNT = "order_amount";
    const FIELD_COMMISSION_COUNT = "commission_count";
    const FIELD_COMMISSION_AMOUNT = "commission_amount";
    const FIELD_RECORD_TYPE = "record_type";
    const FIELD_RECORD_AT = "record_at";
    const FIELD_CREATED_AT = "created_at";
    const FIELD_UPDATED_AT = "updated_at";


    const RECORD_TYPE_D = 'd'; //day;
    const RECORD_TYPE_M = 'm'; //month

    protected $table = 'order_stat';
    protected $dateFormat = 'U';

    protected $casts = [
        self::FIELD_CREATED_AT => 'timestamp',
        self::FIELD_UPDATED_AT => 'timestamp'
    ];
}