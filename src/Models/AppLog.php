<?php

namespace Zerotoprod\AppLog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Monolog\Level;

class AppLog extends Model
{
    use HasFactory;

    public const id = 'id';

    public const context_id = 'context_id';

    public const auth_id = 'auth_id';

    public const flag = 'flag';

    public const message = 'message';

    public const context = 'context';

    public const level = 'level';

    public const channel = 'channel';

    public const record_datetime = 'record_datetime';

    public const extra = 'extra';

    public const formatted = 'formatted';

    public const remote_address = 'remote_address';

    public const user_agent = 'user_agent';

    public const created_at = 'created_at';

    protected $guarded = [];

    public const UPDATED_AT = null;

    protected $casts = [
        self::level => Level::class,
        self::record_datetime => 'datetime',
    ];
}
