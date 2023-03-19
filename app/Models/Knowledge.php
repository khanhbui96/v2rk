<?php

namespace App\Models;

use App\Models\Traits\Serialize;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Knowledge
 *
 * @property int $id
 * @property string $language 語言
 * @property string $category 分類名
 * @property string $title 標題
 * @property string $body 內容
 * @property int|null $sort 排序
 * @property int $show 顯示
 * @property int $free 是否免费
 * @property int $created_at 創建時間
 * @property int $updated_at 更新時間
 * @method static Builder|Knowledge newModelQuery()
 * @method static Builder|Knowledge newQuery()
 * @method static Builder|Knowledge query()
 * @method static Builder|Knowledge whereBody($value)
 * @method static Builder|Knowledge whereCategory($value)
 * @method static Builder|Knowledge whereCreatedAt($value)
 * @method static Builder|Knowledge whereFree($value)
 * @method static Builder|Knowledge whereId($value)
 * @method static Builder|Knowledge whereLanguage($value)
 * @method static Builder|Knowledge whereShow($value)
 * @method static Builder|Knowledge whereSort($value)
 * @method static Builder|Knowledge whereTitle($value)
 * @method static Builder|Knowledge whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Knowledge extends Model
{
    use Serialize;

    const FIELD_ID = "id";
    const FIELD_LANGUAGE = "language";
    const FIELD_CATEGORY = "category";
    const FIELD_TITLE = "title";
    const FIELD_BODY = "body";
    const FIELD_SORT = "sort";
    const FIELD_SHOW = "show";
    const FIELD_FREE = "free";
    const FIELD_CREATED_AT = "created_at";
    const FIELD_UPDATED_AT = "updated_at";

    const SHOW_OFF = 0;
    const SHOW_ON = 1;

    const FREE_OFF = 0;
    const FREE_ON = 1;

    protected $table = 'knowledge';
    protected $dateFormat = 'U';

    protected $casts = [
        self::FIELD_CREATED_AT => 'timestamp',
        self::FIELD_UPDATED_AT => 'timestamp'
    ];

    /**
     * check free
     *
     * @return bool
     */
    public function isFree(): bool
    {
        return $this->getAttribute(self::FIELD_FREE) === self::FREE_ON;
    }
}