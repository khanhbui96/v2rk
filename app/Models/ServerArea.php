<?php

namespace App\Models;

use App\Models\Traits\Serialize;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\ServerArea
 *
 * @property int $id
 * @property string $flag
 * @property string $country
 * @property string $country_code
 * @property string $city
 * @property float $lng
 * @property float $lat
 * @property int $created_at
 * @property int $updated_at
 * @method static Builder|ServerArea newModelQuery()
 * @method static Builder|ServerArea newQuery()
 * @method static Builder|ServerArea query()
 * @method static Builder|ServerArea whereCity($value)
 * @method static Builder|ServerArea whereCountry($value)
 * @method static Builder|ServerArea whereCountryCode($value)
 * @method static Builder|ServerArea whereCreatedAt($value)
 * @method static Builder|ServerArea whereFlag($value)
 * @method static Builder|ServerArea whereId($value)
 * @method static Builder|ServerArea whereLat($value)
 * @method static Builder|ServerArea whereLng($value)
 * @method static Builder|ServerArea whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ServerArea extends Model
{
    use Serialize;

    const FIELD_ID = "id";
    const FIELD_FLAG = "flag";
    const FIELD_COUNTRY = "country";
    const FIELD_COUNTRY_CODE = "country_code";
    const FIELD_CITY = "city";
    const FIELD_LNG = "lng";
    const FIELD_LAT = "lat";
    const FIELD_CREATED_AT = "created_at";
    const FIELD_UPDATED_AT = "updated_at";

    protected $table = 'server_area';
    protected $dateFormat = 'U';

    protected $casts = [
        self::FIELD_CREATED_AT => 'timestamp',
        self::FIELD_UPDATED_AT => 'timestamp',
    ];
}