<?php

namespace App\Models;

use App\Models\Traits\Serialize;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MailLog
 *
 * @property int $id
 * @property string $email
 * @property string $subject
 * @property string $template_name
 * @property string|null $error
 * @property int $created_at
 * @property int $updated_at
 * @method static Builder|MailLog newModelQuery()
 * @method static Builder|MailLog newQuery()
 * @method static Builder|MailLog query()
 * @method static Builder|MailLog whereCreatedAt($value)
 * @method static Builder|MailLog whereEmail($value)
 * @method static Builder|MailLog whereError($value)
 * @method static Builder|MailLog whereId($value)
 * @method static Builder|MailLog whereSubject($value)
 * @method static Builder|MailLog whereTemplateName($value)
 * @method static Builder|MailLog whereUpdatedAt($value)
 * @mixin Eloquent
 */
class MailLog extends Model
{
    use Serialize;
    
    const FIELD_ID = "id";
    const FIELD_EMAIL = "email";
    const FIELD_SUBJECT = "subject";
    const FIELD_TEMPLATE_NAME = "template_name";
    const FIELD_ERROR = "error";
    const FIELD_CREATED_AT = "created_at";
    const FIELD_UPDATED_AT = "updated_at";

    protected $table = 'mail_log';
    protected $dateFormat = 'U';

    protected $casts = [
        self::FIELD_CREATED_AT => 'timestamp',
        self::FIELD_UPDATED_AT => 'timestamp'
    ];
}