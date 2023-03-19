<?php

namespace App\Models;

use App\Models\Traits\Serialize;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Notice
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string|null $img_url
 * @property int $created_at
 * @property int $updated_at
 * @method static Builder|Notice newModelQuery()
 * @method static Builder|Notice newQuery()
 * @method static Builder|Notice query()
 * @method static Builder|Notice whereContent($value)
 * @method static Builder|Notice whereCreatedAt($value)
 * @method static Builder|Notice whereId($value)
 * @method static Builder|Notice whereImgUrl($value)
 * @method static Builder|Notice whereTitle($value)
 * @method static Builder|Notice whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Notice extends Model
{
    use Serialize;

    const FIELD_ID = "id";
    const FIELD_TITLE = "title";
    const FIELD_CONTENT = "content";
    const FIELD_IMG_URL = "img_url";
    const FIELD_CREATED_AT = "created_at";
    const FIELD_UPDATED_AT = "updated_at";

    protected $table = 'notice';
    protected $dateFormat = 'U';

    protected $casts = [
        self::FIELD_CREATED_AT => 'timestamp',
        self::FIELD_UPDATED_AT => 'timestamp'
    ];

}