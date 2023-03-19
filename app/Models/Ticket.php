<?php

namespace App\Models;

use App\Models\Traits\Serialize;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * App\Models\Ticket
 *
 * @property int $id
 * @property int $user_id
 * @property int $last_reply_user_id
 * @property string $subject
 * @property int $level
 * @property int $status 0:已开启 1:已关闭
 * @property int $created_at
 * @property int $updated_at
 * @property-read Collection|TicketMessage[] $messages
 * @property-read int|null $messages_count
 * @method static Builder|Ticket newModelQuery()
 * @method static Builder|Ticket newQuery()
 * @method static Builder|Ticket query()
 * @method static Builder|Ticket whereCreatedAt($value)
 * @method static Builder|Ticket whereId($value)
 * @method static Builder|Ticket whereLastReplyUserId($value)
 * @method static Builder|Ticket whereLevel($value)
 * @method static Builder|Ticket whereStatus($value)
 * @method static Builder|Ticket whereSubject($value)
 * @method static Builder|Ticket whereUpdatedAt($value)
 * @method static Builder|Ticket whereUserId($value)
 * @mixin Eloquent
 */
class Ticket extends Model
{
    use Serialize;

    const FIELD_ID = "id";
    const FIELD_USER_ID = "user_id";
    const FIELD_LAST_REPLY_USER_ID = "last_reply_user_id";  //上次答复的用户ID
    const FIELD_SUBJECT = "subject";
    const FIELD_LEVEL = "level";
    const FIELD_STATUS = "status";
    const FIELD_CREATED_AT = "created_at";
    const FIELD_UPDATED_AT = "updated_at";
    const STATUS_UNPROCESSED = 0;

    const LEVEL_LOW = 0;
    const LEVEL_MEDIUM = 1;
    const LEVEL_HIGH = 2;

    const STATUS_OPEN = 0;
    const STATUS_CLOSE = 1;

    protected $table = 'ticket';
    protected $dateFormat = 'U';

    protected $casts = [
        self::FIELD_CREATED_AT => 'timestamp',
        self::FIELD_UPDATED_AT => 'timestamp'
    ];

    /**
     * ticket messages
     *
     * @return HasMany
     */
    public function messages(): HasMany
    {
        return $this->hasMany("App\Models\TicketMessage", TicketMessage::FIELD_TICKET_ID);
    }

    /**
     * Get last ticketMessage
     *
     * @return TicketMessage
     */
    public function getLastMessage(): TicketMessage
    {
        return TicketMessage::where(TicketMessage::FIELD_TICKET_ID, $this->getAttribute(self::FIELD_ID))->
        orderBy(TicketMessage::FIELD_ID, "DESC")->first();
    }


    /**
     * check closed
     *
     * @return bool
     */
    public function isClosed(): bool
    {
        return $this->getAttribute(self::FIELD_STATUS) == self::STATUS_CLOSE;
    }


    /**
     * find first Ticket with id and userId
     *
     * @param int $id
     * @param int $userId
     *
     * @return Ticket
     */
    public static function findFirstByUserId(int $id, int $userId): Ticket
    {
        return self::where([self::FIELD_ID => $id, self::FIELD_USER_ID => $userId])->first();
    }


    /**
     * find all Tickets and userId
     *
     * @param int $userId
     *
     * @return Builder[]|Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection|Ticket[]
     */
    public static function findAllByUserId(int $userId)
    {
        return self::where([self::FIELD_USER_ID => $userId])->
        orderBy(self::FIELD_CREATED_AT, "DESC")->get();
    }

    /**
     * stats ticket pending
     *
     * @return int
     */
    public static function countTicketPending(): int
    {
        return self::where(self::FIELD_STATUS, self::STATUS_OPEN)->count();
    }


}