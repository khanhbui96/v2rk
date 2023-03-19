<?php

namespace App\Models;

use App\Models\Traits\Serialize;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\TicketMessage
 *
 * @property int $id
 * @property int $user_id
 * @property int $ticket_id
 * @property string $message
 * @property int $created_at
 * @property int $updated_at
 * @method static Builder|TicketMessage newModelQuery()
 * @method static Builder|TicketMessage newQuery()
 * @method static Builder|TicketMessage query()
 * @method static Builder|TicketMessage whereCreatedAt($value)
 * @method static Builder|TicketMessage whereId($value)
 * @method static Builder|TicketMessage whereMessage($value)
 * @method static Builder|TicketMessage whereTicketId($value)
 * @method static Builder|TicketMessage whereUpdatedAt($value)
 * @method static Builder|TicketMessage whereUserId($value)
 * @mixin Eloquent
 */
class TicketMessage extends Model
{
    use Serialize;

    const FIELD_ID = "id";
    const FIELD_USER_ID = "user_id";
    const FIELD_TICKET_ID = "ticket_id";
    const FIELD_MESSAGE = "message";
    const FIELD_CREATED_AT = "created_at";
    const FIELD_UPDATED_AT = "updated_at";

    protected $table = 'ticket_message';
    protected $dateFormat = 'U';

    protected $casts = [
        self::FIELD_CREATED_AT => 'timestamp',
        self::FIELD_UPDATED_AT => 'timestamp'
    ];
}